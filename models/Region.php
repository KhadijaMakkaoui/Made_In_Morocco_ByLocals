<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Region extends DbModel
{
        public int $id;
        public string $nom='';
        public int $fk_image;

    public function tableName(): string
    {
        return 'regions';
    }
    public function attributes(): array
    {
        return [ 
            'nom',            
            'fk_image'
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
    public function GetRegionByVille($id_ville){
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT  $tableName.* FROM $tableName
        INNER JOIN villes ON $tableName.id=villes.fk_region where villes.id = $id_ville");
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
  
    public function rules(): array
    {
        return [];
    }

}