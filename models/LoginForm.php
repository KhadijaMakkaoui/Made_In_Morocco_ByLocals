<?php
namespace app\models;

use app\core\Model;
use app\models\Account;
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
        // var_dump($user);
        // exit;
        if(!$user){
            $this->addError('email',"Cet email n'existe pas");
            return false;           
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('password','Votre mot de passe est incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
    public function labels():array{
        return [
            'email' => 'Adresse Email',
            'password' => 'Mot de passe'];
    }
}