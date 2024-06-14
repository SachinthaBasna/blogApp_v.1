<?php 
// echo "OK"
include "includes/connection.php";

$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$date = $_POST['date'];
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$author = htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8');

// echo($date);

if (empty($title)){
    echo "Please Enter your title";
} else if(empty($author)) {
    echo "Please Enter author";
} else if(empty($date)){
    echo "Please Select your Date";
} else if(empty($content)){
    echo "Your Content must > 100 words";
} else if(!is_string($author)){
    echo("Please Enter author Name in Strings");
} else {
    if(isset($_FILES["img"])){
        $img = $_FILES["img"];

        $path = "resources/postImg/" . uniqid() . ".png";
 
        move_uploaded_file($img["tmp_name"], $path); 

        $rs = Database::search('SELECT * FROM `post`');
        $num = $rs->num_rows;

        Database::iud("INSERT INTO `post` (`title`, `content`, `author`, `created_at`, `path`) 
                      VALUES ('".$title."', '".$content."', '".$author."', '".$date."', '".$path."')");

        echo("Success");
    }

}


?>