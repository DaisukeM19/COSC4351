<?php
   include 'dbutil.php';
   session_start(); //initialize session variables
   if(!isset($_SESSION['user']))$_SESSION['user']=""; //if user is undefined set it to default (blank)
   //if($_SESSION["user"]=="")header('Location: login.php'); //if user index is default (blank) redirect to login
   $userid=null;
   $sql="SELECT id,username FROM account";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   while($row=$result->fetch_assoc())if($_SESSION["user"]==$row["username"])$username=$row["username"];
   $username="";
   $sql="SELECT username FROM account WHERE id=".$userid;//index address
   
   $result=$conn->query($sql);
?>

<!DOCTYPE>
<html lang = "en">
    <link rel = "connect" href = "connect.php"/>
    <link rel = "checkout" href = "checkout.php"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel = "stylesheet" type="text/css" href="style.css">
<head>
    <title>The Emergency | Store</title>
</head> 
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="store.php"><i class = "fa fa-h-square"></i> Defeat | Coronavirus</a>

  <!-- Toggler/collapsibe Button -->
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <p	class= "nav-link">Welcome Guest<?php echo($username);?></p><br>
      </li>
      <li class="nav-item">
        <a class ="nav-link"href="logouthandler.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
        <section class="container content-section">
    <div class = "shop-item">
        <span class = "items">Mask</span>
        <img class = "image"src = "mask.jpg">
        <div class = "shop-item-details">
            <span class = "shop-item-price">$1.99</span>
            <button class ="shop-item-button" type = "button">ADD TO CART</button>
        </div>
</div>
 <div class = "shop-item">
        <span class = "items">Hand Sanitizer</span>
        <img class = "image"src = "handSanitizer.jpg">
        <div class = "shop-item-details">
            <span class = "shop-item-price">$5.99</span>
            <button class ="shop-item-button" type = "button">ADD TO CART</button>
        </div>
</div>
 <div class = "shop-item">
        <span class = "items">Glove</span>
        <img class = "image"src = "glove.jpg">
        <div class = "shop-item-details">
            <span class = "shop-item-price">$0.99</span>
            <button class ="shop-item-button" type = "button">ADD TO CART</button>
        </div>
</div>
 <div class = "shop-item">
        <span class = "items">Paper Towel</span>
        <img class = "image"src = "paper_towel.jpg">
        <div class = "shop-item-details">
            <span class = "shop-item-price">$3.99</span>
            <button class ="shop-item-button" type = "button">ADD TO CART</button>
        </div>
    </div>
</div>
        </section>
    <section class="container content-section">
        <h2 class = "section-header">CART</h2>
            <div class = "cart-row">
                <span class = "cart-item">ITEM</span>
                <span class = "cart-price">PRICE</span>
                <span class = "cart-quantity">QUANTITY</span>
            </div>
    <div class = "cart-items">
    </div>
        <div class = "cart-total">
            <span class = "cart-total-title">Total Amount</span>
            <span class = "cart-total-price">$0</span>
        </div> 
     </section>
    <button class = "purchase" type = "button">PURCHASE</button>
</html>



<script>
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('purchase')[0].addEventListener('click', purchaseClicked)
}

function purchaseClicked() {
    
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
    window.location = "checkout.php"

}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('items')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('image')[0].src
    addItemToCart(title, price, imageSrc)
    updateCartTotal()
}

function addItemToCart(title, price, imageSrc) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total  
}
</script>