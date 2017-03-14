<?php
include "koneksi.php";
session_start();
if (isset($_POST['submit'])){
	$sqluser = $_POST['username'];
	$sqlpass = $_POST['password'];
	$query = "select * from user where username='$sqluser'";
	$sql = mysqli_query($konek, $query);
	$fetch = mysqli_fetch_array($sql);
	if ($sqluser == $fetch['username'] && $sqlpass == $fetch['password']){
		$_SESSION["level"] = $fetch['level'];
		$_SESSION["user"] = $fetch['username'];
    header("location: home.php?page=content");
	}
	else {
		header("location: log.php?alert=salah");
	}
}
else {

}
echo $_SESSION["level"];
?>
