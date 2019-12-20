<?php
include('dbconnect.php');
session_start();
echo $_SESSION["login_details_id"];
$query = mysqli_query($connect,"UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION["login_details_id"]."'");
echo "<script>console.log('update_last_activity 2')</script>";
?>