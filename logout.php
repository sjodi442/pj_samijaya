<?php
session_start();
$_SESSION["level"] = '0';
session_unset();
session_destroy();
header("location: log.php");
?>
