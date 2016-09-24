<?php // login.php
/**$mysqli = new mysqli('localhost', 'root', '1', 'books');
 * if ($mysqli->connect_error) {
 *    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
 *            . $mysqli->connect_error);
 *}
 */



define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '1');
define('MYSQL_DB' , 'books');
/**
 * @return mysqli
 */
require_once ("classes/database.class.php"); //подлючаем класс соединения с БД

$link = DataBase::Connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB); //присваиваем параметры соединения переменной


?>
