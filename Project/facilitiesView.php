<?php
 error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('dbtest');
 
$query = "SELECT * FROM facilities";
$result = mysql_query($query);
   
echo "<table border='1' align='center' style='border:5px solid blue;font-size:x-large;position: relative; top:100px;'>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['f_id'] . "</td><td>" . $row['f_name']  . "</td><td>" .  $row['start_time'] . "</td><td>" . $row['end_time'] . "</td><td>" . $row['availability'] ."</td></tr>";  //$row['index'] the index here is a field name
}
 
echo "</table>"; //Close the table in HTML
 
echo '<div style="text-align:center;"><form action="View.html">
    <input style="background-color:#2cf422; height:50px;font-size:x-large;position:relative; top:150px;" type="submit" value="Back" />
</form></div>' ;
 
mysql_close(); //Make sure to close out the database connection
 
 
 
?>