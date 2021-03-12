<?php

	session_start();

require_once "config.php";
if(isset($_POST['buy'])){
      $food_name = $_POST['food_name'];
      $dessert_name = $_POST['dessert_name'];
      $drinks_name = $_POST['drinks_name'];
      
if ($food_name == 'Pork Adobo') {
  $dish_price = 29;
}
else if ($food_name == 'Kaldereta') {
  $dish_price = 39;
}
else if ($food_name == 'Pork Sisig') {
  $dish_price = 19;
}
else {
  echo "Oops! No price its free.";
}
if ($dessert_name == 'Cassava Cake') {
  $dess_price = 40;
}
else if ($dessert_name == 'Puto') {
  $dess_price = 59;
}
else if ($dessert_name == 'Cake') {
  $dess_price = 499;
}
else {
  echo "Oops! No price its free.";
}
if ($drinks_name == 'Sting') {
  $drink_price = 15;
}
else if ($drinks_name == 'Coca-Cola') {
  $drink_price = 70;
}
else if ($drinks_name == 'Gatorade') {
  $drink_price = 89;
}
else {
  echo "Oops! No price its free.";
}
$total_price1 = $dess_price + $dish_price + $drink_price;
}

if(isset($_POST['buy'])){
      $total_price2 = 0;
      $total_price = $total_price1 + $total_price2;

      $sql = "INSERT INTO transaction(food_dish, food_dess, drink, total_price)
      values ('$food_name','$dessert_name','$drinks_name','$total_price;');";

      $result = mysqli_query($link, $sql);
      if($result){
        echo "Order Processed Successfully!!!";
      }else{
        echo "Order Processed Failed!!!";
        echo mysqli_error($conn);
      }
      $total_price2 = $total_price2 + $total_price1;
      $total_price1 = $total_price1 - $total_price1;

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FOS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>

<br><br>
  <div class="middle" style=" padding:60px; border:1px solid #ED2553;  width:92%;">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <h1 style="padding-left: 12%;">ORDERS</h1>
         <label for="food_name" style="font-size: 30px; padding: 20px;">DISH:</label>
         <input type="text" class="form-control" id="food_name" value="<?php 
          if(isset($food_name)) 
          { 
            echo $food_name;}?>" placeholder="Enter Dish Name" name="food_name" required>
         </div>
      <br>
            <div class="form-group">
            <label for="dess" style="font-size: 30px;">Dessert:</label>
            <input type="text" class="form-control" id="dessert_name" value="<?php 
              if(isset($dessert_name)) { 
                echo $dessert_name;}?>" placeholder="Enter Dessert Name" name="dessert_name" required>
             </div>

             <br>
             <div class="form-group">
             <label for="drinks" style="font-size: 30px;padding: 7px;">Drinks:</label>
            <input type="text" class="form-control" id="drinks_name" value="<?php 
              if(isset($drinks_name)) {
               echo $drinks_name;}?>" placeholder="Enter Drinks Name" name="drinks_name" required>
             </div>

      <br>
      <div class="form-group">
                <input type="checkbox" name="chk[]" value="Online Payment" style="margin-left: 8.4%;">Online Payment (PayPal)
                       </div>
                <br>
                <button type="submit" name="buy" class="btn btn-primary" style="margin-left: 12%; height: 30px; width: 100px; color: red; background-color: yellow;">BUY NOW</button>
        <br>
        <span style="color:red;"><?php if (isset($msg)){ echo $msg;}?></span><br>
       </form>

       <h1 style="margin-left: 64%; margin-top: -31%;">MENU</h1>
<div class="left" style=" padding:30px; border:1px solid #ff00ff;  width:40%; height: 50%">
          <div class="img">
            <img src="img/4.jpg">
            <h4 style="padding-left: 35px;">Pork Adobo<br>$29.00</h4>
          </div>
        <div class="img1">
            <img src="img/2.jpg">
             <h4 style="padding-left: 35px;">Kaldereta<br>$39.00</h4>
          </div>
        <div class="img2">
            <img src="img/3.jpg">
             <h4 style="padding-left: 35px;">Pork Sisig<br>$19.00</h4>
          </div>
          
        <div class="img3">
            <img src="img/8.jpeg">
             <h4 style="padding-left: 35px;">Cassava Cake<br>$40.00</h4>
          </div>
        <div class="img4">
            <img src="img/9.jpeg">
             <h4 style="padding-left: 35px;">Puto<br>$59.00</h4>
          </div>
         <div class="img5">
            <img src="img/16.jpg">
             <h4 style="padding-left: 35px;">Cake<br>$499.00</h4>
          </div>
          
          <div class="img6">
            <img src="img/11.jpeg">
             <h4 style="padding-left: 35px;">Sting<br>$15.00</h4>
          </div>
          <div class="img7">
            <img src="img/12.jpeg">
             <h4 style="padding-left: 35px;">Coca-Cola<br>$70.00</h4>
          </div>
          <div class="img8">
            <img src="img/13.jpeg">
             <h4 style="padding-left: 35px;">Gatorade<br>$89.00</h4>
          </div>
</div>
</div>
      </div>
      <br>
    
      <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"PHP","$total_price2":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
     
              
        </tbody>
        </table>
       </div>
    </div>
  </div>  
  
</body>
</html>