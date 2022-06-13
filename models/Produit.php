<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Produit extends DbModel
{
 
        public string $titre;
        public string $description= '';
        public int $quantite;
        public float $prix ;
        public DateTime $createdAt_produit;
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
            ];
    }
    // public function getId() {
    //     return 
    // }

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
    public function selectImage()
    {
        return parent::selectImage();
    }
    public function selectSousCategory()
    {
        return parent::selectSousCategory();
    } 
    public function selectCategory()
    {
        return parent::selectCategory();
    }
    public function delete(int $id)
    {
        return parent::delete($id);
    }

    public function save()
    {
        return parent::save();
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