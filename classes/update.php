<?php

class update extends ACore {
    //пишем метод обработчика формы ввода
    protected function obr() {
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $author = $_POST['author'];
        $col_str = $_POST['col_str'];
        
        
        //делаем проверку заполнения обязатедльных полей
        if(empty($title) || empty($year) ||empty($author)) {
            exit("Не заполнены обязательные поля");
        }
        $query = " UPDATE d_books SET title='$title',year='$year',author='$author',col_str='$col_str' WHERE id='$id'";
        
        if(!mysqli_query($this->db,$query)) {
            exit(mysqli_error($this->db));
        }
        else {
          $_SESSION['res'] = "Изменения сохранены";
          header('Location:?option');
          exit();
        }
    }

        public function get_content() {
            
        if($_GET['id_text']){
            $id_text = (int) $_GET['id_text'];
        }    
        else {
            exit("Не правильные данные для этой статьи");
        }
        $text = $this->get_text_row($id_text);
        echo "<div id='main'>";
        if($_SESSION['res']) {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
        
        
        //выводим форму редактирования статьи
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Название:<br />
<input type='text' name='title' style='width:420px' value='$text[title]'>
<input type='hidden' name='id' style='width:420px' value='$text[id]'>        
<p>Год:<br />
<input type='text' name='year' style='width:420px'value='$text[year]'>
</p>
<p>Автор:<br />
<input type='text' name='author' style='width:420px'value='$text[author]'>
</p>
<p>Количество страниц:<br />
<input type='text' name='col_str' style='width:420px'value='$text[col_str]'>
</p>        
HEREDOC;


echo "<p><input type='submit' name='buttom' value='Сохранить'></p></form>";
echo "</div></div>";
    }
}

