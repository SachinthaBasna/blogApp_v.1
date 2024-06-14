<?php
// Include database connection
include "connection.php";
session_start();



// Assuming Database::search() method returns a mysqli_result object
$uname = $_POST["un"];
$password = $_POST["pw"];

// Assuming Database::search() executes the query and returns a mysqli_result object
$rs = Database::search("SELECT * FROM `admin` WHERE `username` = '".$uname."' AND `password` = '".$password."'");
$d = $rs->fetch_assoc(); // Use fetch_assoc() to fetch associative array

if($d && $uname == $d["username"] && $password == $d["password"]) {
    echo "success";
    $_SESSION['username'] = $uname;
    $_SESSION['password'] = $password;
} else {
    echo "You're not an admin";
}
?>