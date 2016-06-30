<?php require_once ("login.php"); ?>

<?php
echo '<h2>Список</h2>';
echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">';
$result = $mysqli->query("SELECT * FROM books.d_books ORDER BY d_books.id ASC");
echo '<table border="1">';
echo '<tr><th>ID</th><th>Название</th><th>Автор</th><th>Год</th><th>Кол-во страниц</th><th>Удл.</th></tr>';
while ( $item = mysqli_fetch_array( $result ) )
{
    echo '<tr>';
    echo '<td>'.$item['id'].'</td>';
    echo '<td>'.$item['title'].'</td>';
    echo '<td>'.$item['author'].'</td>';
    echo '<td>'.$item['year'].'</td>';
    echo '<td>'.$item['col_str'].'</td>';
    echo '<td><input type="checkbox" name="item[]" value="'.$item['id'].'" /></td>';
    echo '</tr>';
}
echo '</table>';
echo '<input type="submit" name="submitForm" value="Удалить отмеченные" />';
echo '</form>';

if ( isset ( $_POST['item'] ) )
{
    $ids = implode( ',', $_POST['item'] );
    $mysqli->query("DELETE FROM `d_books` WHERE `id` IN ('.$ids.')");
    header( 'Location: '.$_SERVER['PHP_SELF'] );
}

?>



