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
  
//Méthode pour afficher les détails de chaques produits
  public function product(int $id): void{
      $product =\model\StoreModel::infoProduct($id);
      //Affichage de la liste des commentaires
      $comments =\model\CommentModel::listComment($id);
      if($product == null){
          header("Location: /store");
          exit();
      }
      $params = array(
          "title" => "product",
          "module" => "product.php",
          "product" => $product,
          "comment" =>$comments
      );
      // Faire le rendu de la vue "src/view/Template.php"
      \view\Template::render($params);
  }
  
  //Fonction de recherche
    public function search(){

      $name=(!empty($_POST['search'])) ? htmlspecialchars($_POST['search']) : null;
      $category = (!empty($_POST['category'])) ? $_POST['category'] : null;
      $price =(!empty($_POST['order'])) ? htmlspecialchars($_POST['order']) : null;
    $search =\model\StoreModel::searchEngine($name,$category,$price);
    //var_dump($search);exit();
    $categories =\model\StoreModel::listCategories();
      $params = array(
        "title" => "search",
        "module" => "store.php",
        "listproducts" => $search,
        "categories"=>$categories
      );
        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);

    }


}