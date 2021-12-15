<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
$template = $twig->loadTemplate('about.html');

$Access = false;
$Session = (isset($_COOKIE['RequestSessionIWP']) and $_COOKIE['RequestSessionIWP'] != '');
if($Session){
    $Access = (json_decode($_COOKIE['RequestSessionIWP'], true)['access'] == '1');
}
echo $template->render(array('session' => $Session, 'access' => $Access));
?>