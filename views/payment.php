<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restuarant Management System</title>
    <link
      rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>    

    <header class = "navbar">
        <nav id="site-top-nav" class="navbar-menu navbar-fixed-top"> 
            <div class = "container">
                <div class = "logo">
                    <a href="index.html" alt ="logo">
                        <img src="img/logo1.png" alt="logo">
                    </a>
                </div>

                <!--maion menu -->
                <div class="menu text-right">
                    <ul>
                         <li> <a class="hvr" href="index.php">home</a></li>
                        <li> <a class="hvr" href="categories.php">Category</a></li>
                        <li> <a class="hvr" href="food.php">Foods</a></li>
                        <li> <a class="hvr" href="order.php">Order</a></li>
                        <li> <a class="hvr" href="table.php">Table Reservations</a></li>
                        <li> <a class="hvr" href="login.php">Login</a></li>
                        <li> <a class="hvr" href="feedback.php">FeedBack</a></li>

                        <li>
                            <a id="shopping-cart" class="shopping-cart">
                                <i class="fa fa-cart-arrow-down"></i>
                                <span class="badge">4</span>
                            </a>
                            <div id="cart-content" class="cart-content">
                                <h3 class="text-center">Shopping Cart</h3>
                                <table class ="cart-table" border="0">
                                    <tr>
                                        <th>Food</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><img src="img/food/food1.png" alt="food"></td>
                                        <td>Pizza</td>
                                        <td>500tk</td>
                                        <td>1</td>
                                        <td>500tk</td>
                                        <td> <a href="" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="/img/food/food2.png" alt="food"></td>
                                        <td>Burger</td>
                                        <td>400tk</td>
                                        <td>1</td>
                                        <td>400tk</td>
                                        <td> <a href="" class="btn-delete">&times;</a></td>
                                    </tr>

                                    <tr>
                                        <td><img src="/img/food/food3.png" alt="food"></td>
                                        <td>Sandwich</td>
                                        <td>300tk</td>
                                        <td>1</td>
                                        <td>300tk</td>
                                        <td> <a href="" class="btn-delete">&times;</a></td>
                                    </tr>

                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th>1200tk</th>
                                        <th></th>
                                    </tr>
                                </table>
                                <form action="process_order.php" method="post">
                                <button type="submit" class="btn-primary">ConfirOrder</button>
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


<!-- Payment Section -->
<section class="login">
  <div class="container_log">
    <h2 class="text-center">Make Your Payment</h2>
    <div class="heading-border"></div>

    <form action="" method="POST" class="form" onsubmit="return confirmPayment()">

      <p class="label">Payment Method</p>
      <select name="payment_method" required>
        <option value="" disabled selected>Select Method</option>
        <option value="bkash">Bkash</option>
        <option value="nagad">Nagad</option>
      </select>

      <p class="label">Mobile Number</p>
      <input
        type="tel"
        name="mobile_number"
        pattern="[0-9]{10,15}"
        placeholder="Enter your mobile number"
        required
      />

      <p class="label">Amount (TK)</p>
      <input
        type="number"
        name="amount"
        min="1"
        step="0.01"
        placeholder="Enter amount"
        required
      />

      <input type="submit" value="Pay Now" class="btn-primary btn-small" />
    </form>
  </div>
</section>

<!--footter section -->

<section class="footer">
    <div class="container">
        <div class="grid-3">
            <div class="text-center">
                <h3>About Us</h3> <br>
                <p>This is a Restuarant Management web based system where costomers can order food with less conflict and also drop there feedback about what the experience during using the website.
                    We build this project under our Web techonology course and under Khairul Alom Robin sir.

                </p>
            </div>
            <div class="social-links">
                <h3>Social Links</h3> <br>
                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="">
                        </a></li>
                        <li><a href="https://www.linkedin.com/feed/">
                            <img src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk4Mi1kMS0xMC5wbmc.png" alt="">

                        </a></li>
                        <li><a href="https://www.instagram.com/">
                            <img src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png" alt="">
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  function confirmPayment() {
    alert("Thank you for payment sir");
    return true; 
  }
</script>




  </body>
</html>
