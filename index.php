<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
$template = $twig->loadTemplate('index.html');

include('ConnectDB.php');
$catalog = [];
$genre = [];
$result_genr = $SQLCONN->query("select * from genre");
while ($r = mysqli_fetch_object($result_genr)){
    $genre[]=$r;
}
$result_cat = $SQLCONN->query("select * from catalog");
while($r=mysqli_fetch_object($result_cat)) {
    $catalog[]=$r;
}

$Access = false;
$Session = (isset($_COOKIE['RequestSessionIWP']) and $_COOKIE['RequestSessionIWP'] != '');
if($Session){
    $Access = (json_decode($_COOKIE['RequestSessionIWP'], true)['access'] == '1');
}
echo $template->render(array('catalog' => $catalog, 'genre' => $genre, 'session' => $Session, 'access' => $Access));
?>