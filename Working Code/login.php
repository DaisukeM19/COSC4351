<?php
   include 'dbutil.php';
   session_start(); //initialize session variables
   if(!isset($_SESSION['user']))$_SESSION['user']=""; //if user is undefined set it to default (blank)
   if($_SESSION["user"]!="")header('Location: store.php'); //if already logged in redirect to calculator
   if($_SERVER['REQUEST_METHOD']=='POST'){ //check if this is a post call
       if($conn->connect_error)die("Connection failed: ".$conn->connect_error);
       $sql="SELECT username,password FROM account";
       $result=$conn->query($sql);
       if($result->num_rows>0)
       while($row=$result->fetch_assoc()){
           if($_POST['username']==$row["username"]){
               if($_POST['password']==$row["password"]){
                    $_SESSION["user"]=$_POST['username']; //set the session user index to the username
                    header('Location: store.php'); //redirect to calculator
               }
           }
       }
       echo("<p class='error'>Invalid login</p>"); //otherwise show error message
   }
?>
<!DOCTYPE>
<html lang = "en">
<title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel = "stylesheet" type="text/css" href="style.css">
    <title>Login</title>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="store.php"><i class = "fa fa-h-square"></i> Defeat | Coronavirus</a>

  <!-- Toggler/collapsibe Button -->
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<body>
		<center>
            <ul class = "title">
            <h1>Login Page</h1>
			<form action="login.php" method="post">
				<input required class="ui-textfield" type="text" name="username" placeholder="Username"><br>
				<input required class="ui-textfield" type="password" name="password" placeholder="Password"><br>
				<input class="ui-button" type="submit" value="Login">
            </form>
            <a href="register.php">Register</a> | 
            
            <a href="store.php">Continues as guest</a>

		</center>
</ul>
</body>
</html>