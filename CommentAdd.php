<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $comment = trim($_POST['comment']);
    $PreviousRequest = $_SERVER['HTTP_REFERER'];
    $authusername = $_COOKIE['RequestSessionIWP'];
    parse_str(parse_url($PreviousRequest)['query'], $query);
    $FilmID = $query['FilmID'];

    if($comment == ''){
        header("Location: ".$PreviousRequest);
        exit();
    }
    include('ConnectDB.php');
    $SQLCONN->query("INSERT INTO comments VALUES(NULL, $FilmID, NOW(), '$authusername', '$comment')");
    header("Location: ".$PreviousRequest);
}