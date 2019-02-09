// ## js handles data loading and data submit
$(document).ready(function() {
    // this is called when page has fully loaded
    console.log("loaded");

    $("form").submit(function(e){
        e.preventDefault();
    });
 
});

function SubmitNewOrder(){
    //alert("Submit forum called");
    // get data to send to server
    var _name = $("input#name").val(); // gets the value of this id on the page, very simple :P
    var _address = $("input#address").val(); // address, simple , can u hear me ? no :D, i probabyl have stuff muted
    var _size = $("input[name=pizza_size]:checked").val(); // >> # << means select a id btw
 
    var _ingredients = $('input[name=ingredients]:checked').map(function(){   return this.value;  }).get(); // get sall teh checked values
if(_ingredients.length < 1){
    _ingredients = "";
}
// you can also vaildate on client side here
// use same code for about anyhting, this is the jquery :D
    // styles
    var message_error = $("#message-space"); // selects the div we created
     message_error.html('');

    if(_name.length < 3){
     message_error.html('<div class="alert alert-danger"><strong>Error!</strong> Please enter a vaild name</div>');
     return;
    }

    if(_address.length < 5){
     message_error.html('<div class="alert alert-danger"><strong>Error!</strong> Please enter a vaild address</div>');
     return;
    }

    // send data to server
    var url = "api/pizza_order.php";
    var datax = {"name":_name,"address":_address,"size":_size,"ingredients":_ingredients}; // data to send, these are post vars

  $.ajax({type: "POST",url: url,dataType:"json",data: datax,

    success: function(data){
    console.log("s:" +data);  // post respones from server
 
    if(data.error != undefined){ 
      var ev_msg = data.msg;
      message_error.html('<div class="alert alert-danger"><strong>Error!</strong> '+ev_msg+' </div>');
      return;
    }

    if(data.success != undefined){
      var ev_msg = data.msg;
       // display nice message to user
       message_error.html('<div class="alert alert-success"><strong>Success!</strong> '+ev_msg+' <a class="btn btn-info" href="pizza.php">Place new order </div></div>');
       $("#order-form").hide();
       return;
    }

}   ,

    error: function(data){
    console.log(data);
    
    }

  });
}