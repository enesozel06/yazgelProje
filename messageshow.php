<?php
include_once("config.php");
?>
<?php
session_start();
$db = new Db();
session_start();
$user = $_SESSION["login_user"];
$uid = $user["id"];
if (!$user) {
    header("location: logout.php");
    exit;
}

try {
    $token = $_GET["t"];
} catch (Exception $e) {
    //echo "mesaj -> ".$e->getMessage();
    $token = "";
}
if ($token) {

    $sql = "SELECT * FROM dev_message where token='$token'";
    $result = $db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
?>
        <label>Date: <?php echo $rows["date"]?></label>
        <br>
        <p>
            <?php echo $rows["message"];?>
        </p>
<?php

        }
    }
} else {
    error_reporting(E_ERROR | E_PARSE);
    echo "Dosya Bulunamadı";
}
