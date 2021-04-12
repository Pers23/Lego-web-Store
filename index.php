<?php

/** Initialisation de l'autoloading et du router ******************************/

require('src/Autoloader.php');
Autoloader::register();

$router = new router\Router(basename(__DIR__));

/** Définition des routes *****************************************************/

// GET "/"
$router->get('/', 'controller\IndexController@index');

// Erreur 404
$router->whenNotFound('controller\ErrorController@error');

//GET "/Store"
$router->get('/store','controller\StoreController@store');

//GET "store/{:num}"
$router->get('/store/{:num}','controller\StoreController@product');

//GET "/account"

$router->get('/account','controller\AccountController@account');

//POST "/login"

$router->post('/login','controller\AccountController@login');

//POST "/signin"

$router->post('/signin','controller\AccountController@signin');

/** Ecoute des requêtes entrantes *********************************************/

$router->listen();
