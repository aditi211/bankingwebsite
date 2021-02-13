<html>
 <head>
    <title>
    </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style2.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>


 </style>
  
 </head>
 <body>
  <section id="nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customers.php">View Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transferhistory.php">View Transfer History</a>
        </li>
        </div>
  </section>
  <section id=banner>
  <div class="container">
  <div class="row">
  <div class="col-md-6">

  </div>
  </div>
  </div>
  </section>
  

    
  
    <?php
        session_start();
        $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "customers";

          $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
      die("Connection failed".mysqli_connect_error());
    }

  $cid= $_GET['id'];
  $showquery= "select * from customers_info where id={$cid}";
  $showdata= mysqli_query($conn,$showquery);
  $arrdata= mysqli_fetch_array($showdata);
  $_SESSION['sender']=$arrdata['name'];

  ?>
  <div class="cText">
  <?php
  echo "<br>";
  echo "Welcome ". $arrdata['name']. "<br>";?> </div>
  <div class="cText2">
  <?php 
  echo "Customer ID: ". $arrdata['id'] . "<br>";   
  echo "Email ID: ".$arrdata['email'] . "<br>";
  echo "Mobile Number: ".$arrdata['mobile'] . "<br>"; 
  echo "Available Balance: ".$arrdata['balance'] . "<br>"; ?></div>
<div class="cText3">
<?php
  echo"<br>";
  echo"Send Money Now"."<br>"."<br>";
  ?>
  </div>
<form action="transferpage.php" method="POST">
 <?php $sender=$arrdata['name']; ?>
  <div class="wrapper">
  <label for="Receiver">Receiver Name:</label>
  <select name="Receiver" id="dropdown" required>
  <?php

    $showinfo="select * from customers_info where id!={$cid}";
    $res = mysqli_query($conn, $showinfo);
    while($row = mysqli_fetch_array($res)) {
    echo("<option> ".$row['name']."</option>");
    }
    
 ?>
 </select>
 <br>
 <label for="Amount">Enter Amount  : </label>
 <input name="Amount" type="number" size="8"> 
 <br><br>
 <input type="submit" value="Complete Transaction" style="margin-left:50px;padding:4px;color:#354875; background-color: #ffebf6 ;border:1px solid #354875">
 <br>
 <br>
  </div>
</form>
 <?php
  mysqli_close($conn);
  ?>
  
<img src="images/transfer2.png" class="transferimg">
</img>
</nav>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>