<?php

session_start();
session_destroy();
setcookie("kolor", 0,  time()-3600);
header('Location: index.php');

?>