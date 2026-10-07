# Student Records Application

A simple CRUD (Create, Read, Update, Delete) web application built to manage student information. This project was developed as part of the ITPC 115 – System Integration and Architecture 2 guided laboratory activity. It handles core student data including student number, first name, last name, and course.

## Prerequisites

Before running this project, ensure you have the following tools installed:
*   **PHP** (compatible with the current Laravel version)
*   **Composer** (PHP dependency manager)
*   **Node.js and npm**
*   **Git**
*   **XAMPP** (or a similar local server providing MySQL/MariaDB)

## Installation & Database Setup

1. **Clone the repository:**
   git clone [https://github.com/itzmrjade/itpc115-student-records.git](https://github.com/itzmrjade/itpc115-student-records.git)
   cd itpc115-student-records

2. **Install dependencies:**
    composer install
    npm install

3. **Configure the environment:**
Because `.env` files are not tracked in GitHub, duplicate the `.env.example` file, rename the copy to `.env`, and update the database section to match your local XAMPP configuration:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=student_records
    DB_USERNAME=root
    DB_PASSWORD=

4. **Generate the application key:**

    php artisan key:generate

5. **Set up the database:**
Start the MySQL module in XAMPP, open phpMyAdmin, and manually create an empty database named `student_records`.

6. **Run migrations:**
Run the following command to generate the `students` table in your database:

    php artisan migrate


## How to Run the Application

Once everything is installed and the database is migrated, start the local development server:

    php artisan serve


Open your web browser and navigate to `http://127.0.0.1:8000` to view and interact with the application.
