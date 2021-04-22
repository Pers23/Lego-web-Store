<?php


namespace controller;


class CommentController
{
public function postComment($id_product){
    $content=htmlspecialchars($_POST['content']);
    $mail =$_SESSION['usermail'];
    //$liste =\model\CommentModel::listComment($id_product);
    $insert = \model\CommentModel::insertComment($id_product,$mail,$content);
    if ($insert){
        header('Location: /store/'.$id_product.'?status=post_success');
    }else{
        header('Location: /store/'.$id_product.'?status=post_fail');
    }
    exit();

    /* $params = array(
         "title" => "Product",
         "module" => "product.php",
         //"listComment" => $liste,
         "insertComment" =>$insert
     );
     // Faire le rendu de la vue "src/view/Template.php"
     \view\Template::render($params);*/


}
}