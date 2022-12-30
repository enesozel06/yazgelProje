<?php

include_once ("config.php");

$db = new Db();
if (!$db->connect()) {
    
	echo "<center>Veritabanına bağlanırken bir hata oluştu!";
	exit;
}
$user = $_SESSION["login_user"];


$username = $_POST["username"];
$password = $_POST["password"];

//$username = trim($username);
//$password = trim($password);

$password = md5($password);


$query = "SELECT * from dev_users WHERE username = '$username' and password = '$password'";


//$query = "SELECT * FROM `dev_users` WHERE `username`='$username' AND `password`='$password';";
//SELECT * FROM kullanicilar where sicil_okul_no = "1" and Password ="1"






$result = $db->select($query);
if ($result && count($result)==1) {

    $_SESSION["login_user"] = array(
        "id" => $result[0]["id"],    
        
		"name" => $result[0]["name"],
		"surname" => $result[0]["surname"],
		
		"usertype" => $result[0]["utype"]      
        
    );	
	$user = $_SESSION["login_user"];
	$usertype = $user["usertype"];

	
	if($usertype == "0" || $usertype =="2"){
		header("location: admin/index.php");
	}else if($usertype == "1"){
		header("location: accen/index.php");
	}
    
    exit;

} else {
    header("location: login.php?type=error");
    exit;

}
