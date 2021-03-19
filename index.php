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

/** Ecoute des requêtes entrantes *********************************************/

$router->listen();
