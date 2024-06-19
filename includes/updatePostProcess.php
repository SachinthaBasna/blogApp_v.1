<?php 
include "connection.php";
$edTitle = htmlspecialchars($_POST['edtitle'], ENT_QUOTES, 'UTF-8');
$edAuthor = htmlspecialchars($_POST['edAuthor'], ENT_QUOTES, 'UTF-8');
$edImg = $_POST['edImg'];
$edContent = htmlspecialchars($_POST['edContent'], ENT_QUOTES, 'UTF-8');
$id = $_POST['id'];


Database::search("SELECT * FROM `post` WHERE `id` = '".$id."'");

if(empty($edTitle)){
    echo "error: Please Enter your Title";
} else if(empty(($edAuthor))){
    echo "error: Please Enter your Auther Name";
} else if(empty(($edContent))){
    echo "error: Please Enter your Content";
} else {
    Database::iud("UPDATE `post` SET `title` = '".$edTitle."', `content` = '".$edContent."', `author` = '".$edAuthor."' WHERE `id` = '".$id."'");
    echo("Success");
}


?>