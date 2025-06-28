<?php
session_start();
require_once('../db_connection.php');

$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Food</th><th>Price</th><th>Quantity</th><th>Total</th><th>Order Time</th></tr>";
    while ($row = $result->fetch_assoc()) {
       
        echo "<tr> <br> <br>";
        echo "<td>" . htmlspecialchars($row['food_name']) . "</td>";
        echo "<td>" . $row['price'] . "tk</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['total_price'] . "tk</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Your cart is empty.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Restaurant Management System - Order</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/order.css" />
 
</head>
<body>
  <header class="navbar">
    <nav id="site-top-nav" class="navbar-menu navbar-fixed-top">
      <div class="container">
        <div class="logo">
          <a href="index.php" alt="logo">
            <img src="img/logo1.png" alt="logo" />
          </a>
        </div>
        <div class="menu text-right">
          <ul>
            <li><a class="hvr" href="index.php">Home</a></li>
            <li><a class="hvr" href="categories.php">Category</a></li>
            <li><a class="hvr" href="food.php">Foods</a></li>
            <li><a class="hvr" href="order.php">Order</a></li>
            <li><a class="hvr" href="table.php">Table Reservations</a></li>
            <li><a class="hvr" href="login.php">Login</a></li>
            <li><a class="hvr" href="feedback.php">FeedBack</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

    <h2 class="text-center">Please Confirm your payment.</h2>
    <div class="text-center">
      <form action="payment.php" method="post">
        <button type="submit" name="payment" class="btn-primary">Payment</button>
      </form>
    </div>

  <!--footer section -->
  <section class="footer">
    <div class="container">
      <div class="grid-3">
        <div class="text-center">
          <h3>About Us</h3> <br />
          <p>
            This is a Restaurant Management web based system where customers
            can order food with less conflict and also drop their feedback
            about the experience during using the website. We built this
            project under our Web Technology course and under Khairul Alom
            Robin sir.
          </p>
        </div>
        <div class="social-links">
          <h3>Social Links</h3> <br />
          <div class="social">
            <ul>
              <li>
                <a href="https://www.facebook.com/">
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png"
                    alt=""
                  />
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/feed/">
                  <img
                    src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk4Mi1kMS0xMC5wbmc.png"
                    alt=""
                  />
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/">
                  <img
                    src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png"
                    alt=""
                  />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
