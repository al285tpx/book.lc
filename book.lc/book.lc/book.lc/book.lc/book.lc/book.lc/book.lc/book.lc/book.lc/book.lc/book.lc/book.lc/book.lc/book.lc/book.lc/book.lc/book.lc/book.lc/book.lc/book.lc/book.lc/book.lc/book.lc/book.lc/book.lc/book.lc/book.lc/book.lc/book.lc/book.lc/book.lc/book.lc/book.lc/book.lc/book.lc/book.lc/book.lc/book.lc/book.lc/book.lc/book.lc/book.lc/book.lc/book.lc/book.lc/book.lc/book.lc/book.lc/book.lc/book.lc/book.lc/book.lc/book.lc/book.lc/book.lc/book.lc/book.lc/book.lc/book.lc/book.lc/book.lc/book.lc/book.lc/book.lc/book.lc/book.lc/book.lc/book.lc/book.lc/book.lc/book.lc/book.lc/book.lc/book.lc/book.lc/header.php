<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Books</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="javascript/js1.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <!-- Header (navbar) -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3><a href="index.php?option">Books</a></h3>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?option=add">Создать запись</a></li>
                </ul>
            </div>
        </nav>
        <!-- END Header (navbar) -->
         <?php
             echo "GET<br>";
        foreach($_GET as $key => $value)
        {
           echo "\$_GET[".$key."] = ".$value."<br>";
        }
        echo "<br>POST<br>";
        foreach($_POST as $key => $value)
        {
           echo "\$_POST[".$key."] = ".$value."<br>";
        }
        ?>

