<?php
    include 'dbutil.php';
    session_start(); //initialize session variables
    $name="";
    $Daddress="";
    $Dcity="";
    $Dstate="";
    $Dzip="";
    $sql="SELECT name,Daddress,Dcity,Dstate,Dzip FROM user WHERE id=".$userid;//index address


?>

<!DOCTYPE>
<html lang = "en">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel = "stylesheet" type="text/css" href="style.css">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="store.php"><i class = "fa fa-h-square"></i> Defeat | Coronavirus</a>

  <!-- Toggler/collapsibe Button -->
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<body>
  <header class = "main">
    <h1>We Have Received Your Order</h1></header>
    <center>
    <div class = "confirmation">
    <div>Hi, Dear Customer</div>
    <div>We're processing your order and will email you when it ships. Thanks for shopping with us. </div></div>
</center>
<center>
<button class = "return" type = "button">Return TO Home Page</button>
</center>
</body>
</html>

<script>
    document.getElementsByClassName('return')[0].addEventListener('click', returnClicked)
    function returnClicked() {
        window.location = "store.php"
    }
</script>