<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'dbtest';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
   <body style="font-size:xx-large;position: relative; top:50px;background-color:#dbcbcb; text-align:center">
<form action="" method="post">  
Enter hotel name: <input type="text" name="term" /><br />  
<input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM hotel_branch WHERE hotel_name LIKE '%".$term."%'"; 
$result = mysql_query($query); 

echo "<table >";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['hotel_id'] . "</td><td>" . $row['location']  . "</td><td>" . $row['hotel_name'] . "</td></tr>";  //$row['index'] the index here is a field name
}
}
echo "</table>"; //Close the table in HTML
 
echo '<form action="Home.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Home" />
</form>' ;
echo '<form action="Search.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Search Page" />
</form>' ; ;
?>
    </body>
</html>
