
<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Library Management System</title>
<link rel="stylesheet" href="lib.css">
</head>
<body>
  <div class="main-div">
  <h1><centre>LIBRARY</centre></h1>
  <form name="login" action="" method="POST">
    <div class="signup-form">
      <div class="form-heading">
        <h2>LOGIN</h2>
      </div>
      <div class="input-fields">
        
        
        <div class="full-width" >
          <input type="text" placeholder="E-mail" name="email"> 
        </div>
        <div class="full-width" >
          <input type="password" placeholder="password" name="pw"> 
        </div>
       
        <button name="submit">Login</button>
        <p>Don't have an account?</p>
        <a href="index.php">Create a new account</a>
        </div>
      </div>
   
  </form>
</div>
<?php
if(isset($_POST['submit']))
{
  $count=0;
  $res=mysqli_query($db,"SELECT * FROM `sign-in` WHERE email='$_POST[email]' && pw='$_POST[pw]';");
  $count=mysqli_num_rows($res);
  if($count==0)
  {
    ?>
    <!--
    <script type="text/javascript">
      alert("The username and password doesn't match");
      </script>
  -->
  <div>
    <bold>The username and password doesn't match</bold>
  </div>
    <?php
  }
  else{
    ?>
    <script type="text/javascript">
    window.location="select.php"
    </script>
    <?php
  }
}
?>

</body>
</html>
	