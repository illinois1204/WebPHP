<?php
$HOST = "localhost";
$USERNAME = "7271_kin";
$PASSWORD = "illinois99";
$DATABASE = "7271_kin";

$SQLCONN = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
mysqli_set_charset($SQLCONN, "utf8");
if ($SQLCONN->connect_error) {
    die('Ошибка подключения (' . $SQLCONN->connect_errno . ') ' . $SQLCONN->connect_error);
}
?>
