<?php
//access the global array called $_POST to get the values from the text fields
$name = $_POST["name"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "futeluo", "feo7Xoot", "futeluo");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
//check restriction
if($name == "")
{
    echo "Stored Faild : The user left the text field empty";
}
else
{
    $query = "INSERT INTO Users (user_id) VALUES ('".$name."')";
    if($mysqli->query($query))
    {
        echo "New user [".$name."] store created successfully<br>";
    }
    else
    {
        echo "New user [".$name."] already existed<br><br>";
    }
}
/* close connection */
$mysqli->close();
?>
