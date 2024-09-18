<?php
  $db=mysqli_connect("localhost","root","","lms");
  if(!$db)
  {
    die("connection failed: " . mysqli_connect_error());
  }
  echo "connected successfully.";
?>