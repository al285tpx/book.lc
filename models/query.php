<?php
/**
 * @param $link
 * @return array
 */
function articles_all($link){
    // Формируем запрос
    $query = "SELECT * FROM books.d_books ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)//если результат запроса пустой выводим ошибку соединения
        die(mysqli_error($link));

    // Извлекаем данные
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;
}
function article_get($link, $id_article){
    $query = sprintf("SELECT * FROM books.d_books WHERE id=%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));//если результать пустой выводим ошибку

    $article = mysqli_fetch_assoc($result);

    return $article;
}
function articles_new($link, $title, $year, $author, $col_str){
    // Подготовка
    $title = trim($title);
    $author = trim($author);

    // Если title пустой выводим false
    if ($title == '')
        return false;

    // Запрос
    $template_add = "INSERT INTO books.d_books (title, year, author, col_str) VALUES ('%s', %d, '%s', %d)";

    $query = sprintf($template_add,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $year),
        mysqli_real_escape_string($link, $author),
        mysqli_real_escape_string($link, $col_str));

    echo $query;
    /** @var TYPE_NAME $result */
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}
function articles_edit($link, $id, $title, $year, $author, $col_str){
    // Убираем лишние пробелы из значений переменных
    $title = trim($title);
    $author = trim($author);
    $id = (int)$id;

    // Проверка
    if ($title == '')
        return false;

    // Запрос
    $template_update = "UPDATE books.d_books SET title='%s', year='%d', author='%s', col_str='%d' WHERE id='%d'";

    $query = sprintf($template_update,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $year),
        mysqli_real_escape_string($link, $author),
        mysqli_real_escape_string($link, $col_str),
        $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}
function articles_delete($link, $id){
    $id = (int)$id;
    // Проверка
    if ($id == 0)
        return false;

    // Запрос
    $query = sprintf("DELETE FROM d_books WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}
function articles_intro($text, $len = 500)
{
    return mb_substr($text, 0, $len);
}
?>