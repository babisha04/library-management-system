
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
    header{
        padding: 60px;
        font-size: 40px;
        background-color: rgb(27, 26, 26);
        color: aliceblue;
        margin-bottom: 30px;
        text-align: center;
    }
    input{
       height: 50px;
       width: 40%;
     display: flex;
     flex-direction: column;
     margin-bottom: 10px;
     padding-bottom: 10px;
     border-radius: 20px;
     background-color: rgb(238, 235, 235);
     color: rgb(5, 5, 5);
     font-size: 25px;
    text-align: center;
    }
    button{
        padding:10px;
        font-size:25px;
        margin-left:65px;
    }
</style>
</head>
<header>Approving Request
</header>
<body>
    <form method="POST">
    <input type="number" placeholder="member id " name="member_id">
    <input type="text" placeholder="Approve or not " name="approve">
    <input type="date" placeholder="Issue date(dd-mm-yyyy) " name="issue">
    <input type="date" placeholder="Return date(dd-mm-yyyy) " name="return">
    <button name="submit">submit</button>
</form>
<?php
if(isset($_POST['submit'])) {
    mysqli_query($db,"INSERT INTO approve values('$_POST[member_id]','$_POST[approve]','$_POST[issue]','$_POST[return]');");
}
?>
</body>
</html>