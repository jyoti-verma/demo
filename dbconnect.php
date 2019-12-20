<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chat');
 
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($user_id, $connect){
 $query = "SELECT * FROM login_details  WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
 $stmt= mysqli_query($connect,$query);
    $i=0;
    while($row = mysqli_fetch_array($stmt)) {
     return $row['last_activity'];
     $i++;
    }
    echo "<script>console.log('fetch_user_last_activity')</script>";
}
function fetch_user_chat_history($from_user_id, $to_user_id, $connect){
    $query = "
 SELECT * FROM chat_messages 
 WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY timestamp DESC
 ";
 $stmt=mysqli_query($connect,$query);
 $output = '<ul class="list-unstyled">';
 $i=0;
 while($row =mysqli_fetch_array($stmt)) {
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 
  $i++;
 }
 $output .= '</ul>';
 return $output;

 echo "<script>console.log('fetch_user_chat_history')</script>";
}

function get_user_name($user_id, $connect){
 $query = "SELECT username FROM login WHERE user_id = '$user_id'";
$stmt= mysqli_query($connect,$query);
    $i=0;
    while($row = mysqli_fetch_array($stmt)) {
     return $row['username'];
     $i++;
    }
    echo "<script>console.log('get_user_name')</script>";
}

function count_unseen_message($from_user_id, $to_user_id,$connect){
 $query =  "SELECT * FROM chat_messages WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1' ";
 $stmt=mysqli_query($connect, $query);
    $count = mysqli_num_rows($stmt);
    $output = '';
    if($count > 0)
    {
     $output = '<span class="label label-success count">'.$count.'</span>';
    }
    return $output;
    echo "<script>console.log('count_unseen_message')</script>";
}

function fetch_is_type_status($user_id, $connect){
 $query =  "SELECT is_type FROM login_details WHERE user_id = '".$user_id."' ORDER BY last_activity DESC LIMIT 1"; 
 $stmt=mysqli_query($connect,$query);
    $output = '';
    $i=0;
    while($row = mysqli_fetch_array($query)) {
     if($row["is_type"] == 'yes')
     {
      $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
     }
     $i++;
    }
    return $output;
    echo "<script>console.log('fetch_is_type_status')</script>";
}

 if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>