<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbtest");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$sex = mysqli_real_escape_string($link, $_REQUEST['sex']);
$birth_date = mysqli_real_escape_string($link, $_REQUEST['birth_date']);
$relationship = mysqli_real_escape_string($link, $_REQUEST['relationship']);
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);

 
// attempt insert query execution
$sql = "INSERT INTO dependent (name,sex,birth_date,relationship,emp_id) VALUES ('$name', '$sex', '$birth_date','$relationship','$emp_id')";

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