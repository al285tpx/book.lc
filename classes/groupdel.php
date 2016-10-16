<?php

class groupdel extends ACore {
    public function obr() {
        if(isset($_POST['item'], $_POST['id']) && is_array($_POST['id']) && !empty($_POST['id'])) {
           $id = array();
    foreach($_POST['id'] as $value)
    {
        if($value > 0){
        $id[] = (int)$value;
        }
    }
    
    if(!empty($id)){
           
           $query = "DELETE FROM `d_books` WHERE `id` IN(". implode($id, ',') .")";
           }
           
           if(mysqli_query($this->db, $query)) {
               $_SESSION ['res'] = "Удалено";
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