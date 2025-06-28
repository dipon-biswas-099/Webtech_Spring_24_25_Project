<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit;
}

$host = "localhost";
$dbname = "restaurant_db";
$db_username = "root";
$db_password = "";

$conn = new mysqli($host, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete_user_id'])) {
    $deleteUserId = intval($_GET['delete_user_id']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $deleteUserId);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit;
}

$userResult = $conn->query("SELECT COUNT(*) as total FROM users");
$userCount = $userResult->fetch_assoc()['total'];

$orderCountResult = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$orderCount = $orderCountResult ? $orderCountResult->fetch_assoc()['total_orders'] : 0;

$revenueResult = $conn->query("SELECT SUM(total_price) AS total_revenue FROM orders");
$revenue = $revenueResult ? $revenueResult->fetch_assoc()['total_revenue'] : 0;

$tableExists = $conn->query("SHOW TABLES LIKE 'feedback'");

$feedbackCount = 0;
$feedbacks = [];

if ($tableExists && $tableExists->num_rows > 0) {
    $feedbackCountResult = $conn->query("SELECT COUNT(*) as total FROM feedback");
    $feedbackCount = $feedbackCountResult->fetch_assoc()['total'];

    $feedbackResult = $conn->query("SELECT name, email, message, submitted_at FROM feedback ORDER BY submitted_at DESC");
    if ($feedbackResult) {
        while ($row = $feedbackResult->fetch_assoc()) {
            $feedbacks[] = $row;
        }
    }
}

$users = $conn->query("SELECT id, full_name, email FROM users");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Restaurant Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navbar">
  <nav id="site-top-nav" class="navbar-menu navbar-fixed-top"> 
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="img/logo1.png" alt="logo"></a>
      </div>
    </div>
  </nav>
</header>

<br><br>

<!-- Admin Dashboard Section -->
<section class="admin-dashboard container">
  <h2 class="text-center">Admin Dashboard</h2>
  
  <div class="dashboard-stats">
    <div class="card">
      <h3>Total Registered Users</h3>
      <p><?php echo $userCount; ?></p>
    </div>
    <div class="card">
      <h3>Total Confirmed Orders</h3>
      <p><?php echo $orderCount; ?></p>
    </div>
    <div class="card">
      <h3>Total Revenue</h3>
      <p><?php echo number_format($revenue); ?> TK</p>
    </div>
    <div class="card">
      <h3>Customer Feedback</h3>
      <p><?php echo $feedbackCount; ?></p>
    </div>
    <h3 class="text-center"></h3>
<table class="admin-table" border="1" width="100%" cellspacing="0" cellpadding="10">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($feedbacks)): ?>
      <?php foreach ($feedbacks as $feedback): ?>
        <tr>
          <td><?php echo htmlspecialchars($feedback['name']); ?></td>
          <td><?php echo htmlspecialchars($feedback['email']); ?></td>
          <td><?php echo nl2br(htmlspecialchars($feedback['message'])); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="3" class="text-center">No feedback found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

  </div>

  <h3 class="text-center">Registered Users</h3>
  <table class="admin-table" border="1" width="100%" cellspacing="0" cellpadding="10">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $users->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['full_name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td>
            <a href="admin.php?delete_user_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</section>

<!-- Footer -->
<section class="footer">
  <div class="container">
    <div class="grid-3">
      <div class="text-center">
        <h3>About Us</h3> <br>
        <p>This is a Restaurant Management web-based system where customers can order food and leave feedback. This project was built under our Web Technology course guided by Khairul Alom Robin sir.</p>
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
