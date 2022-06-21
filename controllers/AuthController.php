<?php
namespace app\controllers;

use app\models\User;
use app\core\Request;
// use app\models\User;
use app\core\Response;
use app\models\Client;
use app\core\Controller;
use app\core\Application;
use app\models\LoginForm;
use app\models\Fabriquant;


class AuthController extends Controller{
    
    public function login(Request $request,Response $response){
        $loginForm = new LoginForm();
        $fabriqant=new Fabriquant();
        $client = new Client();

        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                if($fabriqant->getLoggedFabriquant()){
                    // var_dump($fabriqant->getLoggedFabriquant());exit;
                    $response->redirect('/dashHome');
                }else if($client->getLoggedClient()){
                    $response->redirect('/boutique');
                }
                
               
            }
        }
        $this->setLayout('main');
        return $this->render('login',[
            'model' => $loginForm
        ]);
    }
    public function register(Request $request){
        
        $account = new User();
        
        if($request->isPost()){
           $account->loadData($request->getBody());
            $account->setRole();
           if($account->validate() && $account->save()){
               Application::$app->session->setFlash('success','thanks for registring');
               Application::$app->response->redirect('/');
                exit;
           }
           if($_SERVER['REQUEST_URI']=='/register')
           return $this->render('register',[
               'model' => $account
            ]);
           if($_SERVER['REQUEST_URI']=='/registerVendeur')

             return $this->render('registerVendeur',[
                'model' => $account
             ]);
        }
        $this->setLayout('main');

        if($_SERVER['REQUEST_URI']=='/register')
        return $this->render('register',[
            'model' => $account
         ]);
       else{
        return $this->render('registerVendeur',[
             'model' => $account
          ]);
       }

          
    }
    public function logout(Request $request,Response $response){
        Application::$app->logout();
        $response->redirect('/');
    }
}