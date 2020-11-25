<?php
//access the global array called $_POST to get the values from the text fields
$mysqli = new mysqli("mysql.eecs.ku.edu", "futeluo", "feo7Xoot", "futeluo");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
//check the post from database been deleted.
$delete = $_POST["delete"];
$query = "SELECT post_id FROM Posts";
foreach ($delete as $postid)
{
    $sql = "DELETE FROM Posts WHERE post_id = '$postid'";
    if($result = $mysqli->query($sql))
    {
        echo "The Post ID: ".$postid." delete succefully.<br>";
    }
    else
    {
        echo "The Post ID: ".$postid."delete failed";
    }
}
/* close connection */
$mysqli->close();
?>