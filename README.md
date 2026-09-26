⚡ SMART CAMPUS

Resource Management System · DBMS Microproject

<p align="center">

<strong>{=html}A centralized campus resource management platform built
with PHP, MySQL and XAMPP.</strong>{=html}<br>{=html} Designed
around a clean MVC-inspired architecture with a database-first workflow.

</p>

✦ Project Overview

Smart Campus Resource Management System is a relational database
application designed to centralize campus resources and operations.

It brings together:

👨‍🎓 Students

👨‍🏫 Faculty

🏢 Buildings & Rooms

🧪 Laboratories

💻 Computers

🖥️ Equipment

📦 Inventory

📅 Bookings

🎤 Events

🛠️ Maintenance

📝 Complaints

The project is DBMS-focused: MySQL handles relationships, filtering,
sorting, aggregation and advanced database operations, while PHP
connects the database to the frontend.

🧠 Architecture

                    SMART CAMPUS
                         │
             ┌───────────┴───────────┐
             │                       │
           VIEW                    CONTROL
        PHP Frontend             PHP Controllers
             │                       │
             └───────────┬───────────┘
                         │
                    MySQL Database
                         │
                       MODULE
                         │
       ┌─────────────────┼─────────────────┐
       │                 │                 │
     Schema            Queries       Advanced DB
       │                 │                 │
     Tables          SELECT/JOIN      Procedures
     Relations       WHERE/GROUP      Functions
     Constraints     HAVING/ORDER     Cursors
                                    Transactions
                                    Error Handling

Request Flow

User Action
    ↓
PHP View
    ↓
PHP Controller
    ↓
SQL Query
    ↓
MySQL
    ↓
Result Set
    ↓
PHP Controller
    ↓
PHP View

Search, filtering and sorting are performed through SQL executed by
MySQL rather than being treated as frontend-only operations.

📁 Project Structure

SMART_CAMPUS_RESOURCE_MANAGEMENT/
│
├── CONTROL/
│   ├── controllers/
│   ├── db/
│   ├── services/
│   ├── validators/
│   └── error-handlers/
│
├── MODULE/
│   ├── 01_DATABASE/
│   ├── 02_SCHEMA/
│   ├── 03_DATA/
│   ├── 04_QUERIES/
│   ├── 05_VIEWS/
│   ├── 06_PROCEDURES/
│   ├── 07_FUNCTIONS/
│   ├── 08_TRANSACTIONS/
│   ├── 09_TESTING/
│   └── 10_Documentation/
│
├── VIEW/
│   ├── php-frontend/
│   │   ├── assets/
│   │   ├── includes/
│   │   ├── students/
│   │   ├── faculty/
│   │   └── ...
│   │
│   └── smart-campus-ui/
│
└── .gitignore

🗃️ Database Layer

Core Entities

Domain           Main Tables

People           STUDENT, FACULTY, STAFF, TECHNICIAN
Campus           CAMPUS, BUILDING, FLOOR, ROOM
Labs & Systems   LAB, COMPUTER
Equipment        EQUIPMENT_CATEGORY, EQUIPMENT
Inventory        INVENTORY_ITEM, INVENTORY_TRANSACTION
Booking          BOOKING, BOOKING_RESOURCE
Events           EVENT, EVENT_REGISTRATION
Maintenance      MAINTENANCE_REQUEST, MAINTENANCE_ASSIGNMENT
Support          COMPLAINT, ISSUE_LOG
Allocation       RESOURCE_ALLOCATION

The database demonstrates:

Primary Keys

Foreign Keys

UNIQUE, NOT NULL and CHECK constraints

DEFAULT values

One-to-many relationships

Many-to-many relationships through junction tables

Referential integrity

Normalized relational design

🔎 Query Layer

Location:

MODULE/04_QUERIES/

Required concepts:

SELECT
WHERE
LIKE
IN
BETWEEN
IS NULL
ORDER BY
GROUP BY
HAVING
JOIN
Subqueries
Views

Queries should use the existing Smart Campus schema and demonstrate
practical use cases such as:

Search students by name

Filter faculty by department

Find available rooms

Count students by department

Find computers under maintenance

Find equipment assigned to a department

Identify low-stock inventory

Find upcoming bookings

Aggregate event registrations

⚙️ Advanced Database Features

Locations:

MODULE/06_PROCEDURES/
MODULE/07_FUNCTIONS/
MODULE/08_TRANSACTIONS/
MODULE/09_TESTING/

The project will demonstrate:

Stored Procedure

Function

Cursor

Handler / Error Handling

Transactions

Testing

Transactions should demonstrate:

START TRANSACTION;
SAVEPOINT;
COMMIT;
ROLLBACK;

Database note: This project uses MySQL/MariaDB syntax.
Oracle-specific PL/SQL syntax should not be introduced into the
implementation.

🎨 Frontend

The PHP frontend lives inside:

VIEW/php-frontend/

Application pages:

Dashboard
Students
Faculty
Buildings
Rooms
Labs
Computers
Equipment
Inventory
Bookings
Events
Maintenance
Complaints

The interface follows a shared design system with:

Clean sidebar navigation

Consistent cards

Search and filter controls

Responsive tables

Status badges

Empty states

Reusable CSS

Consistent spacing and typography

The target is a professional campus-management product UI, not a
generic CRUD interface.

👥 Team Workflow

Advait --- Integration / Control

Primary area:

CONTROL/

Responsibilities:

PHP ↔ MySQL integration

Controllers

Prepared statements

Request handling

Error-handling integration

Connecting frontend pages to database operations

Overall architecture

Final integration and GitHub coordination

Shreyash --- Database Queries

Primary area:

MODULE/04_QUERIES/

Responsibilities:

SELECT
WHERE
LIKE
IN
BETWEEN
ORDER BY
GROUP BY
HAVING
JOIN
Subqueries
Views

Create practical SQL queries against the existing schema.

Also test queries and report any schema/query issues before changing
shared database structures.

Nirbhay --- Advanced DB Features

Primary areas:

MODULE/06_PROCEDURES/
MODULE/07_FUNCTIONS/
MODULE/08_TRANSACTIONS/
MODULE/09_TESTING/

Responsibilities:

Stored Procedure
Function
Cursor
Handler / Error Handling
Transactions
Testing

All features must work with the existing MySQL database and schema.

Parth --- Frontend / View

Primary area:

VIEW/php-frontend/

Pages:

Dashboard
Students
Faculty
Buildings
Rooms
Labs
Computers
Equipment
Inventory
Bookings
Events
Maintenance
Complaints

Responsibilities:

PHP/HTML UI

Forms

Tables

Search/filter controls

Displaying controller results

Reusing the existing design system

Responsive UI

Avoiding duplicate database logic inside views

Frontend pages must not contain direct database queries.

🔀 Git Workflow

Shared repository:

BuiltByAdvait / smart-campus-resource-management

Before starting

git pull origin main

Create a feature branch

git checkout -b feature/your-module

Examples:

git checkout -b feature/shreyash-queries
git checkout -b feature/nirbhay-db-features
git checkout -b feature/parth-frontend

Commit

git add .
git commit -m "Add student query set"

Push

git push -u origin feature/your-module

Team rules

Do not directly modify another teammate's assigned module without
coordination.

Do not commit database passwords or local credentials.

Do not push .env files.

Pull before starting work.

Test before pushing.

Keep commits small and descriptive.

🧩 Development Rules

1. Database First

Use the existing schema.

Do not casually rename tables, columns or relationships.

2. No Duplicate Logic

SQL belongs in the appropriate database/query/controller layer.

The View should primarily:

receive → display

3. Reuse Components

Check these before creating new UI patterns:

VIEW/php-frontend/assets/css/
VIEW/php-frontend/includes/

4. Protect Shared Data

Do not run destructive operations on the shared database without
coordination:

DROP DATABASE
TRUNCATE TABLE
DELETE FROM ...

5. Test Before Push

Every teammate should verify their work locally before pushing.

🚀 Local Setup

Requirements

XAMPP

Apache

PHP

MySQL

phpMyAdmin

Git

VS Code

Database:

smart_campus_db

Start Apache through XAMPP and open:

http://localhost/smart-campus/

🧪 Testing Checklist

Before marking a module complete:

Page loads without PHP errors

Database connection works

Data is returned correctly

Search works

Filters work

Sorting works

Empty results are handled

SQL errors are handled appropriately

UI remains usable on smaller screens

No credentials are committed

Git changes are committed and pushed

📌 Current Progress

Module                     Status

Database                   ✅ Implemented
Schema                     ✅ Implemented
Master Data                ✅ Implemented
Dashboard                  ✅ Working
Students                   ✅ Working
Faculty                    ✅ Working
Query Module               🟡 In Progress
Procedures                 🟡 In Progress
Functions                  🟡 In Progress
Transactions               🟡 In Progress
Testing                    🟡 In Progress
Remaining Frontend Pages   🟡 In Progress

🎯 Project Goal

Smart Campus is more than a collection of CRUD pages.

The objective is to demonstrate how a properly designed relational
database can power a complete campus resource-management application:

DATA
 ↓
RELATIONAL MODEL
 ↓
SQL
 ↓
DATABASE FEATURES
 ↓
PHP CONTROL
 ↓
USER INTERFACE

One database.
Multiple modules.
One consistent system.

<p align="center">

Built with PHP · MySQL · XAMPP · HTML · CSS · SQL

</p>

<p align="center">

<strong>{=html}SMART CAMPUS RESOURCE MANAGEMENT
SYSTEM</strong>{=html}

</p>
