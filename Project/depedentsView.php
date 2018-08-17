<?php
 error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('dbtest');
 
$query = "SELECT * FROM Dependent";
$result = mysql_query($query);
   
echo "<table >";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['sex']  . "</td><td>" .  $row['birth_date'] . "</td><td>" . $row['relationship'] . "</td><td>" . $row['emp_id'] ."</td></tr>" ; //$row['index'] the index here is a field name
}
 
echo "</table>"; //Close the table in HTML
 
echo '<form action="View.html">
    <input type="submit" value="Back" />
</form>' ;
 
mysql_close(); //Make sure to close out the database connection
 
 
 
?>