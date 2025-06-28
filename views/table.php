<?php
session_start();

if (!isset($_SESSION['waitlist'])) {
    $_SESSION['waitlist'] = [
      
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['customer_name'] ?? '');
    $time = trim($_POST['time_slot'] ?? '');

    if ($name && $time) {
        // Add new entry to waitlist
        $_SESSION['waitlist'][] = [
            'name' => htmlspecialchars($name),
            'time' => htmlspecialchars($time),
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Table Reservations</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/table.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <header class="navbar">
      <nav id="site-top-nav" class="navbar-menu navbar-fixed-top"> 
        <div class="container">
          <div class="logo">
            <a href="index.html" alt="logo">
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
    <div class="nav">
      <h1>Table Reservations</h1>
      <p>Book specific time slots</p>
    </div>

    <div class="container">
      <div class="section" id="floor-plan">
        <h2>Floor Plan Map</h2>
        <div class="floor-plan">
          <div class="table-box">Table 1</div>
          <div class="table-box">Table 2</div>
          <div class="table-box">Table 3</div>
          <div class="table-box">Table 4</div>
          <div class="table-box">Table 5</div>
          <div class="table-box">Table 6</div>
          <div class="table-box">Table 7</div>
          <div class="table-box">Table 8</div>
        </div>
      </div>

      <div class="section" id="reservation-book">
        <h2>Reservation Book</h2>
        <form method="POST" action="table.php">
          <label>
            Customer Name:
            <input type="text" name="customer_name" required />
          </label>
          <br /><br />
          <label>
            Table Number:
            <select name="table_number">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </label>
          <br /><br />
          <label>
            Time Slot:
            <input type="time" name="time_slot" required />
          </label>
          <br />
          <button type="submit">Reserve</button>
        </form>
      </div>

      <div class="section" id="waitlist">
        <h2>Waitlist</h2>
        <table>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Requested Time</th>
          </tr>
          <?php
          if (!empty($_SESSION['waitlist'])):
              $count = 1;
              foreach ($_SESSION['waitlist'] as $entry):
          ?>
          <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $entry['name']; ?></td>
            <td><?php echo $entry['time']; ?></td>
          </tr>
          <?php
              endforeach;
          else:
          ?>
          <tr>
            <td colspan="3" style="text-align:center;">No waitlist entries</td>
          </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>

    <!--footer section -->
    <section class="footer">
      <div class="container">
        <div class="grid-3">
          <div class="text-center">
            <h3>About Us</h3> <br />
            <p id="1">
              This is a Restuarant Management web based system where costomers can
              order food with less conflict and also drop there feedback about
              what the experience during using the website. We build this project
              under our Web techonology course and under Khairul Alom Robin sir.
            </p>
          </div>
          <div class="social-links">
            <h3>Social Links</h3> <br />
            <div class="social">
              <ul>
                <li>
                  <a href="https://www.facebook.com/"
                    ><img
                      src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png"
                      alt=""
                  /></a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/feed/"
                    ><img
                      src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk4Mi1kMS0xMC5wbmc.png"
                      alt=""
                  /></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/"
                    ><img
                      src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png"
                      alt=""
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
