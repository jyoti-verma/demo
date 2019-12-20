<?php
include('dbconnect.php');
session_start();

$message = '';
if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}
if(isset($_POST["login"]))
{
 $username=$_POST["username"];

 $query=mysqli_query($connect,"SELECT * FROM login WHERE username = '".$username."'");
  $count =mysqli_num_rows($query);
  if($count > 0)
 {
  $i=0;
  while($row = mysqli_fetch_array($query)) {
      if($_POST["password"]==$row["password"])
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = mysqli_query($connect,"INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')");
        $_SESSION['login_details_id'] = $connect->insert_id;
        header("location:index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
      $i++;
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}

?>

<html>  
    <head>  
        <title>Chat Application</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Chat Application</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Login</div>
    <div class="panel-body">
     <form method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Enter Username</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>