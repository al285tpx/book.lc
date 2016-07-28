<?php

/**
 * Description of main
 *
 * @author Пользователь
 */
class main extends ACore {
    
    public function get_content() {
        
        $query = "SELECT id, title, year, author, col_str FROM d_books";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        echo "<div id='main'>";
        //echo "<a style='color:red' href='?option=add'>Добавить новую запись</a><hr>";
        echo "<p style='font-size:14px;'><table id='admin_table' class='table'>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Author</th>
                <th>Col_str</th>
                <th></th>
                <th></th>
            </tr>";
         if($_SESSION['res']) {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
        
        $row = array();
        for ($i=0; $i < mysql_num_rows($result);$i++) { //цикл будет вытаскивать содержимое БД пока $i не станет меньше количества строк в $result 
          $row = mysql_fetch_array($result, MYSQL_ASSOC);
          printf("<p><tr><th>
              <a style='color:#585858' href='?option=update&id_text=%s'>%s</a></th> 
              <th>%s</th> 
              <th>%s</th> <th>%s |
              <a style='color:#red' href='?option=delete&del=%s'>Удалить</a></th>
              </p>", $row['id'], $row['title'],$row['year'], $row['author'], $row['col_str'], $row['id']);
        }
        
        
        
        echo "</div></div>";
    }
   
}

