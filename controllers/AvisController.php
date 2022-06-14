<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\Avis;

class AvisController extends Controller
{
    public function avisList()
    {
        $avis = new Avis();

        if ($avis->selectAll()){
            $data = $avis->dataList;
            $this->setLayout('dashboard');        
            return $this->render('dashAvis', [
                'avis' => $data
            ]);
        }
     }


  
    public function delete(Request $request)
    {
        $avis = new Avis();
        if ($request->isGet()){  
            $avis->loadData($request->getBody());
            if ($avis->delete($avis->id)){ //to integrate validate method
                Application::$app->session->setFlash('success', 'has successfully deleted');
                Application::$app->response->redirect('dashAvis');
            }
        }
    }
    
}