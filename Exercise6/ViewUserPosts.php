<?php
//access the global array called $_POST to get the values from the text fields
$mysqli = new mysqli("mysql.eecs.ku.edu", "futeluo", "feo7Xoot", "futeluo");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
//check the table from database
$name = $_POST["name"];
$query = "SELECT content FROM Posts WHERE author_id='".$name."'";
if($result = $mysqli->query($query))
{
    echo"<h1>Hello Admin</h1>";
    echo"<table>";
    echo"<th> User [".$name."] Post</th>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> ".$row["content"]." </td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "User post empty";
}
/* close connection */
$mysqli->close();
?>