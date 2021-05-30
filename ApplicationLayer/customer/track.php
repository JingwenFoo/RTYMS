
 <?php  
 $idURL = $_POST['itemID'];
 $connect = mysqli_connect("localhost", "root", "", "rtyms");  
 $sql = "SELECT orderID,orderStatus,orderTime FROM orders WHERE itemID = '$idURL' ";  
 $result = mysqli_query($connect, $sql);  
 ?>  


<!DOCTYPE html>
<html>
<head>
 
         <title>RTYMS | Order Tracking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
            font-family: Arial;
            }
            .header {
            padding-top: 15px;
            padding-left: 25px;
            padding-bottom: 10px;
            text-align: left;
            background: #424242;
            color: white;
            font-size: 25px;
            }
            .button {
                margin:auto;
                display:block;
            }
            .myButton {
                box-shadow:inset 0px 1px 3px 0px #91b8b3;
                background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
                background-color:#768d87;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:11px 76px;
                text-decoration:none;
                text-shadow:0px -1px 0px #2b665e;
            }
            .myButton:hover {
                background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
                background-color:#6c7c7c;
            }
            .myButton:active {
                position:relative;
                top:1px;
            }
            .homepage {
                box-shadow: 0px 1px 0px 0px #fff6af;
                background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
                background-color:#ffec64;
                display:inline-block;
                cursor:pointer;
                color:#333333;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:6px 76px;
                text-decoration:none;
                text-shadow:0px 1px 0px #ffee66;
            }
            .homepage:hover {
                background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
                background-color:#ffab23;
            }
            .homepage:active {
                position:relative;
                top:1px;
            }
			
			.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
        </style>
    </head>
   
   <title>Program</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 
</head>
<style>
table, th, td {
  border: 1px solid black;
  text-align:left;
}

.button {
  background-color: white;
  border: 1px solid #99C5E4 ;
  color: black;
  padding: 5px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button:hover {
  background-color: #99C5E4 ;
  color: white;
}





</style>
  
</style>

<div class="header">
        <p>Runner To You System</p>
        <h3>Order Tracking</h3>
    </div>
    <br><br><br>
    <div class="row">
        
    <form role="form" action="searchtrack.php" method="post" enctype="multipart/form-data">
   
    <p style="text-align:center"><input class="homepage" type="button" onclick="location.href='../home/CustomerHomePage.php'" value="Return To Homepage"></p>
    </div>
    </form>
<body>
 <body>  
           <br />  
           <div class="container" style="width:300px;">  
                <h3 align=""></h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>orderID</th>  
                              
							   <th>orderStatus</th>
							   
							   <th>orderTime</th>
							   
							   
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["orderID"];?></td>  
							  
                               <td><?php echo $row["orderStatus"]; ?></td> 
							   
							    <td><?php echo $row["orderTime"]; ?></td>
							     
							   
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
<div class="myDiv"></div><br>
<center>



</center>
<div class="myDiv"></div><br>
</body>


</html>
