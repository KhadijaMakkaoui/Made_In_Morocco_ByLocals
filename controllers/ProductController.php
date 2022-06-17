<?php

namespace app\controllers;

use app\core\Request;
use app\models\Image;
use app\models\Produit;
use app\core\Controller;
use app\models\UserData;
use app\core\Application;
use app\models\Categorie;
use app\models\Fabriquant;
use app\models\SousCategorie;

class ProductController extends Controller
{   
    /**
     * Affichage des produits
     */
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
    /**
     * Afficher les produits d'une categorie
     */
    public function productByCtegorie()
    {
        $product = new Produit();
        $categ=new Categorie();
       
        if(isset($_GET['categorie'])){ 
             $id_categorie=$_GET['categorie'];
            if ($product->selectProductsByCategory($id_categorie) ){
                $categ->select($id_categorie);
                $distinct_s_cat=$product->selectDistinctSousCategory($id_categorie);
                
                $categorie=$categ->dataList;
                return $this->render('productsByCat', [
                    'produits' => $product,
                    'categorie'=>  $categorie,
                    'distinct_s_cat' => $distinct_s_cat

                ]);
            }
        }
        Application::$app->response->redirect('/boutique');
    }
    /**
     * Afficher la page des details du produit séléctionner
     */
    public function productDetails()
    {
        $product = new Produit();
        $product->id=$_GET['id'];
        $categorie=new Categorie();
        $fabriquant=new Fabriquant();
        $data=new UserData();

        //  $fabriquant->select($product->id);
        // $categorie=$product->selectCategory();
        if ($product->select($_GET['id'])){
            return $this->render('productDetails', [
                'product' =>  $product->dataList,
                'p' => $product,
                'categorie' => $categorie,
                'fabriquant' => $fabriquant,
                'userData' =>$data
            ]);
        }
    }
    /**
     * Ajouter un produit
     */
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
            $image=new Image();
            // $product->loadData($request->getBody());
            $image->loadData($request->getBody());

            if ($image->save()){
                Application::$app->session->setFlash('success', 'Ajout effectuer avec succès');
            }
            $this->setLayout('dashboard');        
            return $this->render('addProduct', [
                'model' => $image
            ]);
            // if ($product->save()){
            //     Application::$app->session->setFlash('success', 'Ajout effectuer avec succès');
            //     Application::$app->response->redirect('dashProducts');
            // }
            // $this->setLayout('dashboard');        
            // return $this->render('addProduct', [
            //     'model' => $product
            // ]);
        }
        $this->setLayout('dashboard');        
        return $this->render('addProduct', [
            'model' => $product
        ]);    
    }
    /**
     * Modifier un produit
     */
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