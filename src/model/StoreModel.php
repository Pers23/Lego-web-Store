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
  $sql = "SELECT product.id as identite,product.name AS NomProduit,price,image,image_alt1 ,image_alt2 ,image_alt3,spec,category.name AS NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE product.id = ?";
  //Exécution de la requête

      $req = $db->prepare($sql);
      $req->execute(array($id));

      //Retourner le résultat

      return $req->fetch();

  }

  //Fonction permettant la recherche d'élémentds
    static function searchEngine($name,$category,$price){

        //Connexion à la base de donnée
        $db =\model\Model::connect();
        $cat1=(isset($category[0]))? $category[0]:'';
        $cat2=(isset($category[1]))? $category[1]:'';
        $cat3=(isset($category[2]))? $category[2]:'';
        $sql = null;
        // get the search terms from the url
        $name="%".$name."%";
        if(isset($name) && !isset($category) && !isset($price)) {
            //echo ("nom");exit();
            $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE product.name LIKE (?)";
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute(array($name));
            //Retourner le résultat
            return $req->fetchAll();

        }elseif(!isset($name) && isset($category) && !isset($price)){
            //echo ("cat");exit();
            $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN (?,?,?)";
            $req = $db->prepare($sql);
            //Exécution de la requête

                $req->execute(array($cat1,$cat2,$cat3));
            //Retourner le résultat
            return $req->fetchAll();
        }elseif(!isset($name) && !isset($category) && isset($price)){
            //echo ("prix");exit();
            if($price == 'the_most')
            {
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category  ORDER BY price ASC ";
            }
            else{
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category  ORDER BY price DESC ";
            }
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            //Retourner le résultat
            return $req->fetchAll();
        } elseif(isset($name) && isset($category) && !isset($price) ){
            //echo ("nom et category");exit();
            $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN(?,?,?) AND product.name LIKE (?)";
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute(array($cat1,$cat2,$cat3,$name));
            //Retourner le résultat
            return $req->fetchAll();
        }elseif(isset($name) && !isset($category) && isset($price)){
            //echo ("nom et prix");exit();
            if($price == 'the_most'){
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE product.name LIKE (?)  ORDER BY price ASC ";
            }
            else{
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE product.name LIKE (?)  ORDER  BY price DESC ";
            }
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute(array($name));
            //Retourner le résultat
            return $req->fetchAll();
        }elseif(isset($name) && isset($category) && isset($price)){
            //echo ("cat prix");exit();
            if ($price == 'the_most'){
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN(?,?,?) ORDER BY price ASC ";
            }
            else {
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN(?,?,?)  ORDER BY price DESC ";
            }
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute(array($cat1,$cat2,$cat3));
            //Retourner le résultat
            return $req->fetchAll();
        } elseif(isset($name) && isset($category) && isset($price)){
            //echo ("tout");exit();
            if($price == 'the_most'){
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN(?,?,?) AND product.name LIKE (?) ORDER BY price ASC ";
            }
            else{
                $sql = "SELECT product.id as identifiant,product.name as NomProduit,price,image,category.name as NomCategory FROM product INNER JOIN category ON category.id = product.category WHERE category.name IN(?,?,?) AND product.name LIKE (?) ORDER BY price DESC ";
            }
            //Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute(array($cat1,$cat2,$cat3,$name));
            //Retourner le résultat
            return $req->fetchAll();

        }
        if($sql == null) {
            //echo("rien");exit();
            return self::listProducts();
        }



    }

}