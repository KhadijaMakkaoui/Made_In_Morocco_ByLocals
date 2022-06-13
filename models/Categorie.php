<?php

namespace app\models;

use app\core\DbModel;


class Categorie extends DbModel
{
    public string $libelle;
    public string $description;

    public function tableName(): string
    {
        return 'categories';
    }
    public function attributes(): array
    {
        return [ 
            'libelle',            
            'description'
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