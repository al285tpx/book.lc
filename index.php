<?php 
require_once ("login.php");
require_once("models/query.php");

$link = db_connect();

$article['id']='';
$article['title']='';
$article['year']='';
$article['author']='';
$article['col_str']='';
   
if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";

    if($action == "add"){
        if(!empty($_POST)){
            articles_new($link, $_POST['id'], $_POST['title'], $_POST['year'], $_POST['author'], $_POST['col_str']);
            header("Location: index.php");
        }
        include("edit_admin.php");
    }else if($action == 'edit'){
        if(!isset($_GET['id']))
            header('Location: index.php');
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0) {
            articles_edit($link, $id, $_POST['title'], $_POST['year'], $_POST['author'], $_POST['col_str']);
            header("Location: index.php");
        }

        $article = article_get($link, $id);
        include("article_admin.php");
    }else if($action == 'delete'){
        $id = $_GET['id'];
        $article = articles_delete($link, $id);
        header('Location: index.php');
    }
    else{
        $articles = articles_all($link);
        include("admin.php");
    }
?>



