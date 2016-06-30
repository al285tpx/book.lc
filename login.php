<?php // login.php

$mysqli = new mysqli('localhost', 'root', '1', 'books');
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

?>