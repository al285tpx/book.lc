<?php
//ini_set('display_errors', 1);
require_once ("login.php");
require_once ("classes/query.class.php");
require_once("models/query.php");


/**$article['id']='';
* $article['title']='';
* $article['year']='';
* $article['author']='';
*$article['col_str']='';
 */

if(isset($_GET['action'])) // если есть входящий параметр
    $action = $_GET['action'];//то он будет равнятся массиву с ключом action
else
    $action = "";//иначе action = пустоте

    if($action == "add"){ //если action = add добавить
        if(!empty($_POST)){
            articles_new($link, $_POST['title'], $_POST['year'], $_POST['author'], $_POST['col_str']);
            header("Location: index.php");
        }

        include("edit_admin.php");// подгружаем шаблон для добавления записи

    }else if($action == 'edit'){
        if(!isset($_GET['id']))
            header('Location: index.php');
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0) {
            articles_edit($link, $id, $_POST['title'], $_POST['year'], $_POST['author'], $_POST['col_str']);
            header("Location: index.php");
        }

        $article = article_get($link, $id);
        include("edit_admin.php");

    }else if($action == 'delete'){
        $id = $_GET['id'];
        $article = articles_delete($link, $id);
        header('Location: index.php');
    }
    else
        {
        $articles = articles_all($link);
        //$articles = new query;
        //$articles->articles_all($link);
        include("admin.php");
    }
?>



