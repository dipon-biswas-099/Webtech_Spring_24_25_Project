<?php
session_start();

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$successMsg = "";


$host = "localhost";
$dbname = "restaurant_db";
$db_username = "root";
$db_password = "";


$conn = new mysqli($host, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitFeedback'])) {

    if (empty(trim($_POST["name"]))) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email is required";
    } else {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty(trim($_POST["message"]))) {
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, message, submitted_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $successMsg = "Thank you for your feedback!";
            $name = $email = $message = "";
        } else {
            $successMsg = "Error saving feedback. Please try again later.";
        }
        $stmt->close();
    }

}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restuarant Management System</title>
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .error { color: red; font-size: 0.9em; }
      .success { color: green; font-size: 1.1em; margin-bottom: 10px; }
    </style>
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

                <!--main menu -->
                <div class="menu text-right">
                    <ul>
                         <li><a class="hvr" href="index.php">home</a></li>
                        <li><a class="hvr" href="categories.php">Category</a></li>
                        <li><a class="hvr" href="food.php">Foods</a></li>
                        <li><a class="hvr" href="order.php">Order</a></li>
                        <li><a class="hvr" href="table.php">Table Reservations</a></li>
                        <li><a class="hvr" href="login.php">Login</a></li>
                        <li><a class="hvr" href="feedback.php">FeedBack</a></li>

                        <li>
                            <a id="shopping-cart" class="shopping-cart">
                                <i class="fa fa-cart-arrow-down"></i>
                                <span class="badge">4</span>
                            </a>
                            <div id="cart-content" class="cart-content">
                                <h3 class="text-center">Shopping Cart</h3>
                                <table class="cart-table" border="0">
                                    <tr>
                                        <th>Food</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><img src="views/img/food/food1.png" alt="food" /></td>
                                        <td>Pizza</td>
                                        <td>500tk</td>
                                        <td>1</td>
                                        <td>500tk</td>
                                        <td><a href="" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="views/img/food/food2.png" alt="food" /></td>
                                        <td>Burger</td>
                                        <td>400tk</td>
                                        <td>1</td>
                                        <td>400tk</td>
                                        <td><a href="" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="views/img/food/food3.png" alt="food" /></td>
                                        <td>Sandwich</td>
                                        <td>300tk</td>
                                        <td>1</td>
                                        <td>300tk</td>
                                        <td><a href="" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th>1200tk</th>
                                        <th></th>
                                    </tr>
                                </table>
                                <a href="order.html" class="btn-primary">Confirm Order</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<br /><br />
<!-- Feedback Form Section -->
<section class="feedback-section">
  <div class="container">
    <h2 class="text-center">We value your feedback!</h2>

    <!-- Show success message -->
    <?php if ($successMsg): ?>
      <p class="success"><?php echo $successMsg; ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="feedback-form" novalidate>
      <div class="form-group">
        <label for="name">Your Name</label><br />
        <input
          type="text"
          name="name"
          id="name"
          value="<?php echo htmlspecialchars($name); ?>"
        />
        <br />
        <span class="error"><?php echo $nameErr; ?></span>
      </div>
      <div class="form-group">
        <label for="email">Your Email</label><br />
        <input
          type="email"
          name="email"
          id="email"
          value="<?php echo htmlspecialchars($email); ?>"
        />
        <br />
        <span class="error"><?php echo $emailErr; ?></span>
      </div>
      <div class="form-group-feed">
        <label for="message">Your Feedback</label><br />
        <textarea
          name="message"
          id="message"
          rows="5"
          ><?php echo htmlspecialchars($message); ?></textarea
        >
        <br />
        <span class="error"><?php echo $messageErr; ?></span>
      </div>
      <div class="form-group">
        <button type="submit" name="submitFeedback" class="btn-primary">
          Send Feedback
        </button>
      </div>
    </form>
  </div>
</section>

<!--footer section -->

<section class="footer">
    <div class="container">
        <div class="grid-3">
            <div class="text-center">
                <h3>About Us</h3> <br />
                <p>
                  This is a Restuarant Management web based system where costomers can order food with less conflict and also drop there feedback about what the experience during using the website.
                  We build this project under our Web techonology course and under Khairul Alom Robin sir.
                </p>
            </div>
            <div class="social-links">
                <h3>Social Links</h3> <br />
                <div class="social">
                    <ul>
                        <li>
                          <a href="https://www.facebook.com/">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="https://www.linkedin.com/feed/">
                            <img src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk4Mi1kMS0xMC5wbmc.png" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="https://www.instagram.com/">
                            <img src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png" alt="" />
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
