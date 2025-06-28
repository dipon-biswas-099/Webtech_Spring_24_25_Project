<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $conn = new mysqli("localhost", "root", "", "restaurant_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $phone, $password);

    if ($stmt->execute()) {
        header("Location: /restuarant_management/views/login.php");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restuarant Management System</title>
    <link
      rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
<link rel="stylesheet" href="/restuarant_management/views/css/style.css">


  </head>
  <body>    

    <header class = "navbar">
        <nav id="site-top-nav" class="navbar-menu navbar-fixed-top"> 
            <div class = "container">
                <div class = "logo">
                    <a href="/restuarant_management/VIEWS/index.php" alt ="logo">
                        <img src="/restuarant_management/views/img/logo1.png" alt="logo">

                    </a>
                </div>

                <!--maion menu -->
               
            </div>
        </nav>
    </header>

<br><br>
<!-- Register section -->
<section class="register">
  <div class="container_register">
    <h2 class="text-center">Register</h2>
    <div class="heading-border"></div>
<form action="" class="form" method="POST" onsubmit="return valForm()">
  <p class="label">Full Name</p>
  <input type="text" name="full_name" id="fullName" placeholder="Enter your full name">
  <span id="fullNameError" class="error"></span>

  <p class="label">Email</p>
  <input type="email" name="email" id="email" placeholder="Enter your email">
  <span id="emailError" class="error"></span>

  <p class="label">Phone Number</p>
  <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
  <span id="phoneError" class="error"></span>

  <p class="label">Password</p>
  <input type="password" name="password" id="password" placeholder="Create a password">
  <span id="passwordError" class="error"></span>

  <input type="submit" name="submit" value="Register" class="btn-primary">
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





 <script src="/restuarant_management/views/js/script.js"></script>
  </body>
</html>
