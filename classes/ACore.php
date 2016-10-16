<?php

/**
 * Description of ACore
 *
 * @author Пользователь
 */
abstract class ACore {

    protected $db;

    public function __construct() {
        $this->db = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (!$this->db) {
            exit("Error coonect database" . mysql_error());
        }
        if (!mysqli_select_db($this->db, DB)) {
            exit("Not name database" . mysqli_error($this->db));
        }
        mysqli_query($this->db, "SET NAMES 'UTF8'");
    }
    protected function get_header() {
        include "header.php";
    }
   

    public function get_body() {
        
        //проверяем сожержит ли POST данные и если да, то вызываем обработчик формы
        if ($_POST||$_GET['del']||$_POST['groupdel']) {
            $this->obr();            
       }

        $this->get_header();
        $this->get_content();
         //include 'admin.php';
       
      
        
        
    }
    
    abstract function get_content();
    
             
        
   protected function get_text_row($id) {
        $query = "SELECT id,title,year,author,col_str FROM d_books WHERE id='$id'";
        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }
        $row = array();
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
        return $row;
    } 
}
