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
                    <a id="brand" class="navbar-brand" href="entry.php">Main page</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="pizza.php">Order pizza</a></li>
                        <li><a href="viewOrders.php">View orders</a></li>
                    </ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav>


<div class="container" style="margin-top: 55px;">

<div class="well">

<div id="message-space"> </div>

<div id="order-form">  
<div class="row">

  
  <form action="pizzaOrder.php" method="POST">
    <div class="form-group">
    <div class="col-md-6"  >
                     <label>Your name</label>  
                     <input type="text" id="name" class="form-control" />  
                     <label>Your address</label>  
                     <input type="text" id="address" class="form-control" />  
  <br/>

                
                </div>
  <div class="col-md-6" >
  
                    <div align="center">
                     <label>Construct your pizza</label>  
                     </div>
                    
                     <ul class="checkbox-grid">
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="peperoni">Pepperoni</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="onion">Onion</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="greenPepper">Green Pepper</label></li>
                     <br />
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="mushroom">Mushroom</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients"value="anchovies">Anchovies</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients"value="bacon">Bacon</label></li>
                     <br />
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="ham">Ham</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="tofu">Tofu</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="veggieMix">Veggie mix</label></li>
                     <br/>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="shrimp">Shrimp</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="feta">Feta cheese</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="broccoli">Broccoli</label></li>
                     <br />
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="extraCheese">Extra Cheese</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="chicken">Chicken</label></li>
                     <li><label class="checkbox-inline"><input type="checkbox" name="ingredients" value="olives">Olives</label></li>
                     <br />
                     </ul>
          
                
  </div>
</div>

<div class="row">
  <div class="col-md-12" >
  <align="center">   
<label>Pizza Size </label>
<label class="radio-inline"><input type="radio" name="pizza_size" value="small" checked>Small</label>
<label class="radio-inline"><input type="radio" name="pizza_size" value="medium">Medium</label>
<label class="radio-inline"><input type="radio" name="pizza_size" value="large">Large</label>
<label class="radio-inline"><input type="radio" name="pizza_size" value="family">Family</label> 
</div>


                <div class="row">
                <div class="col-md-12" align="center">
                <button onclick="SubmitNewOrder();" class="btn btn-primary" id="submitOrder">Submit order</button>
                <br/>
                <p><b>INFO:</b> The default price of a pizza with no ingredients small is 12$, each bigger size adds +3$ and each ingredient +1.50$</p>
                </div>
                </div>

</div> <!-- order form div ends -->
</div>

</div>
</div>
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