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
   background-color: aliceblue;
    width: 430px;
   text-align: center;
   margin-left: 300px;
   margin-top: 30px;
 }
 header{
    padding: 30px;
    text-align: center;
    background-color:darkcyan;
    font-size: 40px;
    color: aliceblue;
 }
 button{
    border-radius: 20px;
    padding: 10px;
    margin-top: 30px;
    width: 100px;

font-size: 20px;
 }
</style>
</head>
<header>RETURN BOOK
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
        <input type="text" name="member_id">
    </div>
    <div class="book">
        <label>DATE OF RETURNING</label>
        <input type="text" name="issue_date">
    </div>
    <div class="book">
        <label>ACTUAL RETURN DATE</label>
        <input type="text" name="return_date">
    </div>
    <button type="submit" name="return">Return</button>
</form>
</div>
<?php





if(isset($_POST['return'])) {
    // Retrieve data from the HTML form
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $issue_date = $_POST['issue_date'];
    $return_date = $_POST['return_date'];

    // Calculate the difference in days between issue_date and return_date
    $issue_timestamp = strtotime($issue_date);
    $return_timestamp = strtotime($return_date);
    $days_overdue = floor(($return_timestamp - $issue_timestamp) / (60 * 60 * 24));

    // Define fine amount per day overdue
    $fine_per_day = 5; // Change this to your desired fine amount

    // Calculate total fine
    $total_fine = $fine_per_day * $days_overdue;

    // Insert return details into the database
    $query = "INSERT INTO returnbook (book_id, member_id, issue_date, return_date, fine_amount) VALUES ('$book_id', '$member_id', '$issue_date', '$return_date', '$total_fine')";

    // Execute the query
    if(mysqli_query($db, $query)) {
        echo "Book returned successfully.";
        if ($days_overdue > 0) {
            echo " Total fine: $" . $total_fine;
        }
    } else {
        echo "Error: " . mysqli_error($db); // Display error if the query fails
    }
}
?>


</body>
</html>
