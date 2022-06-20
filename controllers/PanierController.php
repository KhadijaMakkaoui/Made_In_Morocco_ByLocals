<?php

namespace app\controllers;

use app\core\Request;
use app\models\Image;
use app\models\Client;
use app\models\Panier;
use app\models\Produit;
use app\core\Controller;
use app\models\Commande;
use app\core\Application;

class PanierController extends Controller
{
    public function panier(Request $request)
     {  
        $panier = new Panier();
        $product=new Produit();
        $image=new Image();
        if ($request->isGet()){
            if ($panier->selectAll() ){
            // if ($panier->panierOfClient($_SESSION['client_id']) ){
                $data = $panier->dataList;
                return $this->render('panier', [
                    'panier' => $data,
                    'obj_product' => $product,
                    'obj_image' => $image
                ]);
            }       
        }
        if($request->isPost())
        {
            $commande=new Commande();

            if ( $panier->selectAll()){            
                $data = $panier->dataList;
                foreach ($data as $value) {
                    $commande->loadData($value);
                    $commande->save();
                    $panier->delete($value['id']);
                }
                Application::$app->session->setFlash('success', 'Votre commande est effectué avec succès');
                Application::$app->response->redirect('boutique');
            }
            return $this->render('panier');
        }
        
      }

    // public function add(Request $request){
    //     $panier = new panier();
    //     $product =new Produit();
    //     $client =new Client();
    //     $product->selectAll();
    //     $client->selectAll();
    //     $params = [
    //         'model' => $panier,
    //         'product' => $product->dataList,
    //         'client' => $client->dataList
    //     ];
    //     if ($request->isGet()){
    //         $this->setLayout('dashboard');        
    //         return $this->render('addCommande', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $panier->loadData($request->getBody());

    //         if ($panier->save()){
    //             Application::$app->session->setFlash('success', 'added successfully');
    //             Application::$app->response->redirect('dashCommandes');
    //         }
    //         $this->setLayout('dashboard');        
    //         return $this->render('addCommande', [
    //             'model' => $panier
    //         ]);
    //     }
    //     $this->setLayout('dashboard');        

    //     return $this->render('addCommande', [
    //         'model' => $panier
    //     ]);    
    // }
    // public function update(Request $request)
    // {
    //     $panier = new panier();
    //     $product =new Produit();
    //     $client =new Client();
    //     $product->selectAll();
    //     $client->selectAll();
    //     $params = [
    //         'model' => $panier,
    //         'product' => $product->dataList,
    //         'client' => $client->dataList
    //     ];
    //     $this->setLayout('dashboard');        

    //     if ($request->isGet()){  
    //         $panier->loadData($request->getBody());
    //         $panier->select($panier->id);
    //         $panier->loadData($panier->dataList);
    //         $params['model']= $panier;
    //         return $this->render('updateCommande', $params);
    //     }
        
      
    //     if($request->isPost())
    //     {
    //         $panier->loadData($request->getBody());

    //         if ($panier->update($panier->id)){
    //             Application::$app->session->setFlash('success', 'Thanks for updating Teacher');
    //             Application::$app->response->redirect('dashCommandes');
    //         }

    //         return $this->render('updateCommande', [
    //             'model' => $panier
    //         ]);
    //     }

    //     return $this->render('updateCommande', [
    //         'model' => $panier
    //     ]);    
    // }

    public function delete(Request $request)
    {
        $panier = new panier();
        if ($request->isGet()){  
            $panier->loadData($request->getBody());
            if ($panier->delete($panier->id)){ //to integrate validate method
                Application::$app->response->redirect('panier');
            }
        }
    }
    
}