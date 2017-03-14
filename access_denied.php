<?php session_start(); ?>
<html>
<head>

</head>
<body>
<h1 <?php if ($_SESSION["level"] == 1) echo "hidden"; else ; ?> align="center">Selamat datang <?php echo $_SESSION['user']; ?></h1>
<?php
if ($_SESSION["level"] == 1){
  include "tagihan.php";
}
else{
  
}
 ?>

</body>
</html>
