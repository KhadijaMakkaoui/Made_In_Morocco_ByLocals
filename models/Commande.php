<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Commande extends DbModel
{
 
    // public DateTime $date;
    public int $id;
    public int $quantite;
    public string $description='';
    public int $fk_client;
    public int $fk_produit;



    public function tableName(): string
    {
        return 'commandes';
    }
    public function attributes(): array
    {
        return [ 
            'quantite',            
            'description' ,
            'fk_client',
            'fk_produit'
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
    public function count()
    {
        return parent::count();
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