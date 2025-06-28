<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Management System</title>
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header class="navbar">
      <nav id="site-top-nav" class="navbar-menu navbar-fixed-top">
        <div class="container">
          <div class="logo">
            <a href="index.php">
              <img src="img/logo1.png" alt="logo">
            </a>
          </div>
          <div class="menu text-right">
            <ul>
              <li><a class="hvr" href="index.php">home</a></li>
              <li><a class="hvr" href="categories.php">Category</a></li>
              <li><a class="hvr" href="food.php">Foods</a></li>
              <li><a class="hvr" href="order.php">Order</a></li>
              <li><a class="hvr" href="table.php">Table Reservations</a></li>
              <li><a class="hvr" href="feedback.php">FeedBack</a></li>
             
              
              <li>
                <a id="shopping-cart" class="shopping-cart">
                  <i class="fa fa-cart-arrow-down"></i>
                  <span class="badge" id="cart-count">0</span>
                </a>
                <div id="cart-content" class="cart-content">
                  <h3 class="text-center">Shopping Cart</h3>
                  <table class="cart-table" border="0">
                    <thead>
                      <tr>
                        <th>Food</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="cart-items"></tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4">Total</th>
                        <th id="cart-total">0tk</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                 <form id="confirm-order-form" action="confirm_order.php" method="POST">
                    <input type="hidden" name="cart_data" id="cart_data" value="">
                    <button type="submit" class="btn-primary">Confirm Order</button>
                </form>
                

                </div>
              </li>
                 <li><a class="hvr" href="logout.php" ><i class="fa-solid fa-arrow-right-from-bracket"></i></a> </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!--search section-->
    <section class="food-search text-center">
      <div class="container">
        <form action="food-search.html">
          <input type="search" placeholder="Search for food..." required>
          <input type="submit" value="Search" class="btn-primary">
        </form>
      </div>
    </section>

    <!--menu item-->
    <section class="categories">
      <div class="container_c">
        <h2 class="text-center">Foods Items</h2>
        <div class="heading-border"></div>
        <div class="grid-3">
          <div class="float-container">
            <img src="img/food/food1.png" class="img-responsive" alt="">
            <h3 class="float-text text-white">Pizza</h3>
          </div>
          <div class="float-container">
            <img src="img/food/food2.png" class="img-responsive" alt="">
            <h3 class="float-text text-white">Burger</h3>
          </div>
          <div class="float-container">
            <img src="img/food/food3.png" class="img-responsive" alt="">
            <h3 class="float-text text-white">Sandwich</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="food-menu">
      <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <div class="heading-border"></div>
        <div class="grid-2">

          <!-- Food Items -->
          <div class="food-menu-box" data-name="Pizza" data-price="500" data-img="img/food/food1.png">
            <div class="food-menu-img">
              <img src="img/food/food1.png" alt="Pizza" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
              <h4>Pizza</h4>
              <p class="food-price">500tk</p>
              <p class="food-details">Special chicken Pizza with extra cheese.</p>
              <input type="number" class="qty" value="1" min="1">
              <button class="btn-primary add-to-cart">Add To Cart</button>
            </div>
          </div>

          <div class="food-menu-box" data-name="Burger" data-price="400" data-img="img/food/food2.png">
            <div class="food-menu-img">
              <img src="img/food/food2.png" alt="Burger" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
              <h4>Burger</h4>
              <p class="food-price">400tk</p>
              <p class="food-details">Special Burger.</p>
              <input type="number" class="qty" value="1" min="1">
              <button class="btn-primary add-to-cart">Add To Cart</button>
            </div>
          </div>

          <div class="food-menu-box" data-name="Sandwich" data-price="300" data-img="img/food/food3.png">
            <div class="food-menu-img">
              <img src="img/food/food3.png" alt="Sandwich" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
              <h4>Sandwich</h4>
              <p class="food-price">300tk</p>
              <p class="food-details">Special sandwich with fresh vegetables.</p>
              <input type="number" class="qty" value="1" min="1">
              <button class="btn-primary add-to-cart">Add To Cart</button>
            </div>
          </div>

          <div class="food-menu-box" data-name="Cold coffee" data-price="100" data-img="img/food/food4.png">
            <div class="food-menu-img">
              <img src="img/food/food4.png" alt="Cold coffee" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
              <h4>Cold coffee</h4>
              <p class="food-price">100tk</p>
              <p class="food-details">Choco cold coffee.</p>
              <input type="number" class="qty" value="1" min="1">
              <button class="btn-primary add-to-cart">Add To Cart</button>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Footer -->
    <section class="footer">
      <div class="container">
        <div class="grid-3">
          <div class="text-center">
            <h3>About Us</h3><br>
            <p>This is a Restaurant Management web-based system where customers can order food easily and give feedback about their experience. Built under our Web Technology course and guided by Khairul Alom Robin sir.</p>
          </div>
          <div class="social-links">
            <h3>Social Links</h3><br>
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
     <script src="/restuarant_management/views/js/script.js"></script>

  </body>
</html>
