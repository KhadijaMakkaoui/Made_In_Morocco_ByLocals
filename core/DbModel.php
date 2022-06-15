<?php
namespace app\core;

use app\core\Model;

abstract class DbModel extends Model {
    /**
     * doit retourner le nom de la table à utiliser
     */
    abstract public function tableName():string ;
    abstract public function attributes():array ;
    public $dataList = [];
    public static function primaryKey():string{
        return 'id';
    } 
    /**
     * permet de returner le resultat du prepare() predefinie 
     */
    public function prepareIt($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
    /**
     * @param array $where associative array
     */
    public static function findOne($where){
        $tableName = static::tableName();
        $attributes=array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr",$attributes));
        array_map(fn($attr)=> "$attr= :$attr",$attributes);
        $statement=self::prepareIt("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    public function find($where,$table){
        $tableName = $table ?? $this->tableName();
        $attributes=array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr",$attributes));
        array_map(fn($attr)=> "$attr= :$attr",$attributes);
        $statement=self::prepareIt("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    /**
     * Methode permet l'insertion 
     */
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepareIt("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }
    public function update(int $id)
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => "$attr=:$attr", $attributes );
        $statement = self::prepareIt("UPDATE $tableName SET  
                   ".implode(',', $params)." WHERE id = $id");
        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function selectAll($attributes=[])
    {
        
        $tableName = $this->tableName();
        if(empty($attributes)){
            $attr='*';
        }else{
            $attr=implode(',', $attributes);
        }
        $statement = self::prepareIt("SELECT $attr FROM $tableName");
        $statement->execute();
        $this->dataList =  $statement->fetchAll();
        return true;
    }

    public function select(int $id)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT * FROM $tableName where id = $id");
        $statement->execute();
        $this->dataList = $statement->fetch(\PDO::FETCH_OBJ);
        return true;
    }
   
    public function delete(int $id)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("DELETE FROM $tableName WHERE id = $id");
        $statement->execute();
        return true;
    }
   
}