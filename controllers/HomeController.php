<?php

namespace app\controllers;

use app\models\Avis;
use app\core\Request;
use app\models\Client;
use app\models\Produit;
use app\core\Controller;
use app\models\Commande;
use app\core\Application;

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


  
    
}