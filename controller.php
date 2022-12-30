<?php
include_once("config.php");
$db = new Db();
$user = $_SESSION["login_user"];


if (isset($_POST['cmd']) && $_POST['cmd'] == "useradd") { //Kullanıcı kaydı oluşturma

	$firstname = $_POST["firstname"];
	$surname = $_POST["surname"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password = md5($password);
	$sql = "INSERT INTO `linkshorter`.`dev_users` (`name`, `surname`, `username`, `password`, `utype`) VALUES ('$firstname', '$surname', '$username', '$password', '1')";
	$result = $db->query($sql);
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
}

//

if (isset($_POST['cmd']) && $_POST['cmd'] == "messageadd") { //Kullanıcı kaydı oluşturma

	$message = $_POST["message"];
	$token = $_POST["token"];


	$sq = "SELECT * FROM `dev_message` WHERE token='$token'";
	$result1 = $db->query($sq);
	if (mysqli_num_rows($result1) > 0) {
		echo 3;
	} else {

		$datee = date("d/m/Y");
		$sql = "INSERT INTO `dev_message` (`message`, `token`, `date`) VALUES ('$message', '$token','$datee')";
		$result = $db->query($sql);
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}
	}
}

if (isset($_POST['cmd']) && $_POST['cmd'] == "shorturladd") { //Kullanıcı kaydı oluşturma

	$token = $_POST["token"];
	$shorturl = $_POST["shorturl"];
	$userid = $_POST["userid"];


	$sq = "SELECT * FROM `url` WHERE token='$token' and shorten_url='$shorturl' and uid='$userid'";
	$result1 = $db->query($sq);
	if (mysqli_num_rows($result1) > 0) {
		echo 3;
	} else {


		$sql = "INSERT INTO `url` (`shorten_url`, `token`, `uid`,`degismesayi`) VALUES ('$shorturl', '$token','$userid','1')";
		$result = $db->query($sql);
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
//

if (isset($_POST['cmd']) && $_POST['cmd'] == "shorturlupdate") { //Kullanıcı kaydı oluşturma

	$token = $_POST["token"];
	$shorturl = $_POST["shorturl"];
	$userid = $_POST["userid"];


	$sql = "UPDATE url SET degismesayi = degismesayi + 1,shorten_url= '$shorturl' WHERE uid = '$userid' and id='$token' ";
	$result = $db->query($sql);
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
}