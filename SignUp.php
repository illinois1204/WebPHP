<?php
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('pages');
$twig = new \Twig\Environment($loader);
if($_SERVER["REQUEST_METHOD"]=="GET") {
    echo $twig->render('SignUp.html', array());
}
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $SQLCONN = new mysqli('localhost','7271_kin','illinois99','7271_kin');
    if ($SQLCONN->connect_error) {
        die('Ошибка подключения (' . $SQLCONN->connect_errno . ') ' . $SQLCONN->connect_error);
    }
    if(count($SQLCONN->query("select email from users where email = '$email' limit 1")->fetch_assoc()) == 1){
        echo $twig->render('SignUp.html', array('uniqueerror' => true));
        $SQLCONN->close();
        exit();
    }
    $salt = bin2hex(random_bytes(6));
    $password = $salt.'@'.sha1($password.$salt);
    $SQLCONN->query("insert into users (id, username, email, password) values(null, '$username', '$email', '$password')");
    header('Location: /Login.php');
}
?>

