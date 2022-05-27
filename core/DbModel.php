<?php
namespace app\core;

use app\core\Model;

abstract class DbModel extends Model {
    /**
     * doit retourner le nom de la table à utiliser
     */
    abstract public function tableName():string ;
    abstract public function attributes():array ;
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
    /**
     * permet de returner le resultat du prepare predefinie 
     */
    public function prepareIt($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}