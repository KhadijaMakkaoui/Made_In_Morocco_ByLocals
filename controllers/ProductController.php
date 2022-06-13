<?php

namespace app\controllers;

use app\core\Request;
use app\models\Image;
use app\models\Produit;
use app\core\Controller;
use app\core\Application;
use app\models\Categorie;
use app\models\SousCategorie;

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

    public function add(Request $request){
        $product = new Produit();
        $categorie=new Categorie();
        $s_categorie=new SousCategorie();
        $s_categorie->selectAll();
        $categorie->selectAll();
        if ($request->isGet()){
            if ($product->selectAll()){
                $data = $product->dataList;
                $img=$product->selectImage();
                $s_categ=$s_categorie->dataList;
                $categ=$categorie->dataList;
                
                // var_dump($categ);
                $this->setLayout('dashboard');        
                return $this->render('addProduct', [
                    'produits' => $data,
                    'image'   => $img,
                    's_categories'=>  $s_categ,
                    'categories'=>  $categ
                ]);
            }
            // return $this->render('productAdd', $params);
        }
        if($request->isPost())
        {
            $product->loadData($request->getBody());

            if ($product->save()){
                Application::$app->session->setFlash('success', 'Ajout effectuer avec succès');
                Application::$app->response->redirect('dashProducts');
            }
            $this->setLayout('dashboard');        
            return $this->render('addProduct', [
                'model' => $product
            ]);
        }
        $this->setLayout('dashboard');        
        return $this->render('addProduct', [
            'model' => $product
        ]);    
    }
    public function update(Request $request)
    {
        $product = new Produit();
        $categorie=new Categorie();
        $s_categorie=new SousCategorie();
        $s_categorie->selectAll();
        $categorie->selectAll();
        if ($request->isGet()){
            if ($product->selectAll()){
                $data = $product->dataList;
                $img=$product->selectImage();
                $s_categ=$s_categorie->dataList;
                $categ=$categorie->dataList;

                // var_dump($categ);
                $this->setLayout('dashboard');        
                return $this->render('updateProduct', [
                    'model' => $product,
                    'image'   => $img,
                    's_categories'=>  $s_categ,
                    'categories'=>  $categ
                ]);
            }
            // return $this->render('productAdd', $params);
        }
        if($request->isPost())
        {
            $product->loadData($request->getBody());

            if ($product->update($product->id)){
                Application::$app->session->setFlash('success', 'Thanks for updating Teacher');
                Application::$app->response->redirect('product');
            }

            return $this->render('updateProduct', [
                'model' => $product
            ]);
        }

        return $this->render('updateProduct', [
            'model' => $product
        ]);    
    }

    

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