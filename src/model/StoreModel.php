<?php

namespace model;

class StoreModel {

  static function listCategories(): array
  {
    // Connexion à la base de données
    $db = \model\Model::connect();

    // Requête SQL
    $sql = "SELECT id, name FROM category";
    
    // Exécution de la requête
    $req = $db->prepare($sql);
    $req->execute();

    // Retourner les résultats (type array)
    return $req->fetchAll();

    /**
     * listProducts() permettant de récupérer la liste des produits
     */
  }
  static function listProducts(): array{
      //Connexion à la base de donnée

      $db = \model\Model::connect();

      //Requête SQL

      $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category";

      // Exécution de la requête
      $req = $db->prepare($sql);
      $req->execute();

      // Retourner les résultats (type array)
      return $req->fetchAll();
  }
  /**
   * Fonction permettant de récupérer les informations du produit spécifié
   */

  static function infoProduct($id){
  //Connexion à la base de donnée
      $db =\model\Model::connect();

  //Requête SQL
  $sql = "SELECT product.name AS NomProduit,price,image,image_alt1 ,image_alt2 ,image_alt3,spec,category.name AS NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE product.id = $id";
  //Exécution de la requête

      $req = $db->prepare($sql);
      $req->execute();

      //Retourner le résultat

      return $req->fetch();

  }

}