<?php


namespace controller;


class CartController
{
    public function cart(){
        $params =[
            "title"=>"Panier",
            "module"=>"cart.php"
        ];
        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
    }
    public function add(){

    }

}