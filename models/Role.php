<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class Role extends DbModel
{
        public int $id;
        public string $role='';
        public string $description ='';




    public function tableName(): string
    {
        return 'roles';
    }
    public function attributes(): array
    {
        return [ 
            'role',            
            'description'
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