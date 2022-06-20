<?php
namespace app\models;

use app\core\Model;
use app\models\User;
use app\core\Application;

class LoginForm extends Model{

    public string $email='';
    public string $password='';

    public function rules():array {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function login(){
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email',"Cet email n'existe pas");
            return false;           
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('password','Mot de passe incorrecte');
            return false;
        }
        return Application::$app->login($user);
    }
    public function labels():array{
        return [
            'email' => 'Adresse email',
            'password' => 'Mot de passe'];
    }
}