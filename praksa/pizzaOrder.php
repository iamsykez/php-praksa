<?php

session_start(); 
require_once ('config.php');


if(isset($_POST["submitOrder"]))  
 {  

        $name =$_POST['name'];
        $address = $_POST['address'];
        $ingredients = implode(',', (array)$_POST['ingredients']); // this already returns an array, no cast needed I need it because of how mysql read it

    $in = $_POST['ingredients'];
    for($i =0; $i < count($in);$i++){
        echo "in: ".$in[$i]; // just test :P
    }
// ok 1m
        //# Check if anything submitted
        $size = "";
        if(isset($_POST['size'])){
            // size is set
            $size = $_POST['size'];
        } 
        $name = mysqli_escape_string($connect,$name);
        $address = mysqli_escape_string($connect,$address);
        

        $error = false;

        if(empty($name) || empty($address)){
            echo '<script type="text/javascript">';
            echo 'alert("Please add your name,address and pizza size.")';
            echo 'window.location.href = "entry.php";';
            echo '</script>'; 
            $error = true;
        }

        If(isset($_POST['size'])){
        get size;
        }else{
        Echo 'no size selected';
        Exit();
}

if($error==false){

if(mysqli_query($connect, "INSERT INTO pizza(name,address, ingredients, size) VALUES('$name','$address','$ingredients','$size')")){
echo '<script type="text/javascript">';
echo 'alert("Your order has been submitted")';
echo 'window.location.href = "entry.php";';
echo '</script>';

}

}
 

 
}   




?>