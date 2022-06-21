<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Image extends DbModel
{
 
        public string $titre='';
        public string $chemin = '';

    public function tableName(): string
    {
        return 'images';
    }
    public function attributes(): array
    {
        return [ 
            'titre',            
            'chemin' ,
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
    public function getLastInsetedId(){
        return parent::getLastInsetedId();
    }
    public function rules(): array
    {
        return [];
    }

}