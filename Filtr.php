<?php
if(isset($_GET['FilmName'])) {
    $value = $_GET['FilmName'];
    include('ConnectDB.php');
    $FiltredCatalog = [];
    $data = $SQLCONN->query("SELECT * FROM catalog WHERE name LIKE '%$value%'");
    while($row = mysqli_fetch_object($data)) {
        $FiltredCatalog[] = $row;
    }

    echo json_encode($FiltredCatalog);
}
if(isset($_GET['FilmGenre'])) {
    $value = $_GET['FilmGenre'];
    include('ConnectDB.php');
    $FiltredCatalog = [];
    $data = $SQLCONN->query("SELECT * FROM catalog WHERE genre ='$value'");
    while($row = mysqli_fetch_object($data)) {
        $FiltredCatalog[] = $row;
    }

    echo json_encode($FiltredCatalog);
}