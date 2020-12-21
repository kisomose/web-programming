<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "employee";

$conn = new mysqli($servername,$user,$pass,$db);

if($conn->error){
    echo "DB error ".$conn->error."";
}
else{
    echo "Connection successful";
} 
//inserting data into our database 
if(isset($_POST['save'])){
    echo "<br>";
     
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
	 $passw = $_POST['password'];

    $sql = "insert into Employees (FNAME,LNAME,PASSWORD) values ('$first','$last','$passw')";

    if($conn->query($sql)){
        echo "USER INSERTED SUCCESSFULLY!!!!";
    }
    else{
        echo "Error is here: ".$conn->error;
    }

} 
if(isset($_POST['show'])){ 
    $sql = "select * from Employees";

    $myquery = $conn->query($sql);
    
    while($result = $myquery->fetch_assoc()){
        echo "<br>";
        echo $result['FNAME']." ".$result['LNAME'];
        echo "<br>";
    } 
} 
?>
 
<!doctype html>
<html lang="en">
  <head>
    <title>EMPLOYEE</title> 
	</head>

  <body style= "background-color: yellow">
  
<h1 style="color: red">REGISRATION FORM </h1>
    <form  action = "login.php" method = "POST">
	  
      First name 
	  
      <input style = "background-color: gray" type="text" name="firstname" />
      <br>
	  <br>
	  
      Last name
      <input style = "background-color: gray" type="text" name="lastname" />
    <br>
	<br>
	Password 
      <input style = "background-color: gray" type="text" name="password" />
      <br>
	  <br>
    <input style="background-color: red" type="submit" name="save" value="SIGNUP!"/> 
    <input style="background-color: green" type="submit" name="show" value="LOGIN"/>
    </form>

   </body>
</html>
