<?php
session_start();

$host = "localhost";
$dbname = "restaurant_db";
$db_username = "root";
$db_password = "";     

$conn = new mysqli($host, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

   
    $admin_email = "admin@gmail.com";
    $admin_password = "admin123"; 

    
    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin'] = true;
        $_SESSION['email'] = $admin_email;
        header("Location: /restuarant_management/views/admin.php");
        exit;
    }

    
    if (empty($emailErr) && empty($passwordErr)) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];

                header("Location: /restuarant_management/views/index.php");
                exit;
            } else {
                $passwordErr = "Incorrect password";
            }
        } else {
            $emailErr = "No account found with this email";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="/restuarant_management/views/css/style.css">
  </head>
  <body>
    <header class="navbar">
        <nav id="site-top-nav" class="navbar-menu navbar-fixed-top"> 
            <div class="container">
                <div class="logo">
                    <a href="index.php" alt="logo">
                        <img src="/restuarant_management/views/img/logo1.png" alt="logo">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <br><br>

    <!-- login section -->
    <section class="login">
      <div class="container_log">
        <h2 class="text-center">Login</h2>
        <div class="heading-border"></div>

        <form action="" class="form" method="POST">
          <p class="label">Email</p>
          <input type="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" >
          <span class="error"><?php echo $emailErr; ?></span>

          <p class="label">Password</p>
          <input type="password" name="password" placeholder="Enter your password">
          <span class="error"><?php echo $passwordErr; ?></span>

          <input type="submit" value="Login" class="btn-primary btn-small">

          <div class="register-link">
            <p>Don't have an account?</p>
            <a href="/restuarant_management/views/register.php" class="btn-secondary">Register</a>
          </div>
        </form>
      </div>
    </section>

    <br><br><br><br>

    <!-- footer section -->
    <section class="footer">
        <div class="container">
            <div class="grid-3">
                <div class="text-center">
                    <h3>About Us</h3> <br>
                    <p>This is a Restaurant Management web-based system where customers can order food with less conflict and drop their feedback about their experience using the website. We built this project under our Web Technology course and under Khairul Alom Robin sir.</p>
                </div>
                <div class="social-links">
                    <h3>Social Links</h3> <br>
                    <div class="social">
                        <ul>
                            <li><a href="https://www.facebook.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt=""></a></li>
                            <li><a href="https://www.linkedin.com/feed/"><img src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk4Mi1kMS0xMC5wbmc.png" alt=""></a></li>
                            <li><a href="https://www.instagram.com/"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>
