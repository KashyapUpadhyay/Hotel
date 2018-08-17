<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbtest");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$dept_id = mysqli_real_escape_string($link, $_REQUEST['dept_id']);
$hotel_id = mysqli_real_escape_string($link, $_REQUEST['hotel_id']);
 
// attempt insert query execution
$sql = "INSERT INTO employee (emp_id,fname,lname,salary,dept_id,hotel_id) VALUES ('$emp_id', '$fname', '$lname','$salary','$dept_id','$hotel_id')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

echo '<form action="Home.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Home" />
</form>' ;
echo '<form action="Insert.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Insert Page" />
</form>' ;

// close connection
mysqli_close($link);
?>