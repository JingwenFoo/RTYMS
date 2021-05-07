<!DOCTYPE html>
<html>
<head>
	<title>RYTMS | Mainpage</title>
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
  padding: 10px;
  text-align: center;
  background: #424242;
  color: white;
  font-size: 20px;
}
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.shopNow {
  box-shadow: 0px 10px 14px -7px #276873;
  background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
  background-color:#599bb3;
  border-radius:11px;
  border:5px solid #29668f;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:20px;
  font-weight:bold;
  padding:32px 76px;
  text-decoration:none;
  text-shadow:0px 1px 0px #3d768a;
}
.shopNow:hover {
  background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
  background-color:#408c99;
}
.shopNow:active {
  position:relative;
  top:1px;
}
.myButton {
  box-shadow: 0px 1px 0px 0px #fff6af;
  background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
  background-color:#ffec64;
  border-radius:8px;
  border:1px solid #ffaa22;
  display:inline-block;
  cursor:pointer;
  color:#333333;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:13px 38px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffee66;
  width: 300px;
}
.myButton:hover {
  background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
  background-color:#ffab23;
}
.myButton:active {
  position:relative;
  top:1px;
}
</style>
</head>
<body>

<div class="header">
  <h1>Runner To You</h1>
  <p>Your one stop online shopping website</p>
  <p style="text-align: center;"><img src="mainpageheader.png" alt="Snow" style="width:1000px;height: 150px"></p>
</div>
<br><br>
<div>
  <h3 style="text-align: center;">Now available in Kuantan, Pekan and Gambang</h3>
  <p style="text-align: center;"><input class="shopNow" type="button" onclick="location.href='../home/CustomerHomePage.php'" value="Start Shopping Now!"></p>
</div>
<br><br><br><br><br><br><br><br><br>
<div>
  <h4 style="text-align: center;">Admin, Runner and Service Provider Login:</h4>
  <p style="text-align: center;"><button class="button" onclick="location.href='../home/login.php'"><span>Login </span></button></p>
</div>
<h5 style="text-align: center;">Join us</h5>
<div>
  <p style="text-align: center;">
  <input class="myButton" type="button" onclick="location.href='../home/runnerReg.php'" value="Register as runner">
  <input class="myButton" type="button" onclick="location.href='../home/spReg.php'" value="Register as service provider">
</div>
</body>
</html>