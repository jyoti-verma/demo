<?php
include('dbconnect.php');
session_start();
$to_user_id=$_POST['to_user_id'];
$from_user_id=$_SESSION['user_id'];
$chat_message= $_POST['chat_message'];
$status= '1';
$query = "
INSERT INTO chat_messages
(to_user_id, from_user_id, chat_message, status) 
VALUES ('$to_user_id', '$from_user_id', '$chat_message', '$status')
";
mysqli_query($connect,$query);
echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
echo fetch_is_type_status($_POST['to_user_id'], $connect)
?>