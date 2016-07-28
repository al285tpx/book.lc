<?php 

session_start();

require_once ("config.php");
require_once ("classes/ACore.php");

if ($_GET['option']) {
    $class = trim(strip_tags($_GET['option'])); //фильтруем текст запроса, для безопасности 
} else {
    $class = 'main'; //иначе на главную
}
//проверка наличия файла класса 
if (file_exists("classes/" . $class . ".php")) {
    include ("classes/" . $class . ".php");
    if (class_exists($class)) {

        $obj = new $class; //создаем объект вызываемого класса
        $obj->get_body(); //присваевываем объекту метод для вывода
    } else {
        exit("<p>not data for output</p>");
    }
} else {
    exit("<p>Fail address</p>");
}
?>



