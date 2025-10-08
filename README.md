A web-based restaurant management system built with PHP, MySQL, HTML, CSS, and JavaScript. This system allows customers to browse food items, place orders, make reservations, and provide feedback, while providing administrators with a comprehensive dashboard to manage operations.

## Features

### Customer Features
- **User Registration & Authentication**: Secure user registration and login system
- **Food Menu**: Browse available food items with images, descriptions, and prices
- **Shopping Cart**: Add items to cart with quantity selection
- **Order Management**: Place and confirm orders with payment processing
- **Table Reservations**: Book specific time slots for dining
- **Feedback System**: Submit feedback about dining experience
- **Food Search**: Search for specific food items

### Admin Features
- **Admin Dashboard**: Comprehensive overview of restaurant operations
- **User Management**: View and manage registered users
- **Order Tracking**: Monitor all confirmed orders and revenue
- **Feedback Management**: View customer feedback
- **Statistics**: Track total users, orders, revenue, and feedback count

### Screenshots
<img width="1889" height="916" alt="image" src="https://github.com/user-attachments/assets/ecc3e89e-b01a-403b-87cd-c2564ea1054e" /> <br><br>
<img width="1884" height="915" alt="image" src="https://github.com/user-attachments/assets/21a7897b-1e12-4b42-9986-bdbc8e44401f" /><br><br>
<img width="1912" height="733" alt="image" src="https://github.com/user-attachments/assets/c122737b-d1b4-4328-831b-970a35ff4be1" /><br><br>
<img width="1910" height="853" alt="image" src="https://github.com/user-attachments/assets/1d661b16-c6b8-44b3-acbd-c46bf9d353ef" />





## Tech Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Icons**: Font Awesome 6.7.2
- **Server**: Apache (XAMPP)

## Project Structure

```
restaurant_management/
├── controllers/
│   └── UserController.php          # User authentication controller
├── models/
│   └── db_connection.php          # Database connection
├── views/
│   ├── css/
│   │   ├── style.css              # Main stylesheet
│   │   ├── table.css              # Table reservation styles
│   │   └── order.css              # Order page styles
│   ├── js/
│   │   └── script.js              # Client-side functionality
│   ├── img/                       # Images and assets
│   ├── admin.php                  # Admin dashboard
│   ├── categories.php             # Food categories
│   ├── confirm_order.php          # Order confirmation
│   ├── feedback.php               # Feedback form
│   ├── food.php                   # Food items page
│   ├── food-search.php            # Food search
│   ├── index.php                  # Main homepage
│   ├── login.php                  # User login
│   ├── logout.php                 # User logout
│   ├── order.php                  # Order management
│   ├── order-success.php          # Order success page
│   ├── payment.php                # Payment processing
│   ├── register.php               # User registration
│   └── table.php                  # Table reservations
├── db_connection.php              # Root database connection
├── index.php                      # Application entry point
└── README.md                      # Project documentation
```

## Installation

### Prerequisites
- XAMPP/WAMP/LAMP server
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/restaurant-management-system.git
   cd restaurant-management-system
   ```

2. **Move to XAMPP directory**
   ```bash
   # Copy the project to your XAMPP htdocs folder
   cp -r . /xampp/htdocs/restaurant_management/
   ```

3. **Start XAMPP services**
   - Start Apache and MySQL services from XAMPP Control Panel

4. **Create Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `restaurant_db`
   - Create the following tables:

   ```sql
   -- Users table
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       full_name VARCHAR(100) NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       phone VARCHAR(15) NOT NULL,
       password VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Orders table
   CREATE TABLE orders (
       id INT AUTO_INCREMENT PRIMARY KEY,
       food_name VARCHAR(100) NOT NULL,
       price DECIMAL(10,2) NOT NULL,
       quantity INT NOT NULL,
       total_price DECIMAL(10,2) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Feedback table
   CREATE TABLE feedback (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       message TEXT NOT NULL,
       submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

5. **Configure Database Connection**
   - Update database credentials in [`db_connection.php`](db_connection.php) if needed:
   ```php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $database = 'restaurant_db';
   ```

6. **Access the Application**
   - Open your web browser and navigate to: `http://localhost/restaurant_management/`

## Usage

### For Customers
1. **Registration**: Create a new account using the registration form
2. **Login**: Access your account with email and password
3. **Browse Menu**: View available food items on the homepage
4. **Add to Cart**: Select items and quantities, add to shopping cart
5. **Place Order**: Confirm your order and proceed to payment
6. **Make Reservations**: Book table slots for specific times
7. **Provide Feedback**: Share your dining experience

### For Administrators
1. **Admin Login**: Use admin credentials (admin@gmail.com / admin123)
2. **Dashboard Access**: View comprehensive statistics and data
3. **User Management**: Monitor and manage registered users
4. **Order Tracking**: View all confirmed orders and revenue
5. **Feedback Review**: Read customer feedback and suggestions

## API Endpoints

The application uses form-based interactions. Key endpoints include:

- `POST /views/register.php` - User registration
- `POST /views/login.php` - User authentication
- `POST /views/confirm_order.php` - Order confirmation
- `POST /views/feedback.php` - Feedback submission
- `POST /views/table.php` - Table reservation

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Authors

- **Development Team** - Web Technology Course Project
- **Supervisor** - Khairul Alom Robin Sir

## Acknowledgments

- Font Awesome for icons
- Bootstrap community for styling inspiration
- Web Technology course materials and guidance

## Support

For support and questions, please open an issue in the GitHub repository or contact the development team.

---

**Note**: This is an educational project developed as part of a Web Technology course. Please ensure proper security measures are implemented before using in a production environment.
