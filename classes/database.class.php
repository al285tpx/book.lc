<?php

/*
 *  Класс создает соединение с базой данных
 */
class  DataBase
{
    public static $mConnect; //Хранит результаты соединения с базой данных
    public static $mSelectBD; //Хранит результаты выбора базы данных

    //Метод создает соединение с базой данных 
   
    public static function Connect($host, $user, $pass, $name)
    {
        //Пробуем создать соединенние с базой данных
        self::$mConnect = mysqli_connect($host, $user, $pass, $name);

        //Если подключение не прошло, вывести сообщение об ошибке
        if(!self::$mConnect)
        {
            echo "<p><b>К сожалению, не удалось подключится к серверу MySQL</b></p>";
            exit();
            return false;
        }

        //Возвращаем результат
        return self::$mConnect;

    }
    //Метод закрывает соединение с базой данных
    public static function Close()
    {
        //Возвращаем результат
        return mysqli_close(self::$mConnect);
    }
}