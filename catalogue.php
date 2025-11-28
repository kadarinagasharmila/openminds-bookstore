<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - OpenMinds</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts + Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body style="padding-top:130px;">

<!-- FIXED NAVBAR OFFSET -->
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
        <img src="logo.jpeg" alt="OpenMinds" width="95" height="95">
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Links -->
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-scroll">

        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="catalogue.php">Catalogue</a>
        </li>

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

        <li class="nav-item">
          <a class="nav-link active" href="cart.php">Cart</a>
        </li>

      </ul>

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
    </div>
  </div>
</nav>
</header>

<!-- CATEGORY SECTIONS -->
<div class="container">

    <!-- CSE -->
    <h2 class="category-title mt-4 mb-3" id="cse">IT / CSE Books</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="book1.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Operating Systems</h5>
                    <p class="card-text">Master OS fundamentals and real-time concepts.</p>
                    <p class="price-tag">₹450</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Operating Systems', 450, 'book1.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="book2.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Data Structures & Algorithms</h5>
                    <p class="card-text">Basics to advanced problem-solving.</p>
                    <p class="price-tag">₹499</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Data Structures & Algorithms', 499, 'book2.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="book3.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">C Programming</h5>
                    <p class="card-text">Learn programming fundamentals.</p>
                    <p class="price-tag">₹350</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('C Programming', 350, 'book3.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mechanical -->
    <h2 class="category-title mt-5 mb-3" id="mech">Mechanical Engineering</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="mech1.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Engineering Thermodynamics</h5>
                    <p class="card-text">Core concepts of energy & processes.</p>
                    <p class="price-tag">₹499</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Engineering Thermodynamics', 499, 'mech1.jpeg')">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="mech2.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Fluid Mechanics</h5>
                    <p class="card-text">Flow mechanics & real-world use.</p>
                    <p class="price-tag">₹420</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Fluid Mechanics', 420, 'mech2.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Civil -->
    <h2 class="category-title mt-5 mb-3" id="ci">Civil Engineering</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="civil1.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Concrete Technology</h5>
                    <p class="card-text">Concrete properties & mix design.</p>
                    <p class="price-tag">₹380</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Concrete Technology', 380, 'civil1.jpeg')">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="civil2.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Structural Engineering Basics</h5>
                    <p class="card-text">Loads & stability explained.</p>
                    <p class="price-tag">₹450</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Structural Engineering Basics', 450, 'civil2.jpeg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- EEE -->
    <h2 class="category-title mt-5 mb-3" id="eee">Electrical & Electronics Engineering</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="eee1.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Power Systems</h5>
                    <p class="card-text">Generation to distribution basics.</p>
                    <p class="price-tag">₹520</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Power Systems', 520, 'eee1.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card book-card-home">
                <img src="eee2.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Digital Electronics</h5>
                    <p class="card-text">Gates, circuits & counters.</p>
                    <p class="price-tag">₹330</p>
                    <button class="btn btn-buy w-100" onclick="addToCart('Digital Electronics', 330, 'eee2.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function searchBooks(event) {
    event.preventDefault();
    let query = document.getElementById("searchInput").value.toLowerCase().trim();
    if (!query) return;

    const books = document.querySelectorAll('.book-card-home');
    books.forEach(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        card.style.display = title.includes(query) ? "block" : "none";
    });
}

function addToCart(title, price, img) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if item already in cart
    const existing = cart.find(item => item.title === title);
    if(existing){
        existing.qty += 1;
    } else {
        cart.push({ title, price, img, qty: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(title + " added to cart!");
}
</script>

</body>
</html>