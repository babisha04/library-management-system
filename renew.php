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
.book{
   display: flex; 
   justify-content: space-between;
 }   
 input{
    display: flex; 
   flex-direction: column;
   padding: 10px;
   margin-bottom: 10px;

 }
 .box{  
    padding: 40px;
   background-color:rgb(190, 230, 117); 
    width: 430px;
   text-align: center;
   margin-left: 300px;
   margin-top: 30px;
 }
 header{
    padding: 30px;
    text-align: center;
    background-color:darkolivegreen;
    font-size: 40px;
    color: aliceblue;
 }
 button{
    border-radius: 20px;
    padding: 10px;
    margin-top: 30px;
    width: 100px;
background-color:rgb(154, 207, 63);
font-size: 20px;
 }
 body{
    background-color:rgb(247, 248, 246);
 }
</style>
</head>
<header>RENEW BOOK
</header>
<body>
    <div class="box">
    <form method="POST">
    <div class="book">
        <label>BOOKID</label>
        <input type="text" name="book_id">
    </div>
    <div class="book">
        <label>MEMBER ID</label>
        <input type="text" name="student_id">
    </div>
    <div class="book">
        <label>ISSUE DATE</label>
        <input type="text" name="issue_date">
    </div>
    <div class="book">
        <label> RETURN DATE</label>
        <input type="text" name="return_date">
    </div>
    <button type="submit" name="renew">Renew</button>
</form>
</div>
<?php
if(isset($_POST['renew'])) {
   // Retrieve data from the HTML form
   $book_id = $_POST['book_id'];
   $student_id = $_POST['student_id'];
   $issue_date = $_POST['issue_date'];
   $return_date = $_POST['return_date'];

   // Calculate new return date (for example, add 7 days for renewal)
   $new_return_date = date('Y-m-d', strtotime($return_date . ' + 7 days'));

   // Insert a new record for renewal
   $query = "INSERT INTO renew (book_id, student_id, issue_date, return_date) VALUES ('$book_id', '$student_id', '$issue_date', '$new_return_date')";
   
   if(mysqli_query($db, $query)) {
       echo "Return date extended successfully. New return date: " . $new_return_date;
   } else {
       echo "Error: " . mysqli_error($db);
   }
}
?>

</body>
</html>
