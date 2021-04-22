<?php


namespace model;


class CommentModel
{
    //Fonction permettant de retrouver l'identifiant de l'utilisateur
    static function UserId($mail):int{
        $db = \model\Model::connect();
        $sql = "select id from account where mail = ?";
        $req = $db->prepare($sql);
        $req->execute(array($mail));
        $id = $req->fetch();
        if($id) return $id['id'];
        return 0;
    }
    //fonction permettant d'ajouter un commentaire
static function insertComment(int $id_product,string $mail,string $content): bool{
    $db =\model\Model::connect();
    $sql = "INSERT INTO comment(id_product,id_account,content,date) VALUES  (?,?,?,now())";
    $req =$db->prepare($sql);
    $id_account = self::UserId($mail);
    if($req->execute(array($id_product,$id_account,$content))) return true;
    return false;
}
//fonction pour afficher les commentaires existants
static  function listComment($id_product):array{
    $db =\model\Model::connect();
    $sql = "select firstname,lastname,date,content from comment inner join account on comment.id_account = account.id where id_product = ?";
    $req =$db->prepare($sql);
    $req->execute(array($id_product));
    return $req->fetchAll();
}
}