<?php 
require_once('config.php');
if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $username = mysqli_escape_string($connect,$username);
        $password = mysqli_escape_string($connect,$password);
        
        $error = false;
           
        $userchecker = mysqli_query($connect , "SELECT count(*) FROM users WHERE username = '$username' ");


        if(empty($username) || empty($password)){
            echo '<script>alert("Both Fields are required")</script>'; 
            $error = true;
        }

         	
    if(mysqli_fetch_row($userchecker)[0]){
            echo '<script>alert("Username is already taken!")</script>';
            $error = true;
        }

        if($error === false){
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)); 
        $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
        }
 
}  


 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  

    // verify username and password
    $username = mysqli_real_escape_string($connect, $_POST["username"]);  
    $password = mysqli_real_escape_string($connect, $_POST["password"]);  

    $sql = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' limit 1") or die(mysqli_error($connect));
    if(mysqli_num_rows($sql) == 1){
        $row = mysqli_fetch_assoc($sql);
        $id = $row["user_id"];
        $username = $row["username"];
    if(password_verify($password, $row["password"]))    
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          $_SESSION["_uid"] = $id;  
                          $xid =$_SESSION["_uid"]; 
                          header("location:entry.php?id=".$xid);  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                          die();
                     }  
    }else{
        echo '<script>alert("Wrong User Details")</script>';  
        die();
    }

    
      }  
 }  
 ?>