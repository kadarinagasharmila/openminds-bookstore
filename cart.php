<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - OpenMinds</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>

    <!-- Bootstrap -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- Fonts + Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body style="padding-top:130px;">

<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="logo.jpeg" alt="OpenMinds" width="95" height="95">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-scroll">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="catalogue.php">Catalogue</a></li>
         <!-- Categories Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#cse">IT/CSE</a></li>
            <li><a class="dropdown-item" href="#ci">CIVIL</a></li>
            <li><a class="dropdown-item" href="#eee">EEE</a></li>
            <li><a class="dropdown-item" href="#ece">ECE</a></li>
            <li><a class="dropdown-item" href="#mech">ME</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link active" href="#">Cart</a></li>
        <!-- Search -->
      <form class="d-flex me-3" onsubmit="searchBooks(event)">
        <input class="form-control me-2" id="searchInput" type="search" placeholder="Search for Books..." />
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <!-- Buttons -->
      <?php
session_start();
if(isset($_SESSION['username'])) {
    echo '<span class="me-3">Hello, ' . $_SESSION['username'] . '</span>';
    echo '<a href="logout.php"><button class="btn btn-danger">Logout</button></a>';
} else {
    echo '<a href="register.html"><button class="btn btn-secondary1 me-2">Register</button></a>';
    echo '<a href="login.html"><button class="btn btn-secondary2">Login</button></a>';
}
?>
      </ul>
    </div>
  </div>
</nav>
</header>

<div class="container my-5">
    <h2 class="mb-4">Your Cart</h2>
    <div id="cartItems" class="mb-4"></div>
    <h4 id="cartTotal"></h4>
</div>

<script>
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContainer = document.getElementById('cartItems');
    cartContainer.innerHTML = '';

    if(cart.length === 0) {
        cartContainer.innerHTML = '<p>Your cart is empty!</p>';
        document.getElementById('cartTotal').innerText = '';
        return;
    }

    let totalPrice = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.qty;
        totalPrice += itemTotal;

        const itemDiv = document.createElement('div');
        itemDiv.className = 'card mb-3';
        itemDiv.innerHTML = `
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="${item.img}" class="img-fluid rounded-start" alt="${item.title}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${item.title}</h5>
                        <p class="card-text">Price: ₹${item.price}</p>
                        <p class="card-text">Quantity: ${item.qty}</p>
                        <p class="card-text">Total: ₹${itemTotal}</p>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <button class="btn btn-danger" onclick="removeItem(${index})"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `;
        cartContainer.appendChild(itemDiv);
    });

    document.getElementById('cartTotal').innerText = `Cart Total: ₹${totalPrice}`;
}

function removeItem(index) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1); // remove item
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
}

// Load cart on page load
loadCart();
</script>

</body>
</html>