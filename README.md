# Car Shop Management

A simple web-based car shop management system built with PHP and MySQL. The application provides separate login and workflows for customers and administrators.

Customers can view available cars and submit price offers. Administrators can review those offers and either accept or reject them.

---

## Project Overview

The main goal of this project is to build a basic car shop system where customers and administrators have different roles.

### Customer

Customers can:

* Log in to the system
* View available cars
* See the expected price of each car
* Submit an offer price
* Log out

### Admin

Administrators can:

* Log in to the system
* View customer offers
* See the expected price and offered price
* Accept an offer
* Reject an offer
* Log out

When an administrator accepts an offer, the offered price becomes the new car price.

---

## Main Features

* Customer login
* Admin login
* Session-based login state
* Car listing
* Customer price offers
* Admin offer review
* Accept and reject offer functionality
* MySQL database integration
* Basic MVC-style project structure

---

## Technology Used

* **PHP** — Application logic and server-side pages
* **MySQL / MariaDB** — Database
* **HTML** — Web page structure
* **phpMyAdmin** — Database management
* **Apache / XAMPP** — Local development environment

---

## Application Flow

The basic application flow is:

```text
                    Car Shop Management
                            |
              +-------------+-------------+
              |                           |
          Customer                      Admin
              |                           |
           Login                         Login
              |                           |
       View Available Cars        View Customer Offers
              |                           |
        Submit Offer             Accept / Reject
              |                           |
              +-------------+-------------+
                            |
                         Database
```

---

## Database

The project uses a MySQL/MariaDB database named `a`.

The database contains three main tables:

### Admin

Stores administrator login information.

| Column | Description    |
| ------ | -------------- |
| Id     | Admin ID       |
| Name   | Admin name     |
| Pass   | Admin password |

### Customer

Stores customer login information.

| Column | Description       |
| ------ | ----------------- |
| Id     | Customer ID       |
| Name   | Customer name     |
| Pass   | Customer password |

### Car

Stores car information and customer offers.

| Column | Description                |
| ------ | -------------------------- |
| Name   | Car name                   |
| Price  | Expected/current car price |
| Offer  | Customer's submitted offer |

Example cars included in the database:

* Toyota Camry
* Honda Civic
* Ford Mustang
* Tesla Model 3

---

## How the Offer System Works

The offer process is simple:

```text
Customer
   |
   | Submit offer
   v
Car.Offer
   |
   v
Admin reviews offer
   |
   +---- Accept ----> Offer becomes Price
   |
   +---- Reject ----> Offer is removed
```

When an offer is accepted:

```sql
UPDATE car
SET Price = Offer,
    Offer = NULL
WHERE Name = 'Car Name';
```

When an offer is rejected:

```sql
UPDATE car
SET Offer = NULL
WHERE Name = 'Car Name';
```

---

## Project Structure

```text
Car_Shop_Management/
│
└── Final_22_09_24/
    │
    ├── Controllers/
    │   └── logController.php
    │
    ├── Models/
    │   ├── db.php
    │   └── alldb.php
    │
    ├── Views/
    │   ├── adHome.php
    │   ├── adminLog.php
    │   ├── cusHome.php
    │   └── customerLog.php
    │
    ├── index.php
    ├── a.sql
    └── README.md
```

### Controllers

`logController.php` handles the main application actions, including:

* Admin login
* Customer login
* Offer submission
* Offer acceptance
* Offer rejection
* Logout

### Models

`db.php` contains the database connection.

`alldb.php` contains database functions for:

* Checking admin login
* Checking customer login
* Getting car data
* Getting cars with active offers
* Updating offers
* Accepting offers
* Rejecting offers

### Views

The `Views` directory contains the pages shown to users.

* `adminLog.php` — Admin login
* `customerLog.php` — Customer login
* `adHome.php` — Admin dashboard
* `cusHome.php` — Customer dashboard

---

## Setup

### 1. Install a Local Server

You can use XAMPP with:

* Apache
* MySQL
* PHP
* phpMyAdmin

### 2. Clone the Repository

```bash
git clone https://github.com/apondas007890/Car_Shop_Management.git
```

Place the project inside the XAMPP `htdocs` directory.

### 3. Create the Database

Open phpMyAdmin and create a database named:

```text
a
```

Import:

```text
Final_22_09_24/a.sql
```

This will create the required:

```text
admin
customer
car
```

tables and insert sample data.

### 4. Check Database Connection

The database connection is configured in:

```text
Models/db.php
```

The current local configuration uses:

```text
Host: localhost
Username: root
Password: empty
Database: a
```

Update these values if your local MySQL setup is different.

### 5. Run the Application

Start Apache and MySQL from XAMPP.

Then open:

```text
http://localhost/Car_Shop_Management/Final_22_09_24/
```

---

## Sample Login

The SQL file contains sample accounts for testing.

### Admin

```text
ID: 1
Name: 1
Password: 1
```

### Customer

```text
ID: 2
Name: 2
Password: 2
```

These are only sample credentials included with the project.

---

## Project Purpose

This project was developed to practice:

* PHP web development
* MySQL database operations
* Session handling
* Form processing
* Basic role-based application flow
* Connecting a web application with a relational database
* Organizing application code into Controllers, Models, and Views

---

## Future Improvements

Some areas that could be improved in a future version include:

* Password hashing instead of storing plain passwords
* Prepared SQL statements
* Better input validation
* Better session and authorization checks
* A more modern user interface
* Separate database records for offers
* Customer offer history
* Car purchase records
* Search and filtering
* Better error handling
* Responsive design

---

## Author

**Apon Kumar Das**

Aspiring Data Engineer with an interest in software development, databases, data engineering, and building practical technology projects.

---

## License

This project was built as part of my WebTech course, applying full-stack concepts to a real-world implementation.
