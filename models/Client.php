<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Client extends DbModel
{
 
        public string $adresse_livraison = '';
        public int $fk_account;




    public function tableName(): string
    {
        return 'clients';
    }
    public function attributes(): array
    {
        return [ 
            'adresse_livraison',            
            'fk_account' 
        ];
    }

    public function update(int $id)
    {
        return parent::update($id);
    }

    public function selectAll($attr=[])
    {
        return parent::selectAll();
    }

    public function select(int $id)
    {
        return parent::select($id);
    }

    public function delete(int $id)
    {
        return parent::delete($id);
    }

    public function save()
    {
        return parent::save();
    }
    public function getLoggedClient(){
        $tableName = $this->tableName();
        $id_user=$_SESSION['user'];
        $statement = self::prepareIt("SELECT * FROM $tableName where fk_account =$id_user ");
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        $_SESSION['client_id']=$result['id'];
        return true;
   }
    public function rules(): array
    {
        return [
    //         'matricule' => [self::RULE_REQUIRED, [
    //             self::RULE_UNIQUE, 'class' => self::class
    //         ]],            
    //         'firstname' => [self::RULE_REQUIRED],
    //         'lastname' => [self::RULE_REQUIRED],
    //         'gender' => [self::RULE_REQUIRED],
    //         'matiere' => [self::RULE_REQUIRED],
    //         'phone' => [self::RULE_REQUIRED,[
    //             self::RULE_UNIQUE, 'class' => self::class
    //         ]],  
        ];
    }

}