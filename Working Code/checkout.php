
<?php
   include 'dbutil.php';
   session_start(); //initialize session variables
   if($_SERVER['REQUEST_METHOD']=='POST'){ //if this is a post call
       $error=false;
       if($_POST['name']==""){ //check if they entered a card number
           $error=true;
           echo("<p class='error'>error: enter a name</p>");
       }
       if($_POST['card']==""){ //check if they entered a card number
           $error=true;
           echo("<p class='error'>error: enter a card number</p>");
       }
       if($_POST['PIN']==""){ //check if they entered PIN
           $error=true;
           echo("<p class='error'>error: enter a PIN</p>");
       }
       if($_POST['dateY']==""){ //check if they entered a year
           $error=true;
           echo("<p class='error'>error: enter a year</p>");
       }
       if($_POST['dateM']==""){ //check if they entered a month
           $error=true;
           echo("<p class='error'>error: enter a month</p>");
       }
       if($_POST['Baddress']==""){ //check if they entered a address
           $error=true;
           echo("<p class='error'>error: enter a address</p>");
       }
       if($_POST['Bcity']==""){ //check if they entered a city
           $error=true;
           echo("<p class='error'>error: enter a city</p>");
       }
       if($_POST['Bstate']==""){ //check if they entered a state
           $error=true;
           echo("<p class='error'>error: enter a state</p>");
       }
       if($_POST['Bzip']==""){ //check if they entered a zip code
           $error=true;
           echo("<p class='error'>error: enter a zip code</p>");
       }
       if($_POST['Daddress']==""){ //check if they entered a address
           $error=true;
           echo("<p class='error'>error: enter a address</p>");
       }
       if($_POST['Dcity']==""){ //check if they entered a city
           $error=true;
           echo("<p class='error'>error: enter a city</p>");
       }
       if($_POST['Dstate']==""){ //check if they entered a state
           $error=true;
           echo("<p class='error'>error: enter a state</p>");
       }
       if($_POST['Dzip']==""){ //check if they entered a zip code
           $error=true;
           echo("<p class='error'>error: enter a zip code</p>");
       }
       if($error==false){ //if valid register input
            $_SESSION["user"]=$_POST['id']; //set session user index to the new user
            $sql="INSERT INTO user (name, card, dateM, dateY, PIN, Daddress, Baddress, Dcity, Bcity, Dstate,Bstate, Dzip,)
            VALUES ('".$_POST['name']."','".$_POST['card']."','".$_POST['dateM']."','".$_POST['dateY']."','".$_POST['PIN']."',
            '".$_POST['Daddress']."','".$_POST['Baddress']."','".$_POST['Dcity']."','".$_POST['Bcity']."','".$_POST['Dstate']."',
            '".$_POST['Bstate']."','".$_POST['Dzip']."''".$_POST['Bzip']."')";
            $conn->query($sql);
            $conn->close();
            header('Location: comfire.php'); //redirect to comfirm page
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
    <form action="checkout.php" method="post">
    <header class = "main" >
    <h1>Check Out information</h1></header>
    <ul class="list">
        <section>
        <div>Full Name : <input type ="text" id = "name" name = "name" placeholder = "Enter your name" required maxlength="50" reqired></div>
        <div>Credit Card Number :<input type="text" id = "card" name = "card" placeholder="Enter your credit card number " maxlength = "16" required></div>
        <div>Card Expiration:
<select name='dateM' required id = "dateM">
    <option value=''>Month</option>
    <option value='01'>01</option>
    <option value='02'>02</option>
    <option value='03'>03</option>
    <option value='04'>04</option>
    <option value='05'>05</option>
    <option value='06'>06</option>
    <option value='07'>07</option>
    <option value='08'>08</option>
    <option value='09'>09</option>
    <option value='10'>10</option>
    <option value='11'>11</option>
    <option value='12'>12</option>
</select> 
<select name='dateY' required id = "dateY">
    <option value=''>Year</option>
    <option value='20'>2020</option>
    <option value='21'>2021</option>
    <option value='22'>2022</option>
    <option value='23'>2023</option>
</select> 
        <div>PIN numeber :<input type="text" id = "PIN" name = "PIN" placeholder="Enter your PIN number " maxlength = "3" required></divi>
        <div>Billing Address : <input type ="text" id = "Baddress" name = "Baddress" placeholder = "Enter your Address" maxlength = "100" required></div>
        <div>City :<input type="city" id = "Bcity" name = "Bcity" placeholder="Enter your City" maxlength = "20" required></div>
        <div>State : <select name = "Bstate" required id = "Bstate">
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>	
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>	
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>	
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>	
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>			
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>	
            <option value="WV">WV</option>
            <option value="WY">WY</option>
        </select>	
    </div>		
        <div>Zip Code: <input type ="text" id = "Bzip" name = "Bzip" placeholder="Enter your zip code" minlength="5" maxlength="9" required> </div>
    </section>	</ul>

    <header class = "main" >
    <h2 class = "header">Delivery Information</h2></header>
    <ul class = "title">
        <div>Delivery Address : <input type ="text" id = "Daddress" name = "Daddress" placeholder = "Enter your Address" maxlength = "100" required></div>
        <div>City :<input type="city" id = "Dcity" name = "Dcity" placeholder="Enter your City" maxlength = "20" required></div>
        <div>State : <select name = "Dstate" required id = "Dstate">
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>	
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>	
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>	
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>	
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>			
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>	
            <option value="WV">WV</option>
            <option value="WY">WY</option>
        </select>	
</div>		
        <div>Zip Code: <input type ="text" id = "Dzip" name = "Dzip" placeholder="Enter your zip code" minlength="5" maxlength="9" required> </div>	
        <div><input  class = "submit" type = "submit" name = "submit" value = "SUBMIT" ></div>
        <div><button class = "cancel" name ="cancel">CANCEL</button></div>
    </form>
    </div>
    </ul>
    </form>
</div>
</body>

<script>
    
    document.getElementsByClassName('cancel')[0].addEventListener('click', cancelClicked)
    function cancelClicked() {
        window.location = "store.php"
    }
    document.getElementsByClassName('submit')[0].addEventListener('click', submitClicked)
    function submitClicked() {
        if(empty(name && card && dateY && dateM && PIN && Baddress && Bcity && Bstate && Bzip && Daddress && Dcity && Dstate && Dzip)) {
            window.location = "checkout.php"
        }
     else{
        window.location = "comfire.php"
    }
    }

</script>