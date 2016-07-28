<?php

/**
 * Description of ACore
 *
 * @author Пользователь
 */
abstract class ACore {

    protected $db;

    public function __construct() {
        $this->db = mysql_connect(HOST, USER, PASSWORD);
        if (!$this->db) {
            exit("Error coonect database" . mysql_error());
        }
        if (!mysql_select_db(DB, $this->db)) {
            exit("Not name database" . mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");
    }
    protected function get_header() {
        include "header.php";
    }
   

    public function get_body() {
        
        //проверяем сожержит ли POST данные и если да, то вызываем обработчик формы
        if ($_POST||$_GET['del']) {
            $this->obr();            
       }

        $this->get_header();
        $this->get_content();
         //include 'admin.php';
       
      
        
        
    }
    
    abstract function get_content();
    
             
        
   protected function get_text_row($id) {
        $query = "SELECT id,title,year,author,col_str FROM d_books WHERE id='$id'";
        $result = mysql_query($query);
        if(!$result) {
            exit(mysql_error());
        }
        $row = array();
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                
        return $row;
    } 
}
