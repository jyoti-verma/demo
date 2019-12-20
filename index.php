<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['user_id']))
{
 header('location:login.php');
}
?>
<html>  
    <head>  
        <title>Chat Application </title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Chat Application </a></h3><br />
   <br />
   
   <div class="table-responsive">
    <h4 align="center">Online User</h4>
    <p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
    </body>  
</html>  
<script>  
$(document).ready(function(){
 fetch_user();
 update_last_activity()

//fetch_user
 function fetch_user(){
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);

   }
  });
console.log('fetch_user');
 }
 //update_last_activity
 function update_last_activity(){
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {
  console.log("update_last_activity success");
   }
  })
 }
 //make_chat_dialog_box
 function make_chat_dialog_box(to_user_id, to_user_name){
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
  console.log('make_chat_dialog_box');
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  update_chat_history_data();

  if($('#user_dialog_'+to_user_id).dialog('open')){
  $('.count').hide();
}
  console.log('start_chat click');
 });
//insert_chat
$(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  if($('#chat_message_'+to_user_id).val()==''){
    $('#chat_message_'+to_user_id).css('border-color','red');
  }else{
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  });
  }
  console.log('send_chat click');
 });
 //fetch_user_chat_history
 function fetch_user_chat_history(to_user_id){
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  });
  console.log('fetch_user_chat_history fn');
 }

 function update_chat_history_data(){
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
  console.log('update_chat_history_data fn');
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
  console.log('ui-button-icon');
 });

//update_is_type_status
 $(document).on('focus', 'textarea', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    console.log('chat_message focus');
   }
  });
 
 });
//update_is_type_status
 $(document).on('blur', 'textarea', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    console.log('chat_message blur');
   }
  });
  
 });


});  
</script>