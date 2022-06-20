<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Panier extends DbModel
{
        public int $id;
        public int $quantite;
        public DateTime $date;
        public int $fk_produit;
        public int $fk_client;


    public function tableName(): string
    {
        return 'paniers';
    }
    public function attributes(): array
    {
        return [ 
            'quantite',            
            'fk_produit',
            'fk_client'
            ];
    }

    public function update(int $id)
    {
        return parent::update($id);
    }
    public function count()
    {
        return parent::count();
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
    public function rules(): array
    {
        return [];
    }

}