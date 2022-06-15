<?php
namespace app\core;
abstract class Model{

    public const RULE_REQUIRED='required';
    public const RULE_EMAIL='email';
    public const RULE_MIN='min';
    public const RULE_MAX='max';
    public const RULE_MATCH='match';
    public const RULE_UNIQUE='unique';

    public array $errors=[];
    /**
     * Permet de charger les donnée dans l'objet actuel
     * @param array $data - les données
     */
    public function loadData($data){
        foreach ($data as $key => $value) {
            if(property_exists($this,$key)){
                //stocker la valeur dans $this(objet) dans sa proprieté key
                $this->{$key} = $value;
            }
            
        }
    }

    /**
     * les regles de validation
     */
    abstract public function rules():array;

    /**
     * 
     */
    public function labels():array{
        return [];
    }
    public function getLabel($attribute){
        return $this->labels()[$attribute]??$attribute;
    }
    /**
     * Permet d'effectuer la validation des champs du formulaire
     * @return bool true si il n'y a aucune erreur
     */
    public function validate(){
        foreach ($this->rules() as $attribute=>$rules){
            $value = $this->{$attribute};
            foreach ($rules as $rule){
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName=$rule[0];
                }
                # Required error
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addErrorForRule($attribute,self::RULE_REQUIRED);
                }
                # email error
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addErrorForRule($attribute,self::RULE_EMAIL);
                }
                # Password min error
                if($ruleName === self::RULE_MIN && strlen($value)<$rule['min']){
                    $this->addErrorForRule($attribute,self::RULE_MIN,$rule);
                }
                # Password max error
                if($ruleName === self::RULE_MAX && strlen($value)>$rule['max']){
                    $this->addErrorForRule($attribute,self::RULE_MAX,$rule);
                }
                # Password confirm match error
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addErrorForRule($attribute,self::RULE_MATCH,$rule);
                }
                if($ruleName === self::RULE_UNIQUE ){
                    $className=$rule['class'];
                    $uniqueAttr=$rule['attribute']??$attribute;
                    $tableName=$className :: tableName();
                    $statement =Application ::$app->db->preparedb("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr",$value);
                    $statement->execute();
                    $record=$statement->fetchObject();
                    if($record){ 
                        $this->addErrorForRule($attribute,self :: RULE_UNIQUE,['field' => $this->getLabel($attribute)]);
                    }
                }
            }
         
        }
        return empty($this->errors); 
    }
    /**
     * Permet de assossier le message à afficher avec le champ contenant l'erreur
     * @param string $attribute nom de l'attribut(champ de saisie...)
     * @param string $ruleName rule name 
     * @param array $params tableau des erreurs 
     * @return void stocke le resultat dans le tableau errors[attribut][]
     */
    private function addErrorForRule(string $attribute,string $ruleName, $params=[]){
        //params[]=[self::RULE_MIN='min','min' => 4]
        $message = $this->errorMessages()[$ruleName] ?? ''; //$message=Min length of this field must be {min};
        foreach ($params as $key => $value) {
            $message=str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][]=$message;//errors['username'][0]=
    }
    
    public function addError(string $attribute,string $message){
        
        $this->errors[$attribute][]=$message;
    }
    /**
     * assotier à chaque nom de rule le message correspondant
     * @return array associative tel que key: rule name , value: message à afficher
     */
    public function errorMessages()
    {
        return[
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE=>  'Record with this {field} already exists'
        ];
    }

    /**
     * permet de retourner true si l'erreur exist sinon false
     * @param string nom d'attribut
     * @return bool true si l'attribut a une erreur
     */
    public function hasError($attribute){
        return $this->errors[$attribute]?? false;
    }
    /**
     * permet de recuperer la premiere erreur
     * @param string  nom de l'attribut
     * @return string $errors[0]
     */
    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }
}