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

    public function categorieOfSCategorie($id_s_categorie)
    {  
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT c.* FROM $tableName as c INNER JOIN sous_categories ON c.id=sous_categories.fk_categorie
        WHERE sous_categories.id=$id_s_categorie");
        $statement->execute();
        $result= $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function rules(): array
    {
        return [];
    }

}