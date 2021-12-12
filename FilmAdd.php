<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $filmName = $_POST['filmname'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    $filmgenre = $_POST['filmgenre'];
    $description = $_POST['description'];
    $poster = trim($_POST['poster']);
    $file = trim($_POST['file']);
    $PreviousRequest = $_SERVER['HTTP_REFERER'];

    include('ConnectDB.php');
    $SQLCONN->query("INSERT INTO catalog VALUES(NULL, '$filmName', $year, '$director', '$filmgenre', '$description', '$poster', '$file')");
    header("Location: ".$PreviousRequest);
}