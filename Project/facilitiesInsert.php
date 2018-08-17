<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbtest");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$f_id = mysqli_real_escape_string($link, $_REQUEST['f_id']);
$f_name = mysqli_real_escape_string($link, $_REQUEST['f_name']);
$start_time = mysqli_real_escape_string($link, $_REQUEST['start_time']);
$end_time = mysqli_real_escape_string($link, $_REQUEST['end_time']);
$availability = mysqli_real_escape_string($link, $_REQUEST['availability']);

 
// attempt insert query execution
$sql = "INSERT INTO facilities (f_id,f_name,start_time,end_time,availability) VALUES ('$f_id', '$f_name', '$start_time','$end_time','$availability')";

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