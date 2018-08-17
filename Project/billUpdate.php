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
     <body style="font-size:xx-large;position: relative; top:50px;background-color:#f47575; text-align:center">
<form action="" method="post">  
Enter bill ID: <input type="text" name="term" /><br />  
Enter field: <input type = "text" name="field"/><br/> Enter modified value: <input type = "text" name = "value"/><br/>
<input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Submit" />  
</form> 
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);   
$field = mysql_real_escape_string($_REQUEST['field']);  
$value = mysql_real_escape_string($_REQUEST['value']); 

$query = "Update bill set ".$field." = '".$value."' where bill_id like '%".$term."%'";
$result = mysql_query($query); 


}
 //Close the table in HTML
 
echo '<form action="Home.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Home" />
</form>' ;
echo '<form action="Update.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large" type="submit" value="Search Page" />
</form>' ; ;
?>
    </body>
</html>
