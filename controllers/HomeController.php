<?php

namespace app\controllers;

use app\models\Avis;
use app\core\Request;
use app\models\Image;
use app\models\Client;
use app\models\Produit;
use app\core\Controller;
use app\models\Commande;
use app\core\Application;
use app\models\Categorie;

class HomeController extends Controller
{
    public function dashHome()
    {
        $commande = new Commande();
        $product =new Produit(); 
        $avis = new Avis();
        // var_dump($product->count());exit;
        if ($commande->count() && $product->count() && $avis->count()){
           
            $this->setLayout('dashboard');        
            return $this->render('dashHome', [
                'Nbcommandes' => $commande->count(),
                'Nbproduits' => $product->count(),
                'Nbavis' => $avis->count()
            ]);
        }
    }
    
     public function boutique()
    {
        $product =new Produit();
        $obj_product = $product;
        $categorie=new Categorie();
        $image =new Image(); 
        if($product->selectAll()){
            return $this->render('boutique', [
                'products' => $product->dataList,
                'obj_image' => $image,
                'obj_categorie' => $categorie,
                'obj_product' => $obj_product
            ]);
        }

    }
     public function home(){
        // $params=[
        //     'name'=>"Khadija"
        // ];
        return $this->render('index');
        // return Application::$app->router->renderView('home',$params);
    }

    public function contact(){
        return $this->render('contact');
                // return Application::$app->router->renderView('contact');
    }

    public function wishList(){
        return $this->render('wishList');
        return Application::$app->router->renderView('contact');
    }



  
    
}