<?php
//access the global array called $_POST to get the values from the text fields
$name = $_POST["name"];
$post = $_POST["post"];
$userExist = false;
$mysqli = new mysqli("mysql.eecs.ku.edu", "futeluo", "feo7Xoot", "futeluo");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
//check post restriction
$query = "SELECT user_id FROM Users;";
    if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            if($row["user_id"] == $name)
            {
                $userExist = true;
            }
        }
        if($userExist == false)
        {
            echo "User id doesn't exist, please use correct id";
        }
        else if($post == "")
        {
            echo "Post failed, please Post text in the box";
        }
        else
        {
            $sql = "INSERT INTO Posts (content, author_id) VALUES ('$post' , '$name')";
            if($mysqli -> query($sql)) 
            {
                echo "Add post successfully<br>";
            }
            else{
                echo "failed<br>";
            }
        }
        
        /* free result set */
        $result->free();
    }
   
/* close connection */
$mysqli->close();
?>
