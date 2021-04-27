<?php


namespace controller;


class AccountController
{

    function account(){
        $params =[
            "title" => "Account",
            "module" => "account.php"
        ];
        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
    }
    public function signin(){
        $first = htmlspecialchars($_POST["userfirstname"]);
        $last = htmlspecialchars($_POST["userlastname"]);
        $email = htmlspecialchars($_POST["usermail"]);
        $mp = password_hash($_POST["userpass"],PASSWORD_DEFAULT);
        $signin =\model\AccountModel::signin($first,$last,$email,$mp);


        $_POST = array();
        if($signin){
            reset($_POST);
            header('Location: /account?status=signin_success');
            exit();
        }
        header('Location: /account?status=signin_fail');



    }

    public function login(){
        //Récupération des informations du formulaire de connexion
        $email = htmlspecialchars($_POST["usermail"]);
        $mp = htmlspecialchars($_POST["userpass"]);
        $verif =\model\AccountModel::login($email,$mp);
        $_SESSION['login'] = $verif;
        if(!empty($verif)){
            $_SESSION['userlastname'] = $verif['lastname'];
            $_SESSION['userfirstname'] = $verif['firstname'];
            $_SESSION['user_id'] = $verif['id'];
            $_SESSION['usermail'] = $verif['mail'];
            header('Location: /store');
            exit();
        }
        header('Location: /account?status=login_fail');
        exit();
    }

    public function logout(){
        session_destroy();
        header('Location: /account?status=logout_success');
        exit();
    }
    public function infos(){
        $params=[
            "title" => "Personal info",
            "module" => "infos.php"
        ];
        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
}
public  function update(){
        $lastname = htmlspecialchars($_POST['userlastname']);
        $firstname = htmlspecialchars($_POST['userfirstname']);
        $mail = htmlspecialchars($_POST['usermail']);
        $verif = \model\AccountModel::updating($firstname,$lastname,$mail);
        if($verif){
            $_SESSION['userlastname'] = $lastname;
            $_SESSION['userfirstname'] = $firstname;
            $_SESSION['usermail'] = $mail;
            header('Location: /account/infos?status=update_success');
            exit();
        }
    header('Location: /account/infos?status=update_fail');
    exit();
}
}