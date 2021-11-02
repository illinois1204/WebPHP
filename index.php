<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
$template = $twig->loadTemplate('index.html');
$SQLCONN = new mysqli('localhost','7271_kin','illinois99','7271_kin');
mysqli_set_charset($SQLCONN, "utf8");
if ($SQLCONN->connect_error) {
    die('Ошибка подключения (' . $SQLCONN->connect_errno . ') ' . $SQLCONN->connect_error);
}
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
echo $template->render(array('title' => 'Welcome!', 'catalog' => $catalog, 'genre' => $genre));
?>