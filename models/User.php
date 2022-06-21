<?php

namespace app\models;

use app\models\Role;
use app\core\DbModel;
use app\core\UserModel;


class User extends UserModel
{

    //Have to be this class attributeName= register view name=""

    public string $email='';
    public string $password='';
    public string $confirmPassword='';
    public string $fk_role='';

    public function tableName():string{
        return 'accounts';
    }
    // public function primaryKey():string{
    //     return 'id';
    // }
    public function attributes():array{
        return ['email', 'password','fk_role'];
    }
    public function labels():array{
        return [
            'email'  => 'Email',
            'password' => 'Mot de passe',
            'confirmPassword'  => 'Confirmation du mot de passe'];
    }

    public function save(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);        
        
        if($_SERVER['REQUEST_URI']=="/register"){
            $this->fk_role =3;  
        }else if($_SERVER['REQUEST_URI']=="/registerVendeur"){
            $this->fk_role =2;  
        }      
        return parent::save();
    }

    public function rules():array{
        return [
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'class' => self::class]],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>24]],
            'confirmPassword' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']]
        ];
    }
    public function getDisplayName():string { 
        // return $this->firstname.' '.$this->lastname;
        return 'name';
    }
}