<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{

    public function home(){
        $params=[
            'name'=>"Khadija"
        ];
        return $this->render('index',$params);
        // return Application::$app->router->renderView('home',$params);
    }
    public function contact(){
        return $this->render('contact');
        // return Application::$app->router->renderView('contact');
    }
    public function registerVendeur(){
        return $this->render('registerVendeur');
        // return Application::$app->router->renderView('contact');
    }public function panier(){
        return $this->render('panier');
        // return Application::$app->router->renderView('contact');
    }
    public function wishList(){
        return $this->render('wishList');
        // return Application::$app->router->renderView('contact');
    }
    public function boutique(){
        return $this->render('boutique');

        // return Application::$app->router->renderView('contact');
    }
    public function dashHome(){
        $this->setLayout('dashboard');        
        return $this->render('dashHome');
    }

    // public function dashProducts(){
    //     $this->setLayout('dashboard');        
    //     return $this->render('dashProducts');
    // }  
    public function dashCommandes(){
        $this->setLayout('dashboard');        
        return $this->render('dashCommandes');
    }
    public function dashAvis(){
        $this->setLayout('dashboard');        
        return $this->render('dashAvis');
    }
    public function dashProfile(){
        $this->setLayout('dashboard');        
        return $this->render('dashProfile');
    }

    public function handleContact(Request $request){
        $body = $request->getBody();
        var_dump($body);
        exit;
        return 'Handling submitted data';
    }
}