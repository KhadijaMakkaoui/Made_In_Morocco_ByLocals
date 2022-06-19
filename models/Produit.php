<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Produit extends DbModel
{
    
        public int $id;
        public string $titre = '';
        public string $description= '';
        public int $quantite ;
        public float $prix ;
        public int $fk_s_categorie;
        public int $fk_image;
        public int $fk_fabriquant;

    public function tableName(): string
    {
        return 'produits';
    }
    public function attributes(): array
    {
        return [ 
            'titre',            
            'description' ,
            'quantite',
            'prix',
            'fk_s_categorie',
            'fk_image',
            'fk_fabriquant'
            ];
    }
    public function save()
    {
        return parent::save();
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
    /**
     * Permet de selectionner l'image d'un produit dont son fk_image=images.id
     * @return array associative 
     */
    public function selectImage()
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT images.* FROM images INNER JOIN $tableName ON images.id=$tableName.fk_image");
        $statement->execute();
        $image= $statement->fetch(\PDO::FETCH_ASSOC);
        return $image;
    }
    /**
     * Permet de retourner tous les sous categorie où il ya des produits
     */
    public function selectSousCategory()
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT sous_categories.* FROM sous_categories INNER JOIN $tableName ON sous_categories.id=$tableName.fk_s_categorie");
        $statement->execute();
        $result= $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Permet de selectionner distinct sous categorie d'une categorie donnée  ayant des produits 
     * @param string|int $whereIdCat  id de la categorie
     * @return array contient distinct sous categorie d'une categorie
     */
    public function selectDistinctSousCategory($whereIdCat)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT DISTINCT $tableName.fk_s_categorie,sc.* FROM $tableName INNER JOIN sous_categories sc ON sc.id=$tableName.fk_s_categorie
        WHERE sc.fk_categorie=$whereIdCat");
        $statement->execute();
        $result= $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function selectCategory()
    {  
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT categories.* FROM categories INNER JOIN sous_categories ON categories.id=sous_categories.fk_categorie
         INNER JOIN $tableName ON sous_categories.id=$tableName.fk_s_categorie");
        $statement->execute();
        $result= $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function selectProductsByCategory(int $id_categorie)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT p.* FROM $tableName AS p INNER JOIN sous_categories AS sc ON p.fk_s_categorie=sc.id  
        INNER JOIN categories AS c ON sc.fk_categorie=c.id WHERE c.id=$id_categorie");
        $statement->execute();
        $result= $statement->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($result);
        // exit;
        return $result;
    }
    public function selectProductsBySCategory(int $id_s_categorie)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT * FROM $tableName WHERE fk_s_categorie=$id_s_categorie");
        $statement->execute();
        $result= $statement->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($result);
        // exit;
        return $result;
    }
    public function delete(int $id)
    {
        return parent::delete($id);
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