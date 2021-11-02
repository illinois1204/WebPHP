<?php

if(isset($_GET['gg'])){
//$rr = $_GET['gg'];
//echo "gg";
}
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
echo $twig->render('player.html', array());

?>
