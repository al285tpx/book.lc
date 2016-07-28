<?php

class delete extends ACore {
    public function obr() {
        if($_GET['del']) {
           $id_text = (int)$_GET['del'];
           
           $query = "DELETE FROM d_books WHERE id='$id_text'";
           
           if(mysql_query($query)) {
               $_SESSION['res'] = "Удалено";
               header("Location:?option=");
               exit();
           }
        else {
               exit("Ошибка удаления");
        }
        }
        else {
            exit("Не верные данные для этой страницы");
        }
    }
    
    public function get_content() {
        
    }
}
