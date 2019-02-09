<?php
session_start(); 
require_once('config.php'); 

if(!isset($_POST["threadid"]) || !isset($_POST["_msg"])){
    echo "Invaild entry, try again";
    die();
}
$msg  = $_POST["_msg"];// this needs to be cleaned
$threadid = $_POST["threadid"];// this needs to be cleaned
$uid = $_SESSION["_uid"];
mysqli_query($connect , "INSERT INTO replies(thread,userid, message) VALUES('$threadid','$uid','$msg')") or die(mysqli_error($connect)); 

echo "Reply Posted.<br><a href='msg.php?id=".$threadid."'>Return</a>";
?>