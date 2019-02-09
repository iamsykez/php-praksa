<?php
session_start(); 
require_once ('config.php');
if(!isset($_POST["_title"]) || !isset($_POST["_message"])){
    echo "Missing fields";
    die();
}

// Get data from form
$title = CleanString($connect, $_POST["_title"]);
$message = CleanString($connect, $_POST["_message"]); 

if(!isset($_SESSION["_uid"])){
    echo "No session id"; // redirect user to error page or login
    die();
}
$userid =  $_SESSION["_uid"];
 // put them in order
mysqli_query($connect,"INSERT INTO threads(userid,title,message) values('$userid','$title','$message')") or die(mysqli_error($connect));
 
echo "Thread Posted.<br><a href='index.php'>Return</a>";


 
// use everywhere to prevent sql injections
function CleanString($con,$pData){
    // clean data to prevent hacking, sql injection
	 $data = "";
	 $data = stripcslashes($pData);
	 $data = mysqli_real_escape_string($con, $pData);
	 return $data;
	 }


?>