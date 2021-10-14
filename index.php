<?php

require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
$template = $twig->loadTemplate('index.html');
echo $template->render(array(
    'title' => 'Welcome!'
));

?>