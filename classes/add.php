<?php

class add extends ACore {
    //пишем метод обработчика формы ввода
    protected function obr() {
                
        $title = $_POST['title'];
        $year = $_POST['year'];
        $author = $_POST['author'];
        $col_str = $_POST['col_str'];
        
        
        //делаем проверку заполнения обязатедльных полей
        if(empty($title) || empty($year) ||empty($author)) {
            exit("Не заполнены обязательные поля");
        }
        $query = " INSERT INTO d_books 
                     (title,year,author,col_str)
                   VALUES ('$title','$year','$author','$col_str')";
        
        if(!mysql_query($query)) {
            exit(mysql_error());
        }
        else {
          $_SESSION['res'] = "Изменения сохранены";
          header('Location:?option=add');
          exit();
        }
    }

        public function get_content() {
    
        echo "<div id='main'>";
        if($_SESSION['res']) {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
                
        //выводим форму редактирования записи
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Название:<br />
<input type='text' name='title' style='width:420px'>
<p>Год:<br />
<input type='text' name='year' style='width:420px'>
</p>
<p>Автор:<br />
<input type='text' name='author' style='width:420px'>
<p>Количество страниц:<br />
<input type='text' name='col_str' style='width:420px'>        
</p>
HEREDOC;

echo "<p><input type='submit' name='buttom' value='Сохранить'></p></form>";
echo "</div></div>";
    }
}

