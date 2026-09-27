# 🏫 Smart Campus Resource Management System

### A centralized DBMS-powered platform for managing campus resources, facilities, bookings, maintenance and operations.

![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/Backend-PHP%208.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![XAMPP](https://img.shields.io/badge/Server-XAMPP-F37623?style=for-the-badge&logo=xampp&logoColor=white)
![HTML](https://img.shields.io/badge/Frontend-HTML%20%7C%20CSS-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![Git](https://img.shields.io/badge/Version%20Control-Git-F05032?style=for-the-badge&logo=git&logoColor=white)

**DBMS Microproject · MSBTE K-Scheme · Diploma in AI & ML**

------------------------------------------------------------------------

## ✨ Overview

**Smart Campus Resource Management System** is a centralized relational
database project designed to manage the physical and operational
resources of a modern educational campus.

The system connects students, faculty, departments, buildings, rooms,
laboratories, computers, equipment, inventory, bookings, events,
complaints and maintenance workflows through a structured relational
database.

The project focuses on **relational design, data integrity, SQL
querying, normalization and practical database management** rather than
isolated CRUD operations.

------------------------------------------------------------------------

## 🎯 Objectives

-   🗄️ Design a normalized relational database for campus management
-   🔗 Establish meaningful relationships using primary and foreign keys
-   🏫 Manage the campus → building → floor → room hierarchy
-   💻 Track laboratories, computers and equipment
-   📦 Maintain inventory and inventory transactions
-   📅 Manage room bookings and campus events
-   🛠️ Track maintenance requests and technician assignments
-   📝 Handle complaints and internal issue logs
-   🔎 Provide database-driven search, filtering and sorting
-   🧩 Demonstrate advanced DBMS features
-   🖥️ Provide a clean web interface over the database

------------------------------------------------------------------------

## 🧠 DBMS Concepts Covered

  Concept           Implementation
  ----------------- ------------------------------------------
  Database Design   Relational campus resource model
  Primary Keys      Unique identifiers for entities
  Foreign Keys      Enforced table relationships
  Constraints       `NOT NULL`, `UNIQUE`, `CHECK`, `DEFAULT`
  Joins             Multi-table resource queries
  Aggregation       `COUNT`, `GROUP BY`, `HAVING`
  Filtering         `WHERE`, `LIKE`, `IN`, `BETWEEN`, `NULL`
  Sorting           Database-side `ORDER BY`
  Subqueries        Filtering and analytical queries
  Views             Reusable database-level result sets
  Indexes           Query performance
  Transactions      `COMMIT`, `ROLLBACK`, `SAVEPOINT`
  Stored Programs   Procedures and functions
  Error Handling    MySQL/MariaDB handlers
  Normalization     Structured relational design

------------------------------------------------------------------------

## 🏗️ Architecture

The project follows a clean **MODULE / VIEW / CONTROL** architecture.

``` text
SMART_CAMPUS_RESOURCE_MANAGEMENT/
│
├── MODULE/
│   ├── DATABASE/
│   ├── SCHEMA/
│   ├── DATA/
│   ├── QUERIES/
│   ├── VIEWS/
│   ├── PROCEDURES/
│   ├── FUNCTIONS/
│   ├── TRANSACTIONS/
│   └── TESTING/
│
├── VIEW/
│   ├── smart-campus-ui/
│   └── php-frontend/
│
└── CONTROL/
    ├── db/
    │   └── connection.php
    ├── controllers/
    └── error-handling/
```

### 🔄 Application Flow

``` text
User
  ↓
VIEW — PHP Frontend
  ↓
CONTROL — Controllers / Validation
  ↓
MySQL Database
  ↓
Relational Data
```

------------------------------------------------------------------------

## 🗂️ Database Modules

The system contains **24 interconnected tables**.

    \# Table                      Purpose
  ---- -------------------------- -----------------------------------------
    01 `DEPARTMENT`               Academic and administrative departments
    02 `STUDENT`                  Student records
    03 `FACULTY`                  Faculty records
    04 `STAFF`                    Campus staff records
    05 `TECHNICIAN`               Technical maintenance staff
    06 `CAMPUS`                   Campus locations
    07 `BUILDING`                 Campus buildings
    08 `FLOOR`                    Building floors
    09 `ROOM`                     Campus rooms
    10 `LAB`                      Specialized laboratories
    11 `COMPUTER`                 Lab computer assets
    12 `EQUIPMENT_CATEGORY`       Equipment classification
    13 `EQUIPMENT`                Physical equipment assets
    14 `INVENTORY_ITEM`           Consumable and stock items
    15 `INVENTORY_TRANSACTION`    Inventory IN/OUT transactions
    16 `BOOKING`                  Temporary room bookings
    17 `BOOKING_RESOURCE`         Equipment used in bookings
    18 `EVENT`                    Campus events
    19 `EVENT_REGISTRATION`       Student event registrations
    20 `MAINTENANCE_REQUEST`      Maintenance requests
    21 `MAINTENANCE_ASSIGNMENT`   Technician assignments
    22 `COMPLAINT`                User-submitted complaints
    23 `ISSUE_LOG`                Internal technical history
    24 `RESOURCE_ALLOCATION`      Long-term resource assignments

------------------------------------------------------------------------

## 🔗 Key Relationships

``` text
DEPARTMENT
├── STUDENT
├── FACULTY
├── STAFF
├── LAB
└── RESOURCE_ALLOCATION

CAMPUS
└── BUILDING
    └── FLOOR
        └── ROOM
            ├── LAB
            ├── BOOKING
            └── EQUIPMENT

LAB
└── COMPUTER

EQUIPMENT_CATEGORY
└── EQUIPMENT

BOOKING
└── BOOKING_RESOURCE
    └── EQUIPMENT

EVENT
└── EVENT_REGISTRATION
    └── STUDENT

MAINTENANCE_REQUEST
└── MAINTENANCE_ASSIGNMENT
    └── TECHNICIAN
```

------------------------------------------------------------------------

## 🖥️ Web Interface

### Current Modules

-   👨‍🎓 Students
-   👨‍🏫 Faculty
-   🏢 Buildings
-   🚪 Rooms

### Upcoming Modules

-   🧪 Labs
-   💻 Computers
-   🔧 Equipment
-   📦 Inventory
-   📅 Bookings
-   🎪 Events
-   🛠️ Maintenance
-   📝 Complaints
-   📊 Dashboard

### UI Features

-   Search
-   Database-side filtering
-   Sorting
-   Status badges
-   Responsive tables
-   Shared sidebar navigation
-   Centralized CSS
-   Empty-state handling
-   Controller-based data retrieval

------------------------------------------------------------------------

## 🧪 Sample SQL

### Students with departments

``` sql
SELECT
    s.student_id,
    s.enrollment_no,
    CONCAT(s.first_name, ' ', s.last_name) AS student_name,
    d.department_code,
    d.department_name
FROM STUDENT s
JOIN DEPARTMENT d
    ON s.department_id = d.department_id;
```

### Campus hierarchy

``` sql
SELECT
    c.campus_name,
    b.building_name,
    f.floor_name,
    r.room_number,
    r.room_name
FROM CAMPUS c
JOIN BUILDING b
    ON c.campus_id = b.campus_id
JOIN FLOOR f
    ON b.building_id = f.building_id
JOIN ROOM r
    ON f.floor_id = r.floor_id
ORDER BY
    c.campus_name,
    b.building_name,
    f.floor_number;
```

### Students per department

``` sql
SELECT
    d.department_name,
    COUNT(s.student_id) AS total_students
FROM DEPARTMENT d
LEFT JOIN STUDENT s
    ON d.department_id = s.department_id
GROUP BY
    d.department_id,
    d.department_name
ORDER BY total_students DESC;
```

------------------------------------------------------------------------

## ⚙️ Technology Stack

  Layer               Technology
  ------------------- ------------------------------------
  Database            MySQL 8.x / MariaDB-compatible SQL
  Backend             PHP 8.2
  Web Server          Apache
  Local Environment   XAMPP
  Frontend            HTML5, CSS3
  Database API        MySQLi
  Version Control     Git & GitHub
  IDE                 Visual Studio Code

------------------------------------------------------------------------

## 🚀 Local Setup

### 1. Clone

``` bash
git clone https://github.com/BuiltByAdvait/smart-campus-resource-management.git
cd smart-campus-resource-management
```

### 2. Start Apache

Start **Apache** using XAMPP.

### 3. Create the database

Execute the database and schema scripts from:

``` text
MODULE/DATABASE/
MODULE/SCHEMA/
```

Follow the dependency order when importing tables.

### 4. Configure the connection

Configure:

``` text
CONTROL/db/connection.php
```

Use your local database credentials.

> Never commit database passwords or credentials to GitHub.

### 5. Open the application

``` text
http://localhost/smart-campus/
```

------------------------------------------------------------------------

## 🌿 Git Workflow

``` bash
git pull origin main

git checkout -b feature/your-module

# Make changes

git add .
git commit -m "Add <module>"

git push origin feature/your-module
```

Before modifying shared code or schema:

> **Pull first → inspect existing code → make changes → test → commit →
> push.**

------------------------------------------------------------------------

## 👥 Team

  Member         Primary Responsibility
  -------------- ---------------------------------------
  **Advait**     Control layer, integration & frontend
  **Nirbhay**    Advanced DBMS features
  **Shreyash**   SQL queries
  **Parth**      Frontend / supporting modules

------------------------------------------------------------------------

## 🔐 Project Rules

-   Never commit `.env` files or database passwords
-   Do not modify the finalized schema without team approval
-   Use prepared statements for user-controlled input
-   Validate filter and sort parameters
-   Keep database logic inside controllers
-   Keep styling centralized in `app.css`
-   Test changes locally before pushing
-   Pull the latest `main` before starting new work

------------------------------------------------------------------------

## 📌 Project Status

  Area                      Status
  ------------------------ --------
  Database Architecture       ✅
  Relational Schema           ✅
  Initial Dataset             ✅
  EER Design                  ✅
  PHP Control Layer           🟡
  Student Module              ✅
  Faculty Module              ✅
  Buildings Module            ✅
  Rooms Module                ✅
  Advanced DBMS Features      🟡
  Complete Frontend           🟡
  Testing                     🟡
  Documentation               🟡

------------------------------------------------------------------------

## 🎓 Academic Context

**Project:** Smart Campus Resource Management System\
**Subject:** Database Management System\
**Board:** MSBTE K-Scheme\
**Program:** Diploma in Artificial Intelligence & Machine Learning

This project demonstrates relational database design, SQL, constraints,
normalization, querying, advanced DBMS features and database-backed
application development.

------------------------------------------------------------------------

## 🏫 Smart Campus

**Manage Resources. Connect Data. Simplify Campus Operations.**

Built with ❤️ by the Smart Campus team.
