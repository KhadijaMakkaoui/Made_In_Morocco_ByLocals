<?php
namespace app\models;

use app\core\Model;
use app\core\DbModel;
use app\core\UserModel;

class User extends UserModel {

    //Have to be this class attributeName= register view name=""
    public string $email='';
    public string $password='';
    public string $confirmPassword='';

    public function tableName():string{
        return 'accounts';
    }
    // public function primaryKey():string{
    //     return 'id';
    // }
    public function attributes():array{
        return ['email', 'password'];
    }
    public function labels():array{
        return [
            'email'  => 'Email',
            'password' => 'Password',
            'confirmPassword'  => 'Confirm Password'];
    }


    public function save(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
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
        return 'Nom ';
    }
}