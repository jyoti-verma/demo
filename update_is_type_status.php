
<?php
include('dbconnect.php');
session_start();
$query =  mysqli_query($connect,"UPDATE login_details SET is_type = '".$_POST["is_type"]."' 
WHERE login_details_id = '".$_SESSION["login_details_id"]."' ");
echo "<script>console.log('update_is_type_status call')</script>";
?>

