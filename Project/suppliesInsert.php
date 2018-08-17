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
$supplier_id = mysqli_real_escape_string($link, $_REQUEST['supplier_id']);
$quantity = mysqli_real_escape_string($link, $_REQUEST['quantity']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);

 
// attempt insert query execution
$sql = "INSERT INTO supplies (hotel_id,supplier_id,quantity,price) VALUES ('$hotel_id', '$supplier_id', '$quantity','$price')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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