<?php
include('dbconnect.php');
session_start();
$query = mysqli_query( $connect,"SELECT * FROM login WHERE user_id != '".$_SESSION['user_id']."' ");
$output = '<table class="table table-bordered table-striped">
 <tr>
 <th width="70%">Username</td>
 <th width="20%">Status</td>
 <th width="10%">Action</td>
 </tr>';
 $i=0;
while($row = mysqli_fetch_array($query)) {
  $status = '';
  $current_timestamp = strtotime(date("Y-m-d H:i:s") . '-10 second');
  $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
  $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
  echo $user_last_activity ;
  if($user_last_activity > $current_timestamp)
  {
   $status = '<span class="label label-success">Online</span>';
  }
  else
  {
   $status = '<span class="label label-danger">Offline</span>';
  }
  $output .= '
  <tr>
   <td>'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).'</td>
   <td>'.$status.'</td>
   <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
  </tr>
  ';
  $i++;
 }

$output .= '</table>';

echo $output;

?>