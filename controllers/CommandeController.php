<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\Commande;

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


    // public function addTeacher(Request $request){
    //     $commande = new commande();
    //     $params = [
    //         'model' => $commande,
    //     ];
    //     if ($request->isGet()){
    //         return $this->render('addTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $commande->loadData($request->getBody());

    //         if ($commande->save()){
    //             Application::$app->session->setFlash('success', 'Updated successfully');
    //             Application::$app->response->redirect('commande');
    //         }

    //         return $this->render('addTeacher', [
    //             'model' => $commande
    //         ]);
    //     }

    //     return $this->render('addTeacher', [
    //         'model' => $commande
    //     ]);    
    // }
    // public function updateTeacher(Request $request)
    // {
    //     $commande = new TeacherModel();
    //     $params = [
    //         'model' => $commande
    //     ];
    //     if ($request->isGet()){  
    //         $commande->loadData($request->getBody());
    //         $commande->select($commande->id);
    //         $commande->loadData($commande->dataList);
    //         $params = [
    //             'model' => $commande
    //         ];      
    //         return $this->render('updateTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $commande->loadData($request->getBody());

    //         if ($commande->update($commande->id)){
    //             Application::$app->session->sefFlash('success', 'Thanks for updating Teacher');
    //             Application::$app->response->redirect('commande');
    //         }

    //         return $this->render('updateTeacher', [
    //             'model' => $commande
    //         ]);
    //     }

    //     return $this->render('updateTeacher', [
    //         'model' => $commande
    //     ]);    
    // }

    

    // public function getTeacher()
    // {
    //     $commande = new TeacherModel();
    //     if ($commande->select($commande->id)){
    //         return $this->render('commande', [
    //             'model' =>  $commande->dataList
    //         ]);
    //     }
    // }

    // public function deleteTeacher(Request $request)
    // {
    //     $commande = new TeacherModel();
    //     if ($request->isGet()){  
    //         $commande->loadData($request->getBody());
    //         if ($commande->delete($commande->id)){ //to integrate validate method
    //             Application::$app->session->sefFlash('success', 'has successfully deleted');
    //             Application::$app->response->redirect('commande');
    //         }
    //     }
    // }
    
}