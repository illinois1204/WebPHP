<?php
if(isset($_GET['FilmID'])){
    $filmid = trim($_GET['FilmID'], " '");
    require_once 'vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('pages');
    $twig = new \Twig\Environment($loader);

    include('ConnectDB.php');
    $film = $SQLCONN->query("select * from catalog where id = '$filmid' limit 1")->fetch_assoc();
    if($film){
        $comments = [];
        $result = $SQLCONN->query("select * from comments where filmid = $filmid ORDER BY date Desc");
        while ($r = mysqli_fetch_object($result)){
            $comments[]=$r;
        }

        $Access = false;
        $Session = (isset($_COOKIE['RequestSessionIWP']) and $_COOKIE['RequestSessionIWP'] != '');
        if($Session){
            $Access = (json_decode($_COOKIE['RequestSessionIWP'], true)['access'] == '1');
        }
        echo $twig->render('player.html', array('film' => $film, 'comments' => $comments, 'session' => $Session, 'access' => $Access));
    }
    else{
        echo "404 Not found";
    }
}
else{
    echo "404 Not found";
}
?>
