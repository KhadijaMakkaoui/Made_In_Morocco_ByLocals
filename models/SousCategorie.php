<?php

namespace app\models;

use app\core\DbModel;


class SousCategorie extends DbModel
{
    public string $libelle;
    public string $description;
    public int $fk_categorie;

    public function tableName(): string
    {
        return 'sous_categories';
    }
    public function attributes(): array
    {
        return [ 
            'libelle',            
            'description',
            'fk_categorie'
            ];
    }

    public function selectAll($attr=[])
    {
        return parent::selectAll();
    }
    public function select(int $id)
    {
        return parent::select($id);
    }

    public function rules(): array
    {
        return [];
    }

}