<?php

use app\core\Application;



require_once __DIR__.'/vendor/autoload.php';
//load .env in your application with:
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
//////
$config=[
    'db' =>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']

    ]
    ];

$app=new Application(__DIR__,$config);


$app->db->ApplyMigrations();