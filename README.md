# Bank Management System

A simple and effective **Bank Management System** built using PHP, MySQL, HTML, CSS, and SCSS. This project provides a web-based interface for managing bank accounts, transactions, users, and feedback, designed for both bank managers and cashiers.

---

## Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Database](#database)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## About

This Bank Management System allows bank staff to manage customer accounts, process transactions, transfer funds, post notices, and handle feedback. It includes separate login and dashboard interfaces for managers and cashiers, ensuring role-based access control.

---

## Features

- ✅ User authentication for managers and cashiers
- 👤 Create, update, and delete bank accounts
- 📊 View account details and transaction statements
- 💸 Funds transfer between accounts
- 📢 Manage notices and announcements
- 📝 Feedback submission and management
- 🔧 Profile updates for users
- 📱 Responsive UI with CSS and SCSS styling

---

## Technologies Used

- **Backend:** PHP
- **Frontend:** HTML, CSS, SCSS
- **Database:** MySQL
- **Others:** SQL scripts for database setup

---

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or local development environment (XAMPP, WAMP, MAMP)

### Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/raihanulislam00/Bank-Management.git
   cd Bank-Management
   ```

2. **Set up the database:**

   ### Database Setup

   #### 1. Start MySQL Service and Create Database via phpMyAdmin

   - Ensure your MySQL server is running (e.g., through XAMPP, WAMP, or your hosting environment).
   - Open phpMyAdmin in your browser, usually at:  
     `http://localhost/phpmyadmin`
   - Create a new database named `charusat_bank`:
     - Click on **New** in the left sidebar.
     - Enter `charusat_bank` as the database name.
     - Choose the collation (e.g., `utf8_general_ci`).
     - Click **Create**.

   #### 2. Import the `charusat_bank.sql` File

   - Select the `charusat_bank` database from the left sidebar.
   - Click the **Import** tab.
   - Click **Choose File** and select the `charusat_bank.sql` file from your project directory.
   - Click **Go** to import the database schema and data.

   #### 3. Configure Database Connection in PHP

   Update your database connection file (e.g., `includes/db.php`) with your MySQL credentials as follows:

   ```php
   <?php
   $servername = "localhost";     // Usually 'localhost' for local servers
   $username = "root";            // Your MySQL username (default is 'root')
   $password = "";                // Your MySQL password (often blank for local setups)
   $dbname = "charusat_bank";     // The database you created

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   // Connection successful
   ?>
   ```

   > **Note:**
   > - Replace `$username` and `$password` with your actual MySQL credentials.
   > - phpMyAdmin is a management tool and does not affect how PHP connects to MySQL. The connection is done directly with MySQL credentials.
   > - For enhanced security, avoid exposing your database credentials publicly.

3. **Configure database connection:**
   - Update the database connection settings in the PHP files located in the `includes/` folder
   - Modify the database credentials (hostname, username, password, database name)

4. **Run the project:**
   - Deploy the project on a local server like XAMPP, WAMP, or a live server that supports PHP and MySQL
   - Access the application via `http://localhost/Bank-Management/` or your configured URL

---

## Usage

1. **Access the Application:**
   - Navigate to the login page in your web browser
   - The system supports two types of users: **Managers** and **Cashiers**

2. **Login Process:**
   - Log in as a manager or cashier using the credentials set up in the database
   - Each role has different access permissions and functionalities

3. **Dashboard Navigation:**
   - Use the dashboard to access various functionalities such as:
     - Account management
     - Funds transfer
     - Notice management
     - Feedback handling
   - Managers have additional privileges including account creation and feedback management

---

## Project Structure

```
Bank-Management/
│
├── assets/
│   ├── css/                    # CSS files
│   └── images/                 # Images used in the project
│
├── includes/                   # PHP includes (database connection, header, footer)
│
├── .github/workflows/          # GitHub Actions workflows (if any)
│
├── charusat_bank.sql          # Database schema and initial data
│
├── account.php                # Account details page
├── addnewaccount.php          # Add new account page
├── cashier.php                # Cashier functionalities
├── cashier_index.php          # Cashier dashboard
├── delete_notice.php          # Delete notice functionality
├── feedback.php               # Feedback form
├── funds_transfer.php         # Funds transfer page
├── home.php                   # Home page after login
├── index.php                  # Landing page / Login page
├── login.php                  # Login handling
├── logout.php                 # Logout script
├── manager_accounts.php       # Manager account management
├── manager_feedback.php       # Manager feedback management
├── manager_home.php           # Manager dashboard
├── manager_login.php          # Manager login page
├── manager_notice.php         # Manager notice management
├── notice.php                 # Notices display
├── profile.php                # User profile page
├── statement.php              # Account statement page
├── style.scss                 # SCSS stylesheet
├── updateprofile.php          # Update profile page
└── view.php                   # View details page
```

---

## Database

- The database schema is provided in the `charusat_bank.sql` file
- It includes tables for:
  - **Users** - Manager and cashier authentication
  - **Accounts** - Customer account information
  - **Transactions** - Transaction history and records
  - **Notices** - Bank announcements and notices
  - **Feedback** - Customer feedback and support requests
- Make sure to import this SQL file before running the application

### Database Configuration
Update your database connection details in the includes folder:
```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "charusat_bank";
?>
```

---

## Screenshots

*Soon*

---

## Contributing

Contributions are welcome! Here's how you can help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Types of Contributions
- 🐛 Bug fixes
- ✨ New features
- 📚 Documentation improvements
- 🎨 UI/UX enhancements
- 🔧 Code refactoring

---

## License

This project is open source and available under the [MIT License](LICENSE).

---

## Contact

For any questions or support, please contact:

- **Raihanul Islam**
- GitHub: [@raihanulislam00](https://github.com/raihanulislam00)
- Email: [raihanulislamnahid22@gmail.com]

---

## Acknowledgments

- Thanks to all contributors who helped build this project
- Special thanks to the open-source community for inspiration and resources

---

**Thank you for checking out the Bank Management System!**  
Feel free to star ⭐ the repository if you find it useful.

---

## Future Enhancements

- [ ] Add email notifications for transactions
- [ ] Implement advanced reporting features
- [ ] Add mobile app support
- [ ] Integrate with payment gateways
- [ ] Add two-factor authentication
- [ ] Implement audit logging
