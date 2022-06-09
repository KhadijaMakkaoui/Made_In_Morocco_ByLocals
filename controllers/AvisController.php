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


    // public function addTeacher(Request $request){
    //     $avis = new avis();
    //     $params = [
    //         'model' => $avis,
    //     ];
    //     if ($request->isGet()){
    //         return $this->render('addTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $avis->loadData($request->getBody());

    //         if ($avis->save()){
    //             Application::$app->session->setFlash('success', 'Updated successfully');
    //             Application::$app->response->redirect('avis');
    //         }

    //         return $this->render('addTeacher', [
    //             'model' => $avis
    //         ]);
    //     }

    //     return $this->render('addTeacher', [
    //         'model' => $avis
    //     ]);    
    // }
    // public function updateTeacher(Request $request)
    // {
    //     $avis = new TeacherModel();
    //     $params = [
    //         'model' => $avis
    //     ];
    //     if ($request->isGet()){  
    //         $avis->loadData($request->getBody());
    //         $avis->select($avis->id);
    //         $avis->loadData($avis->dataList);
    //         $params = [
    //             'model' => $avis
    //         ];      
    //         return $this->render('updateTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $avis->loadData($request->getBody());

    //         if ($avis->update($avis->id)){
    //             Application::$app->session->sefFlash('success', 'Thanks for updating Teacher');
    //             Application::$app->response->redirect('avis');
    //         }

    //         return $this->render('updateTeacher', [
    //             'model' => $avis
    //         ]);
    //     }

    //     return $this->render('updateTeacher', [
    //         'model' => $avis
    //     ]);    
    // }

    

    // public function getTeacher()
    // {
    //     $avis = new TeacherModel();
    //     if ($avis->select($avis->id)){
    //         return $this->render('avis', [
    //             'model' =>  $avis->dataList
    //         ]);
    //     }
    // }

    // public function deleteTeacher(Request $request)
    // {
    //     $avis = new TeacherModel();
    //     if ($request->isGet()){  
    //         $avis->loadData($request->getBody());
    //         if ($avis->delete($avis->id)){ //to integrate validate method
    //             Application::$app->session->sefFlash('success', 'has successfully deleted');
    //             Application::$app->response->redirect('avis');
    //         }
    //     }
    // }
    
}