<?php

namespace app\controllers;

use app\core\Request;
use app\models\Image;
use app\models\Produit;
use app\core\Controller;
use app\core\Application;

class ProductController extends Controller
{   
    // public $product = new Produit();
    // public $image =new Image();
    public function productsList()
    {

         $product = new Produit();
        //  $image =new Image();
        if ($product->selectAll()){
            $data = $product->dataList;
            $img=$product->selectImage();
            $s_categ=$product->selectSousCategory();
            $categ=$product->selectCategory();
            $this->setLayout('dashboard');        
            return $this->render('dashProducts', [
                'produits' => $data,
                'image'   => $img,
                's_categorie'=>  $s_categ,
                'categorie'=>  $categ
            ]);
        }
     }
    

    // public function addTeacher(Request $request){
    //     $product = new Product();
    //     $params = [
    //         'model' => $product,
    //     ];
    //     if ($request->isGet()){
    //         return $this->render('addTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $product->loadData($request->getBody());

    //         if ($product->save()){
    //             Application::$app->session->setFlash('success', 'Updated successfully');
    //             Application::$app->response->redirect('product');
    //         }

    //         return $this->render('addTeacher', [
    //             'model' => $product
    //         ]);
    //     }

    //     return $this->render('addTeacher', [
    //         'model' => $product
    //     ]);    
    // }
    // public function updateTeacher(Request $request)
    // {
    //     $product = new TeacherModel();
    //     $params = [
    //         'model' => $product
    //     ];
    //     if ($request->isGet()){  
    //         $product->loadData($request->getBody());
    //         $product->select($product->id);
    //         $product->loadData($product->dataList);
    //         $params = [
    //             'model' => $product
    //         ];      
    //         return $this->render('updateTeacher', $params);
    //     }
    //     if($request->isPost())
    //     {
    //         $product->loadData($request->getBody());

    //         if ($product->update($product->id)){
    //             Application::$app->session->sefFlash('success', 'Thanks for updating Teacher');
    //             Application::$app->response->redirect('product');
    //         }

    //         return $this->render('updateTeacher', [
    //             'model' => $product
    //         ]);
    //     }

    //     return $this->render('updateTeacher', [
    //         'model' => $product
    //     ]);    
    // }

    

    // public function getTeacher()
    // {
    //     $product = new TeacherModel();
    //     if ($product->select($product->id)){
    //         return $this->render('product', [
    //             'model' =>  $product->dataList
    //         ]);
    //     }
    // }

    // public function deleteTeacher(Request $request)
    // {
    //     $product = new TeacherModel();
    //     if ($request->isGet()){  
    //         $product->loadData($request->getBody());
    //         if ($product->delete($product->id)){ //to integrate validate method
    //             Application::$app->session->sefFlash('success', 'has successfully deleted');
    //             Application::$app->response->redirect('product');
    //         }
    //     }
    // }
    
}