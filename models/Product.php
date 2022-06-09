<?php

namespace app\models;

use app\core\DbModel;


class Product extends DbModel
{
 
        public string $titre_produit;
        public string $description_produit = '';
        public int $quantite_produit;
        public float $prix_produit ;
        public bool $dispo_produit;


    public function tableName(): string
    {
        return 'produits';
    }
    public function attributes(): array
    {
        return [ 
            'titre_produit',            
            'description_produit' ,
            'quantite_produit',
            'prix_produit',
            'dispo_produit'];
    }

    public function update(int $id)
    {
        return parent::update($id);
    }

    public function selectAll($attr=[])
    {
        return parent::selectAll();
    }
    // public function selectAll($attr=[])
    // {
    //     return parent::selectAll();
    // }

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