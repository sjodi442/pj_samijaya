<html>
<head>
  <title>
  </title>
</head>
<body>
  <?php
    if (isset($_GET['alert'])){
      echo "<script> window.onload = alert('password/username salah') </script>";
    }
    else {

    }
  ?>
  <form method="post" action="home.php">
    username: <input type="text" placeholder="masukan username" name="username"><br>
    pass : <input type="password" placeholder="masukan pass" name="password"><br>
    <input type="submit" name="submit">
  </form>
</body>
</html>
