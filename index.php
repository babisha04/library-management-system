<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Library Management System</title>
<style>
  .main-div{
    display: flex;
justify-content: center;
flex-direction: column;
align-items: center;
margin: 0%;
background-color: rgb(226, 236, 236);
} 
h1{
    font-family:'Times New Roman', Times, serif;
    font-size: 88px;
    color:darkcyan;
    text-align: center;
    padding: 15px 0px;
}
.signup-form{
    background-color: white;
    width:430px;
    text-align: center;
    border-radius: 8px;
    padding: 10px;
    
}
.form-heading{
    padding: 5px;
    border-bottom: 1px solid  rgb(232, 238, 238);
}
.input-fields{
    padding: 15px;
    display: flex;
 flex-wrap: wrap;
    justify-content: space-between;
}

input,select{
    padding:8px;
    border: 1px solid  rgb(14, 15, 15);
    border-radius: 10px;
    width: 100%;
    margin-bottom: 10px
}  
.half-width{
    display: flex;
    width: 48%;
}
.full-width{
    width: 100%; ;
}
label{
    size: 6px;
    color: #606770;
}
.dob{
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.quat-width{
    display: flex;
    width: 32%;
    margin-left: 14px;
}
.radio{
    padding:8px;
    border: 1px solid  rgb(14, 15, 15);
    border-radius: 10px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.radio-label{
    padding-bottom: 0;
}
.radio-input{
    margin: 0;
    width: auto;
}
button{
    width: 75%;
    height: 45px;
    justify-content: center;
    border-radius: 50px;
    margin-top: 30px;
    margin-left: 50px;
    background-color:chartreuse;
    
}
p,a{
    text-align: center;
    margin-left: 30%;
}
.LOGIN-form{
    background-color: white;
    width:430px;
    text-align: center;
    border-radius: 8px;
    padding: 10px;
    margin-left: 30%;
}
.lo-in{
    display: flex;
    justify-content: space-between;
    width: 90%;
}
</style>
</head>
<body>
  <div class="main-div">
  <h1><centre>LIBRARY</centre></h1>
  <form name="si-in" action="" method="POST">
    <div class="signup-form">
      <div class="form-heading">
        <h2>Create a new account</h2>
      </div>
      <div class="input-fields">
        <div class="half-width">
          <input type="text" placeholder="first name" name="first">
          </div>
          <div class="half-width">
          <input type="text" placeholder="last name" name="last"> 
        </div>
        <div class="full-width" >
          <input type="number" placeholder="mobile number" name="mob"> 
        </div>
        <div class="full-width" >
          <input type="text" placeholder="E-mail" name="email"> 
        </div>
        <div class="full-width" >
          <input type="password" placeholder="password" name="pw"> 
        </div>
        <label>Date of birth</label>
       <div class="dob">
          <div class="quat-width">
           <select name="dd" ><option>1</option>
            <option>2</option><option>3</option><option>4</option><option>5</option></select>
</div>
<div class="quat-width">
  <select name="mm"><option>jan</option>
    <option>feb</option><option>mar</option><option>apr</option><option>may</option></select>
</div>
<div class="quat-width">
   <select name="yyyy"><option>1999</option>
    <option>2000</option><option>2001</option><option>2002</option><option>2003</option></select>
</div>
</div>
<label>Gender</label>
<div class="dob">
   <div class="quat-width">
    <div class="radio">
    <input class="radio-input" type="radio" id="female" name="gender" value="female">
                        <label class="radio-label" for="female">Female</label>
                    </div>
                </div>
                <div class="quat-width">
                    <div class="radio">
                        <input class="radio-input" type="radio" id="male" name="gender" value="male">
                        <label class="radio-label" for="male">Male</label>
                    </div>
                </div>
                <div class="quat-width">
                    <div class="radio">
                        <input class="radio-input" type="radio" id="other" name="gender" value="other">
                        <label class="radio-label" for="other">Other</label>
</div>
</div>
        </div>
        <button name="submit" type="submit">Sign up</button>
        <a href="login.php"> Already have an account?</a>
        </div>
      </div>
   
  </form>
</div>
  <?php
if (isset($_POST['submit'])) {
    
    $first_name = isset($_POST['first']) ? $_POST['first'] : '';
    $last_name = isset($_POST['last']) ? $_POST['last'] : '';
    $mobile_number = isset($_POST['mob']) ? $_POST['mob'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pw']) ? $_POST['pw'] : '';
    $dob_day = isset($_POST['dd']) ? $_POST['dd'] : '';
    $dob_month = isset($_POST['mm']) ? $_POST['mm'] : '';
    $dob_year = isset($_POST['yyyy']) ? $_POST['yyyy'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    
    $inserted = true; 

    
    if (empty($first_name) || empty($last_name) || empty($mobile_number) || empty($email) || empty($password) || empty($dob_day) || empty($dob_month) || empty($dob_year) || empty($gender)) {
        $inserted = false;
        echo "Please fill all required fields.";
    }

    
    if ($inserted) {
        echo "New record created successfully<br>";
        
    } else {
        echo "Failed to create new record";
    }
    $count=0;
    $sql="SELECT first from `sign-in`";
    $res=mysqli_query($db,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
       if($row['first']==$_POST['first'])
       {
        $count=$count+1;
       }
    }
    if($count=0)
    mysqli_query($db,"INSERT INTO `SIGN-IN` VALUES('$first_name','$last_name','$mobile_number','$email','$password','$dob_year-$dob_month-$dob_day','$gender');");



}
?>

</body>
  </html>