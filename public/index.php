<?php

use app\models\User;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\AvisController;
use app\controllers\HomeController;
use app\controllers\SiteController;
use app\controllers\PanierController;
use app\controllers\ProductController;
use app\controllers\CommandeController;


require_once __DIR__.'/../vendor/autoload.php';
//load .env in your application with:
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();
//////
$config=[
    'userClass' => User::class,
    'db' =>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
    ];

$app=new Application(dirname(__DIR__),$config);

$app->router->get('/',[SiteController::class, 'home']);

$app->router->get('/contact/{id}',[SiteController::class, 'contact']);
$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/login',[AuthController::class, 'login']);
$app->router->post('/login',[AuthController::class, 'login']);
$app->router->get('/register',[AuthController::class, 'register']);
$app->router->post('/register',[AuthController::class, 'register']);

$app->router->get('/logout',[AuthController::class, 'logout']);

$app->router->get('/boutique',[SiteController::class, 'boutique']);
$app->router->post('/boutique',[SiteController::class, 'boutique']);

$app->router->get('/registerVendeur',[AuthController::class, 'register']);
$app->router->post('/registerVendeur',[AuthController::class, 'register']);

$app->router->get('/wishList',[SiteController::class, 'wishList']);
$app->router->post('/wishList',[SiteController::class, 'wishList']);

$app->router->get('/dashHome',[ProductController::class, 'dashHome']);

$app->router->get('/dashProducts',[ProductController::class, 'productsList']);
$app->router->post('/dashProducts',[ProductController::class, 'productsList']);

$app->router->get('/addProduct',[ProductController::class, 'add']);
$app->router->post('/addProduct',[ProductController::class, 'add']);

$app->router->get('/updateProduct',[ProductController::class, 'update']);
$app->router->post('/updateProduct',[ProductController::class, 'update']);

$app->router->get('/deleteProduct',[ProductController::class, 'delete']);
$app->router->post('/deleteProduct',[ProductController::class, 'delete']);
//Search by categorie page
$app->router->get('/productsByCat',[ProductController::class, 'productByCtegorie']);
$app->router->post('/productsdByCat',[ProductController::class, 'productByCtegorie']);
//Details d'un produit
$app->router->get('/productDetails',[ProductController::class, 'productDetails']);
$app->router->post('/productDetails',[ProductController::class, 'productDetails']);

$app->router->get('/updateProduct',[ProductController::class, 'update']);
$app->router->post('/updateProduct',[ProductController::class, 'update']);

$app->router->get('/dashCommandes',[CommandeController::class, 'commandesList']);
$app->router->post('/dashCommandes',[CommandeController::class, 'commandesList']);

$app->router->get('/addCommande',[CommandeController::class, 'add']);
$app->router->post('/addCommande',[CommandeController::class, 'add']);

$app->router->get('/updateCommande',[CommandeController::class, 'update']);
$app->router->post('/updateCommande',[CommandeController::class, 'update']);

$app->router->get('/deleteCommande',[CommandeController::class, 'delete']);
$app->router->post('/deleteCommande',[CommandeController::class, 'delete']);

$app->router->get('/dashAvis',[AvisController::class, 'avisList']);
$app->router->post('/dashAvis',[AvisController::class, 'avisList']);

$app->router->get('/deleteAvis',[AvisController::class, 'delete']);
$app->router->post('/deleteAvis',[AvisController::class, 'delete']);

$app->router->get('/dashProfile',[SiteController::class, 'dashProfile']);

//Dashboard home
$app->router->get('/dashHome',[HomeController::class, 'dashHome']);
$app->router->post('/dashHome',[HomeController::class, 'dashHome']);
//Boutique page
$app->router->get('/boutique',[HomeController::class, 'boutique']);
$app->router->post('/boutique',[HomeController::class, 'boutique']);
//Panier page
$app->router->get('/panier',[PanierController::class, 'panier']);
$app->router->post('/panier',[PanierController::class, 'panier']);
//Panier delete
$app->router->get('/delete',[PanierController::class, 'delete']);
$app->router->post('/delete',[PanierController::class, 'delete']);


$app->run();