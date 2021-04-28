<?php
/** Démarrage de la session */
session_start();
/** Initialisation de l'autoloading et du router ******************************/

require('src/Autoloader.php');
Autoloader::register();


$router = new router\Router(basename(__DIR__));

/** Définition des routes *****************************************************/

// Route vers la page d'accueuil
$router->get('/', 'controller\IndexController@index');

// S'il n'y a pas la route demandée
$router->whenNotFound('controller\ErrorController@error');

//Route vers le Store
$router->get('/store','controller\StoreController@store');

//Envoi de la requête de recherche

$router->post('/store/search','controller\StoreController@search');

//Route vers un article du store
$router->get('/store/{:num}','controller\StoreController@product');

//Envoi des commentaires
$router->post('/postComment/{:num}','controller\CommentController@postComment');

//Route vers le compte

$router->get('/account','controller\AccountController@account');

//Envoi du formulaire de connexion

$router->post('/account/login','controller\AccountController@login');

//Envoi du formulaire d'inscription

$router->post('/account/signin','controller\AccountController@signin');

//Route pour la deconnexion

$router->get('/account/logout','controller\AccountController@logout');
//Routes vers les informations du compte
$router->get('/account/infos','controller\AccountController@infos');
$router->post('/account/update','controller\AccountController@update');
//Route vers le panier
$router->get('/cart','controller\CartController@cart');
$router->post('cart/add','controller\CartController@add');
/** Ecoute des requêtes entrantes *********************************************/

$router->listen();
