<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbtest");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$hotel_id = mysqli_real_escape_string($link, $_REQUEST['hotel_id']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$hotel_name = mysqli_real_escape_string($link, $_REQUEST['hotel_name']);

 
// attempt insert query execution
$sql = "INSERT INTO hotel_branch (hotel_id,location,hotel_name) VALUES ('$hotel_id', '$location', '$hotel_name')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo '<form action="Home.html">
    <input  style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Home" />
</form>' ;
echo '<form action="Insert.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Insert Page" />
</form>' ;

// close connection
mysqli_close($link);
?>