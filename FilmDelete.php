<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $filmid = $_POST['FilmID'];

    include('ConnectDB.php');
    $SQLCONN->query("DELETE FROM catalog WHERE id = $filmid");
    echo "jopa";
//    header("Location: ".$PreviousRequest);
}