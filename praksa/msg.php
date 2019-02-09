<?php
require_once ('config.php');
session_start(); 
?>

<html>

<head>  
           <title>Post reply</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>



<?php
if(!isset($_GET["id"])){
      echo "404 no thread found";
      die();
}
$threadid = $_GET["id"];
$query = "SELECT threads.*,users.* FROM threads,users WHERE threads.userid = users.user_id AND threads.id ='$threadid'";
$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));


// Now we are getting our results and making them an array
while($r = mysqli_fetch_array($sql, MYSQLI_BOTH)) {
$createdAt = $r["createdAt"];
// Here is the thread title.
echo "<h2>$r[title]</h2>";

// Time convert
$tm = strtotime($createdAt);
$posted = date("jS M Y h:i",$tm);

// Now this shows the thread with a horizontal rule after it.
echo "$r[message]<h4>Posted by $r[username] on $posted</h4><hr>";


}

echo "<h3>Replies...</h3>";

// Show replies using query
$sql = "SELECT replies.*,users.* FROM replies,users WHERE replies.userid=users.user_id AND replies.thread = '$threadid'"; // this can be in one query, like i did the entry with username
$result = mysqli_query($connect , $sql) or die(mysqli_error($connect));

// Now we are getting our results and making them an array
while($r = mysqli_fetch_array($result, MYSQLI_BOTH)) {

// Convert unitx timestamp 
$posted = date("jS M Y h:i",strtotime($r["createdAt"]));

// Now this shows the thread with a horizontal rule after it.
echo "$r[message]<h4>Posted by $r[username] on $posted</h4><hr>";


}
?>



<div class="container">
<div class="row">
<div class="form-group">
<form action="newreply.php" method="POST">
<input type="hidden" value="<?php echo $threadid; ?>" name="threadid" id="threadid"><br>
Message:<br><textarea class="form-control" rows="5" id="_msg" name="_msg"></textarea><br>
<input type="submit" name="post-reply" value="Post Reply" class="btn btn-info" />
</form>
</div>
</div>
</div>

<a href='index.php'><input type="submit" name="Go-back" value="Go back" class="btn btn-primary" /></a>

</html>
