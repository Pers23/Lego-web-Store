<?php


namespace model;


class AccountModel
{
    static function chech( String $firstname,String $lastname,String $mail,String $password): bool{
        //Vérification de la taille des noms et prénoms
        if ( strlen($firstname)< 2 || strlen($lastname)< 2) return false;
        //Vérification du format de l'adresse mail
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)) return false;

        // Connexion à la base de données
        $db = \model\Model::connect();

        //requête SQL
        $stmt = $db->prepare("SELECT mail FROM account WHERE mail = ?");
        //Vérification de l'adresse mail
        $stmt->execute(array($mail));
        if($stmt->fetch()) return false;
        //Vérification de la validité du mot de passe
        if(strlen($password)<6) return false;
        //Si tout est bon:
        else return true;
    }


    static function signin(String $firstname,String $lastname,String $mail,String $password): bool{
        //Connexion à la base de donnée


        if(self::chech($firstname, $lastname, $mail, $password)){
            $db = \model\Model::connect();

            //Requête SQL
           /* $sql = "INSERT INTO account(firstname,lastname,mail,password) VALUE ('$firstname','$lastname','$mail','$password')";

            $req = $db->prepare($sql);

            $req->execute();*/

            $sql = "INSERT INTO account(firstname,lastname,mail,password) VALUES(?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($firstname, $lastname, $mail, $password));
            return true;
        }
        return false;
    }

    static function chechupdate(String $firstname,String $lastname,String $mail){
        //Vérification de la taille des noms et prénoms
        if ( strlen($firstname)< 2 || strlen($lastname)< 2) return false;
        //Vérification du format de l'adresse mail
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)) return false;
        // Connexion à la base de données
        $db = \model\Model::connect();

        //requête SQL
        $stmt = $db->prepare("SELECT mail FROM account WHERE mail = ?");
        //Vérification de l'adresse mail
        $stmt->execute(array($mail));
        if(!$stmt->fetch()) return false;
        return true;
    }
    static function updating($firstname, $lastname, $mail){

        if(self::chechupdate($firstname,$lastname,$mail)){
            $db = \model\Model::connect();
            //echo ("Ok,c'est fait");exit();
            $sql ="UPDATE account SET firstname=?,lastname=?,mail=? WHERE mail=?";
            $req = $db->prepare($sql);
            $req->execute(array($firstname, $lastname, $mail,$_SESSION['usermail']));
            return true;
        }
        return false;
    }

    static function login($mail,$password){
        //Connexion à la base de donnée
        $db = \model\Model::connect();
        //requête sql

        $sql = "SELECT id,firstname,lastname,mail,password FROM account WHERE mail= ?";
           $req = $db->prepare($sql);
           $req->execute(array($mail));
           $user = $req->fetch();

           if(password_verify($password , $user['password'])) return $user;
           return null;
    }
    /*static function changeInfos(){
        //Connexion à la base de donnée
        $db = \model\Model::connect();
        //requête
    }*/

}