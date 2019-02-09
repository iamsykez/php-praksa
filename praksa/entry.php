<?php  
 require_once('config.php'); 
 session_start();    
 ?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" type="text/css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>


<nav id="header" class="navbar navbar-fixed-top ; navbar navbar-inverse">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="entry.php">Main page</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                        <li><a href="pizza.php">Order Pizza</a></li>
                        <li><a href="viewOrders.php">View orders</a></li>
                        </ul>
                    
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav>


<div class="container" style="margin-top: 35px">
    <div class="row">
         <div class="col-md-2 col-md-offset-5">
            <div class="form-group">
			
            <h1>Forum</h1>
			<div class="inputStyle1">

        <!--################ FORM ######################-->
			<form action="newthread.php" method="POST">
            Thread Title: <input type="text" name="_title" id="_title" class="form-control" />  <br>
            Thread:<br><textarea class="form-control" rows="5" id="_message" name="_message"></textarea><br>
            <input type="submit" value="Post Thread">
            </form>



            <?php
// We are selecting everything from the threads section in the database and ordering them newest to oldest. 
$sql = mysqli_query($connect,"SELECT threads.*,users.* FROM threads,users WHERE threads.userid = users.user_id ORDER BY id DESC") or die(mysqli_error($connect));

if(mysqli_num_rows($sql) <=0){
    echo "No posts!";
    die();
}
// Now we are getting our results and making them an array
while($row = mysqli_fetch_assoc($sql)){
    $id = $row["id"];
    $name = $row["username"]; //  use this way, lets fix insert first
    $msg = $row["message"];
    $title = $row["title"];
    $updatedAt = $row["updatedAt"];
    $createdAt = $row["createdAt"]; // filter this to better formats, see php format date n time
    $sqlc = mysqli_query($connect, "SELECT COUNT(*) as c FROM replies WHERE thread='$id'") or die(mysqli_error($connect));
    $rx = mysqli_fetch_assoc($sqlc);
    $count = $rx["c"];


    

// Now we will show the available threads
echo "<h3><a href='msg.php?id=".$id."'> ".$title."</a> (".$count.")</h3>".$msg."<h4>Posted by ".$name." on ".$createdAt."</h4>";
    
}

?>

			</div>
            </div>
            </div>
        
        </div>
    </div>
</div>
</body>
</html>