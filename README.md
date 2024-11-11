# bnzsrv - Web landpage & Administration Panel

A secure web administration panel built with PHP, featuring user authentication and a modern dark-themed interface.

## Features

- Secure user authentication system
- Dark-themed responsive design using Bootstrap 5
- PDO database connection with prepared statements
- Session management
- Modern portfolio landing page
- Secure password hashing with BCrypt
- Error logging system

## Technical Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript
- **Backend**: PHP 8+
- **Database**: MySQL
- **Security**: PDO, Password Hashing, Session Management
- **Additional**: Custom error logging, Responsive design

## Project Structure
├── api/
│ ├── login.php
│ └── logout.php
├── includes/
│ ├── auth.php
│ ├── config.php
│ ├── createHash.php
│ ├── db.php
│ └── functions.php
├── public/
│ ├── img/
│ ├── js/
│ ├── index.html
│ ├── login.php
│ └── test_db.php
└── logs/
└── error.log

## Security Features

- Password hashing using BCrypt
- Prepared statements to prevent SQL injection
- Session-based authentication
- Secure database connection handling
- Error logging system

## Installation

1. Configure database credentials in `includes/config.php`
2. Set up your MySQL database
3. Ensure proper permissions for the logs directory
4. Configure your web server to point to the public directory

## Requirements

- PHP 8.0 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
