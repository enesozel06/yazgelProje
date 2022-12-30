
<?php
include_once("../config.php");
?>
<?php
session_start();
$db = new Db();
session_start();
$user = $_SESSION["login_user"];
$uid = $user["id"];
if (!$user) {
    header("location: ../logout.php");
    exit;
}


  $new_url = "";
  if(isset($_GET)){
    include('../php/config.php');
    foreach($_GET as $key=>$val){
      $u = mysqli_real_escape_string($conn, $key);
      $new_url = str_replace('/', '', $u);
    }
    //echo "<script type='text/javascript'>alert('$new_url');</script>";
      $sql = mysqli_query($conn, "SELECT token FROM url WHERE shorten_url = '{$new_url}'");
      if(mysqli_num_rows($sql) > 0){
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if($sql2){
            $full_url = mysqli_fetch_assoc($sql);
            header("Location:messageshow.php?t=".$full_url['token']);
          }
      }
  }
?>