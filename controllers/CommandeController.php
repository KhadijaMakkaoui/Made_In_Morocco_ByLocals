<?php

namespace app\controllers;

use app\core\Request;
use app\models\Client;
use app\models\Produit;
use app\core\Controller;
use app\models\Commande;
use app\core\Application;

class CommandeController extends Controller
{
    public function commandesList()
    {
        $commande = new Commande();

        if ($commande->selectAll()){
            $data = $commande->dataList;
            $this->setLayout('dashboard');        
            return $this->render('dashCommandes', [
                'commandes' => $data
            ]);
        }
     }


    public function add(Request $request){
        $commande = new Commande();
        $product =new Produit();
        $client =new Client();
        $product->selectAll();
        $client->selectAll();
        $params = [
            'model' => $commande,
            'product' => $product->dataList,
            'client' => $client->dataList
        ];
        if ($request->isGet()){
            $this->setLayout('dashboard');        
            return $this->render('addCommande', $params);
        }
        if($request->isPost())
        {
            $commande->loadData($request->getBody());

            if ($commande->save()){
                Application::$app->session->setFlash('success', 'added successfully');
                Application::$app->response->redirect('dashCommandes');
            }
            $this->setLayout('dashboard');        
            return $this->render('addCommande', [
                'model' => $commande
            ]);
        }
        $this->setLayout('dashboard');        

        return $this->render('addCommande', [
            'model' => $commande
        ]);    
    }
    public function update(Request $request)
    {
        $commande = new Commande();
        $product =new Produit();
        $client =new Client();
        $product->selectAll();
        $client->selectAll();
        $params = [
            'model' => $commande,
            'product' => $product->dataList,
            'client' => $client->dataList
        ];
        $this->setLayout('dashboard');        

        if ($request->isGet()){  
            $commande->loadData($request->getBody());
            $commande->select($commande->id);
            $commande->loadData($commande->dataList);
            $params['model']= $commande;
            return $this->render('updateCommande', $params);
        }
        
      
        if($request->isPost())
        {
            $commande->loadData($request->getBody());

            if ($commande->update($commande->id)){
                Application::$app->session->setFlash('success', 'Thanks for updating Teacher');
                Application::$app->response->redirect('dashCommandes');
            }

            return $this->render('updateCommande', [
                'model' => $commande
            ]);
        }

        return $this->render('updateCommande', [
            'model' => $commande
        ]);    
    }

    

    // public function getTeacher()
    // {
    //     $commande = new TeacherModel();
    //     if ($commande->select($commande->id)){
    //         return $this->render('commande', [
    //             'model' =>  $commande->dataList
    //         ]);
    //     }
    // }

    public function delete(Request $request)
    {
        $commande = new Commande();
        if ($request->isGet()){  
            $commande->loadData($request->getBody());
            if ($commande->delete($commande->id)){ //to integrate validate method
                Application::$app->session->setFlash('success', 'has successfully deleted');
                Application::$app->response->redirect('dashCommandes');
            }
        }
    }
    
}