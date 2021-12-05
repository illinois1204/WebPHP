<?php
if(!isset($_COOKIE['RequestSessionIWP'])) {
    header("Location: /");
}
setcookie('RequestSessionIWP', null, time()-3600, "/");
header("Location: /");
?>