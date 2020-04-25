<?php
   include 'dbutil.php';
   session_start(); //initialize session variables
   if(!isset($_SESSION['user']))$_SESSION['user']=""; //if user is undefined set it to default (blank)
   if($_SESSION["user"]!="")header('Location: store.php'); //if user is logged in redirect to calculator
   if($_SERVER['REQUEST_METHOD']=='POST'){ //if this is a post call
       $error=false;
       if($_POST['username']==""){ //check if they entered a username
           $error=true;
           echo("<p class='error'>error: enter a username</p>");
       }
       if($_POST['password']==""){ //check if they entered a password
           $error=true;
           echo("<p class='error'>error: enter a password</p>");
       }
        if($_POST['email']==""){ //check if they entered a password
           $error=true;
           echo("<p class='error'>error: enter a password</p>");
       }
       if($conn->connect_error)die("Connection failed: ".$conn->connect_error);
       $sql="SELECT username FROM account";
       $result=$conn->query($sql);

       if($result->num_rows>0)
       while($row=$result->fetch_assoc()){
           if($_POST['username']==$row["username"]){ //check if they entered a username already taken
               $error=true;
               echo("<p class='error'>error: that username is taken</p>");
           }
       }
       if($error==false){ //if valid register input
            $_SESSION["user"]=$_POST['username']; //set session user index to the new user
            $sql="INSERT INTO account (password, username,email)
            VALUES ('".$_POST['password']."','".$_POST['username']."','".$_POST['email']."')";
            $conn->query($sql);
            $conn->close();
            header('Location: login.php'); //redirect to Login page
       }
   }
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
		<center>
            <ul class = "title">
            <h1>Register Page</h1>
           
			<form action="register.php" method="post">
				<input required class="ui-textfield" type="text" name="username" placeholder="Username"><br>
                <input required class="ui-textfield" type="password" name="password" placeholder="Password"><br>
                <input required class="ui-textfield" type="email" name="email" placeholder="Email"><br>
				<input class="ui-button" type="submit" value="Register">
			</form>
			<a href="login.php">Login</a>
        </center>
</ul>
</body>
</html>