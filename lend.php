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
    	background-color: #666; 
	padding: 20px; 
	font-size: 15px; 
	color: white; 
	display: flex; 
	justify-content:space-between; 
	} 
	h3{ 
	text-align: left; 
 }   
 p{
	text-align:center;
	font-size:20px;
	
 } 
 a{ 
	color: aliceblue; 
	text-underline-position: inherits; 
	display: flex; 
	justify-content:right; 
} 
table{ 
	width: 100%; 
	font-size: 20px; 
	margin-top:25px; 
} 
* {box-sizing: border-box;} 
 
 
 
.topnav { 
  overflow: hidden; 
  background-color: #e9e9e9; 
} 
 
 button{
	align:end ;
	color:black;
	background-color:aliceblue;
	border:solid;
 }
 
.topnav input[type=number],button[type=submit] { 
  float: right; 
  padding: 16px; 
  margin-top: 8px; 
  margin-right: 3px; 
  border: none; 
  font-size: 20px;
  ;
} 
 
@media screen and (max-width: 600px) { 
  .topnav a, .topnav input[type=number],button[type=submit] { 
	float: none; 
	display: block; 
	text-align: left; 
	width: 100%; 
	margin: 0; 
	padding: 14px; 
  } 
   
  .topnav input[type=text],button[type=submit] { 
	border: 1px solid #ccc;   
  } 
} 
 
    
</style> 
</head> 
<body> 
     
<header> 
	<h3>ONLINE LIBRARY MANAGEMENT SYSTEM</h3> 
   <p> <a href="select.php">HOME</a></p> 
   <p> <a href="login.php">LOGOUT</a></p> 
	<p><a href="index.php">SIGN IN</a></p>  
	<p><a href="feedback.php">FEEDBACK</a></p>  
     
</header> 
<div class="topnav"> 
    <form method="POST">     
	<input type="number" placeholder="Enter MEMBERID" name="member_id">
	<input type="number" placeholder="Enter BOOKID" name="bid">
	 <button  type="submit" name="submit" class="btn btn-default"> Request Book</button>
  </div></form> 
<p>LIST OF  BOOKS</p> 
<?php
$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name of book` ASC;");
echo "<table border='solid'> ";
echo "<tr>";
echo "<th>"; echo "ID"; echo "</th>";
echo "<th>"; echo "NAME OF BOOKS"; echo "</th>";
echo "<th>"; echo "AUTHOR"; echo "</th>";
echo "<th>"; echo "STATUS"; echo "</th>";
echo "<th>"; echo "EDITION"; echo "</th>";
echo "</tr>";
while($row=mysqli_fetch_assoc($res))
{
	echo "<tr>";
	echo "<td>"; echo $row['ID']; echo "</td>";
	echo "<td>"; echo $row['NAME OF BOOK']; echo "</td>";
	echo "<td>"; echo $row['AUTHORS']; echo "</td>";
	echo "<td>"; echo $row['STATUS']; echo "</td>";
	echo "<td>"; echo $row['EDITION']; echo "</td>";
	echo "</tr>";
}
echo "</table>";
if(isset($_POST['submit']))
{
	
		mysqli_query($db,"INSERT INTO issue_book values('$_POST[member_id]','$_POST[bid]');");
	
	
	}
	?>


</body> 
</html> 
