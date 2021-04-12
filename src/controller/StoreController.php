<?php

namespace controller;

class StoreController {

  public function store(): void
  {
    // Communications avec la base de données
    $categories = \model\StoreModel::listCategories();
    $listproducts = \model\StoreModel::listProducts();


    // Variables à transmettre à la vue
    $params = array(
      "title" => "Store",
      "module" => "store.php",
      "categories" => $categories,
        "listproducts" =>$listproducts

    );


    // Faire le rendu de la vue "src/view/Template.php"
    \view\Template::render($params);
  }

  public function product(int $id): void{
      $product =\model\StoreModel::infoProduct($id);
      if($product == null){
          header("Location: /store");
          exit();
      }
      $params = array(
          "title" => "product",
          "module" => "product.php",
          "product" => $product
      );
      // Faire le rendu de la vue "src/view/Template.php"
      \view\Template::render($params);
  }


}