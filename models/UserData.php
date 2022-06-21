<?php

namespace app\models;

use app\core\DbModel;
use DateTime;

class UserData extends DbModel
{
        public int $id;
        public string $nom='';
        public string $prenom = '';
        public string $genre ='';
        public DateTime $dateNais ;
        public string $adresse ='';
        public string $tel ='';
        public int $fk_ville;
        public int $fk_image;
        public int $fk_account;


    
    
        public function tableName(): string
    {
        return 'users_data';
    }
    public function attributes(): array
    {
        return [ 
            'nom',            
            'prenom' ,
            'genre',
            'dateNais',
            'adresse',
            'tel',
            'fk_ville',
            'fk_image',
            'fk_account'
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

    public function select($id)
    {
        return parent::select($id);
    }
    public function selectByAccount($id_account)
    {
        $tableName = $this->tableName();
        $statement = self::prepareIt("SELECT * FROM $tableName where fk_account = $id_account");
        $statement->execute();
        // $this->dataList = $statement->fetch(\PDO::FETCH_ASSOC);
        return $statement->fetch(\PDO::FETCH_ASSOC);;
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