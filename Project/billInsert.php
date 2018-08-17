<?php
echo '<body style="background-color:#667CB8">';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbtest");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$bill_id = mysqli_real_escape_string($link, $_REQUEST['bill_id']);
$laundry = mysqli_real_escape_string($link, $_REQUEST['laundry']);
$damages = mysqli_real_escape_string($link, $_REQUEST['damages']);
$room_service = mysqli_real_escape_string($link, $_REQUEST['room_service']);
$cust_id = mysqli_real_escape_string($link, $_REQUEST['cust_id']);
$room_price = mysqli_real_escape_string($link, $_REQUEST['room_price']);
 
// attempt insert query execution
$sql = "INSERT INTO bill (bill_id,laundry,damages,room_service,cust_id,room_price) VALUES ('$bill_id', '$laundry', '$damages','$room_service','$cust_id','$room_price')";

if(mysqli_query($link, $sql)){
    echo '<p style="text-align:center; font-size: x-large">Records added successfully.</p>';
} else{
    echo '<p style="font-size: x-large">ERROR: Could not execute $sql. </p>' . mysqli_error($link);
}

echo '<form action="Home.html">
    <div style="text-align:center"><input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px; text-align:center" type="submit" value="Home" /></div>
</form>' ;
echo '<form action="Insert.html">
    <div style="text-align:center"><input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Insert Page" /></div>
</form>' ;

// close connection
mysqli_close($link);
echo '</body>';
?>