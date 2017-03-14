<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
  <title>Login Samijaya</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
    if (isset($_GET['alert'])){
      echo "<script> window.onload = alert('password/username salah') </script>";
    }
    else {
    }
  ?>
<hgroup>
  <h1>Samijaya</h1>
</hgroup>
<form method="post" action="auth.php">
  <div class="group">
    <input type="text" name="username"><span class="highlight"></span><span class="bar"></span>
    <label>Name</label>
  </div>
  <div class="group">
    <input type="password"  name="password"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <button type="submit" name="submit" class="button buttonBlue">login
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
</form>
<footer><a href="#" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
  <p>samijaya</p>
</footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
