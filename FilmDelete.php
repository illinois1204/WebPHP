<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $filmid = $_POST['FilmID'];

    include('ConnectDB.php');
    if($SQLCONN->query("DELETE FROM catalog WHERE id = $filmid")){
        echo "true";
    }
    else{
        echo "false";
    }
}