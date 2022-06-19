<?php

namespace app\controllers;

use app\core\Request;
use app\models\Image;
use app\core\Response;
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
        $s_categorie=new SousCategorie();
        $obj_img=new Image();
        //  $image =new Image();
        if ($product->selectAll()){
            $data = $product->dataList;
            $img=$product->selectImage();
            $product_s_categ=$product->selectSousCategory();
            $categ=$product->selectCategory();
           
            $this->setLayout('dashboard');        
            return $this->render('dashProducts', [
                'produits' => $data,
                'image'   => $img,
                's_categorie'=>  $product_s_categ,
                'categorie'=>  $categ,
                'obj_s_categ' => $s_categorie,
                'obj_image' => $obj_img

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
        // $categorie=new Categorie();
        $s_categorie=new SousCategorie();
        $image=new Image();

        $s_categorie->selectAll();
        // $categorie->selectAll();
        $img=$product->selectImage();

        $s_categ=$s_categorie->dataList;
        // $categ=$categorie->dataList;

        if ($request->isGet()){
            if ($product->selectAll()){
                $data = $product->dataList;
                $this->setLayout('dashboard'); 
                       
                return $this->render('addProduct', [
                    'produits' => $data,
                    'image'   => $img,
                    's_categories'=>  $s_categ,
                    // 'catego-ries'=>  $categ
                ]);
            }
            // return $this->render('productAdd', $params);
        }
        if($request->isPost())
        {
            if(isset($_POST['submit_img'])){
                $image->loadData($request->getBody());

                if ($image->save()){
                    Application::$app->session->setFlash('success', 'Ajout effectuer avec succès');
                    $id_inserted=$image->getLastInsetedId();
                    // $isImageUploaded=true;
                }
                $this->setLayout('dashboard');        
                return $this->render('addProduct', [
                    'image' => $image,
                    'id_img' => $id_inserted,
                    's_categories'=>  $s_categ,
                ]);
            }
            if(isset($_POST['submit_data'])){
                    $product->loadData($request->getBody());
                    if ($product->save() && $product->fk_image){
                        Application::$app->session->setFlash('success', 'Ajout effectuer avec succès');
                        Application::$app->response->redirect('dashProducts');
                    }
            }

        }
        $this->setLayout('dashboard');        
        return $this->render('addProduct', [
            'model' => $product
        ]);    
    }
    /**
     * Modifier un produit
     */
    public function update(Request $request,Response $response)
    {
        $product = new Produit();
        $image=new Image();
        $s_categorie=new SousCategorie();
        $s_categorie->selectAll();
       
        $s_categList=$s_categorie->dataList;

        if ($request->isGet()){
            $_SESSION['id_prod']=$_GET['id'];
                $id_prod=$request->getBody();
                $product->select($id_prod['id']);

                $data = $product->dataList;

                $s_categorie->select($data['fk_s_categorie']);
                $p_s_cat= $s_categorie->dataList;
                $img=$product->selectImage();
                $this->setLayout('dashboard');        
                return $this->render('updateProduct', [
                    'produit' => $data,
                    'image'   => $img,
                    's_categories'=>  $s_categList,
                    'p_s_cat' => $p_s_cat
                ]);
            // return $this->render('productAdd', $params);
        }
        if($request->isPost())
        {
           //Get data
            $product->select($_SESSION['id_prod']);

            $data = $product->dataList;
            
            $s_categorie->select($data['fk_s_categorie']);
            $p_s_cat= $s_categorie->dataList;
            $img=$product->selectImage();
            $this->setLayout('dashboard');        
            

            if(isset($_POST['submit_img'])){
   
                $image->loadData($request->getBody());
                if ($image->update($data['fk_image'])){
                  
                    return $this->render("updateProduct", [
                        'produit' => $data,
                        'image'   => $img,
                        's_categories'=>  $s_categList,
                        'p_s_cat' => $p_s_cat
                    ]);
                }
            }
            if(isset($_POST['submit_data'])){
                $product->loadData($request->getBody());

                if ($product->update($_SESSION['id_prod'])){
                    Application::$app->response->redirect('dashProducts');
                }
            }

        }
        $this->setLayout('dashboard');        
        return $this->render('addProduct', [
            'model' => $product
        ]); 
    }


    public function delete(Request $request)
    {
        $p = new Produit();
        if ($request->isGet()){  
            $p->loadData($request->getBody());
            
            if ($p->delete($p->id)){ //to integrate validate method
                Application::$app->session->setFlash('success', 'has successfully deleted');
                Application::$app->response->redirect('dashProducts');
            }
        }
    }
    
}