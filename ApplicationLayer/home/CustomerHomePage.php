<!DOCTYPE html>
<html>
<head>
	<title>RYTMS | Customer Homepage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}
/*Style for table*/
table, th,{
  border: 2px solid grey;
  border-collapse: collapse;
}

td {
  border: 2px solid grey;
  border-collapse: collapse;
  width: 150px;
  padding: 50px;
  text-align: center;
}

/* Header/Logo Title */
.header {
  padding: 20px;
  text-align: center;
  background: #424242;
  color: white;
  font-size: 30px;
}

.myButton {
  box-shadow: 0px 10px 14px -7px #276873;
  background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
  background-color:#599bb3;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:25px;
  font-weight:bold;
  padding:80px 13px;
  text-decoration:none;
  text-shadow:0px 1px 0px #3d768a;
  width: 350px;
  text-align: center;
}
.myButton:hover {
  background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
  background-color:#408c99;
}
.myButton:active {
  position:relative;
  top:1px;
}


.content{
	text-align: center;
}

.trackingButton {
  box-shadow: 0px 0px 0px 0px #fff6af;
  background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
  background-color:#ffec64;
  display:inline-block;
  cursor:pointer;
  color:#333333;
  font-family:Arial;
  font-size:16px;
  font-weight:bold;
  padding:20px 90px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffee66;
}
.trackingButton:hover {
  background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
  background-color:#ffab23;
}
.trackingButton:active {
  position:relative;
  top:1px;
}
</style>
</head>
<body>

<div class="header">
  <h1>Runner To You</h1>
  <p>Your one stop online shopping website</p>
</div>

<div class="content">
  <h1>Select a category</h1>
  <br><br><br><br>
  <input class="myButton" type="button" onclick="location.href='../../ApplicationLayer/customer/FoodItem.php'" value="Food">
  <input class="myButton" type="button" onclick="location.href='../../ApplicationLayer/customer/MedicineItem.php'" value="Medical">
  <input class="myButton" type="button" onclick="location.href='../../ApplicationLayer/customer/PetItem.php'" value="Pet">
  <input class="myButton" type="button" onclick="location.href='../../ApplicationLayer/customer/GoodItem.php'" value="Good">
  </table>
</div>
<br><br><br><br><br><br><br><br><br><br>
<h3 style="text-align: center;">Have an order? Track your order here!</h3>
<p style="text-align: center;"><a href="../customer/CustomerTrack.php" class="trackingButton">Track My Order</a></p>
</body>
</html>