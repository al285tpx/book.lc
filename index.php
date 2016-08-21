<?php
//ini_set('display_errors', 1);
require_once ("login.php");
require_once ("classes/Core.class.php");





if ($_GET['option']){
    $class = trim(strip_tags($_GET['option']));  //фильтруем текст запроса, для безопасности
else {
    $class = 'main'; //иначе на главную
    }

}
//проверка наличия файла класса
if(file_exists("classes/". $class . ".php")){
    include ("classes/" . $class . ".php");
    //проверяем обявлен ли класс
    if (class_exists($class)){
        $obj = new $class; //создаем объект вызываемого класса
        $obj->get_body(); //приваиваем объекту метод для вывода

    }
else{
        exit("Нет данных для вывода");
    }
else {
    exit("Не правильный адрес");
  }
}
?>



