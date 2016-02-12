<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Блог</title>
               <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <!-- Header (navbar) -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3>Books</h3>
                </div>
            </div>
        </nav>
        <!-- END Header (navbar) -->
        <div id="addart">
            <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <label>
                    Title
                    <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
                </label>
                <br>
                <label>
                    Year
                    <input type="date" name="year" value="<?=$article['year']?>" class="form-item" required>
                </label>
                <br>
                <label>
                    Author
                    <input type="text" name="author" value="<?=$article['author']?>" class="form-item" required>
                </label>
                <br>
                <label>
                    Col_str
                    <input type="text" name="col_str" value="<?=$article['col_str']?>" class="form-item" required>
                </label>
                <br>
                <input type="submit" value="Сохранить" class="btn">
            </form>
        </div>
        <footer>
            <p>
                Блог<br>Copyright &copy; 2016
            </p>
        </footer>
    </div>
    </body>
</hmtl>