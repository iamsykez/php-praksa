<?php
require_once ('config.php');
session_start();

?>

<!-- Must have vaild html -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Place an order</title>
  <!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Btter js popup -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

<link rel="stylesheet" href="style.css" type="text/css">

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
                    <a id="brand" class="navbar-brand" href="entry.php">Venikom</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="pizza.php">Order pizza</a></li>
                        <li class="active"><a href="viewOrders.php">View orders</a></li>
                    </ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav>


<div class="container" style="margin-top: 55px;">


<?php
if(!isset($_GET["id"])){
      echo "404 no order found";
      die();
}

$orderid = $_GET["id"];
$query = "SELECT tbl_ingredients.*,pizza.* FROM tbl_ingredients,pizza WHERE tbl_ingredients.order_id = pizza.id AND tbl_ingredients.order_id ='$orderid'";
$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));


while($r = mysqli_fetch_array($sql, MYSQLI_BOTH)){
echo "<table class='table table-condensed'>
<tr>
<th>Order ID</th>
<th>Ingredients</th>
<th>Time</th>
</tr>";


    
    echo"<tr>";
    echo"<td>" . $r['order_id'] . "</td>";
    echo"<td>" . $r['ingredient'] ."</td>";
    echo"<td>" . $r['createdAt'] . "</td>";
    echo"</tr>";


echo "</table>";
}


?>





</div>

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>



  <!-- Latest compiled and minified JavaScript, i have same everyhting :/ it works on mine -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- This makes use of bootstrap too , add it fist to prevent style overlay-- >
<script src="libs/jquery-confirm/jquery-confirm.min.js"></script>

 <!--our code files below everyhting -->
 <script type="text/javascript" src="js/forum.js?112"></script>  


</body>

</html>