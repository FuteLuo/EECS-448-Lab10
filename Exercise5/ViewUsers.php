<?php
//access the global array called $_POST to get the values from the text fields
$mysqli = new mysqli("mysql.eecs.ku.edu", "futeluo", "feo7Xoot", "futeluo");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
//MySQL table
$query = "SELECT user_id FROM Users;";

//send query table to the database
if($result = $mysqli->query($query))
{
    echo"<h1>Hello Admin</h1>";
    echo"<table>";
    echo"<th> User Diplay </th>";

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> ".$row["user_id"]." </td>";
        echo "</tr>";
    }
    echo "</table>";
}
/* close connection */
$mysqli->close();
?>