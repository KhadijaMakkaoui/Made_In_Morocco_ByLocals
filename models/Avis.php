<?php

namespace app\models;

use app\core\DbModel;


class Avis extends DbModel
{
        public int $id;
        public string $nb_etoile_avis;
        public string $commentaire_avis;
        public int $fk_client;
        public int $fk_produit;


    public function tableName(): string
    {
        return 'avis';
    }
    public function attributes(): array
    {
        return [ 
            'nb_etoile_avis',            
            'commentaire_avis'
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