<?php
if(!isset($_COOKIE['RequestSessionIWP'])) {
    header("Location: /");
}

if(isset($_GET['FilmID'])){
    $filmid = $_GET['FilmID'];
    require_once 'vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('pages');
    $twig = new \Twig\Environment($loader);

    include('ConnectDB.php');
    $film = $SQLCONN->query("select * from catalog where id = '$filmid' limit 1")->fetch_assoc();
    if($film){
        echo $twig->render('player.html', array('film' => $film));
    }
    else{
        echo "404 Not found";
    }
}
else{
    echo "404 Not found";
}
?>
