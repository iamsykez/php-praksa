<?php

session_start(); 
require_once ('../config.php'); // ../ goe back one folder

// required data from client
if(!isset($_POST["size"]) && !isset($_POST["name"]) && !isset($_POST["address"])) {
	SendError("Please enter all the required details");
}

  $name = mysqli_escape_string($connect,$_POST['name']);
  $address = mysqli_escape_string($connect,$_POST['address']);
  $size = mysqli_escape_string($connect,$_POST['size']);
  
  if(strlen($name) < 3){
	  SendError("Please enter a vaild name");
  }
  
   if(strlen($address) < 5){
	  SendError("Please enter a vaild address");
  }
  // do not use TEXT it stores a pointer to text file when read db, only for text that is very large
  // opl
  $ingredients = $_POST['ingredients']; // this already returns an array, no cast needed I need it because of how mysql read it
	 
  // if all good submit the data
  mysqli_query($connect, "
  INSERT INTO 
  pizza(name,address, size) 
  VALUES('$name','$address','$size')") or die(mysqli_error($connect));//brb 3 min ok
  
  $order_id = mysqli_insert_id($connect);
  // add any ingredients this user selected
  if(is_array($ingredients)){
		 
		for($i =0; $i < count($ingredients); $i++){
			$itemname = $ingredients[$i];
		 
			mysqli_query($connect,"INSERT INTO tbl_ingredients(order_id,ingredient)
			values('$order_id','$itemname')
			")  or die(mysqli_error($connect));
		}
	}

  SendSuccess("Your order has been placed, thanks");

function SendError($msg){
	$error = array();
	$error["error"] = "1";
	$error["msg"] = "".$msg;
	echo json_encode($error);
	exit();
}

function SendSuccess($msg){
	$error = array();
	$error["success"] = "1";
	$error["msg"] = "".$msg;
	echo json_encode($error);
	exit();
}





?>