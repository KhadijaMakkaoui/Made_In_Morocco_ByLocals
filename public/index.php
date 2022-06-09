<?php

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\AvisController;
use app\controllers\CommandeController;
use app\controllers\ProductController;
use app\controllers\SiteController;
use app\models\User;


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
$app->router->get('/contact',[SiteController::class, 'contact']);
$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/login',[AuthController::class, 'login']);
$app->router->post('/login',[AuthController::class, 'login']);
$app->router->get('/register',[AuthController::class, 'register']);
$app->router->post('/register',[AuthController::class, 'register']);

$app->router->get('/logout',[AuthController::class, 'logout']);

$app->router->get('/categories',[SiteController::class, 'categories']);
$app->router->post('/categories',[SiteController::class, 'categories']);

$app->router->get('/registerVendeur',[SiteController::class, 'registerVendeur']);
$app->router->post('/registerVendeur',[SiteController::class, 'registerVendeur']);

$app->router->get('/panier',[SiteController::class, 'panier']);
$app->router->post('/panier',[SiteController::class, 'panier']);

$app->router->get('/wishList',[SiteController::class, 'wishList']);
$app->router->post('/wishList',[SiteController::class, 'wishList']);

$app->router->get('/dashHome',[ProductController::class, 'dashHome']);

$app->router->get('/dashProducts',[ProductController::class, 'productsList']);
$app->router->post('/dashProducts',[ProductController::class, 'productsList']);

$app->router->get('/dashCommandes',[CommandeController::class, 'commandesList']);
$app->router->post('/dashCommandes',[CommandeController::class, 'commandesList']);

$app->router->get('/dashAvis',[AvisController::class, 'avisList']);
$app->router->post('/dashAvis',[AvisController::class, 'avisList']);

$app->router->get('/dashProfile',[SiteController::class, 'dashProfile']);


$app->run();