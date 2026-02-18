# QR-Enabled Vehicle Management System (POC)

## 1. What This Project Does

This is a proof-of-concept web application designed to manage small public-transport vehicles that do not have traditional identification numbers (e.g., license plates).

### Key Features

- Generates and assigns unique QR codes to vehicles  
- Manages owner–driver assignments  
- Tracks vehicle status (active, unassigned, unauthorized)  
- Enables verification via QR scanning  

The goal of this project was to demonstrate how undocumented vehicles could still be structured and digitally tracked through a practical system.

## 2. Technologies Used

- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Blade Templates, Basic JavaScript
- **Architecture:** MVC pattern
- **Routing:** RESTful routing structure

## 3. How to Run the Project

### Requirements

Make sure the following are installed on your system:

- PHP >= 8.x  
- Composer  
- MySQL  
- Laravel CLI (optional but recommended)

---

### Setup Instructions

1. **Clone the repository**

```bash
git clone <your-repository-link>
cd project-folder
```
2. Install dependencies
   composer install
3. Create environment file
   cp .env.example .env
4. Generate application key
   php artisan key:generate
5. Configure database
Open the .env file and update the following fields with your MySQL credentials:

DB_DATABASE=your_database_name

DB_USERNAME=your_username

DB_PASSWORD=your_password
Make sure the database already exists in MySQL.

7. Run database migrations
   php artisan migrate
8. Start the development server
   php artisan serve

### Access the Application
Open your browser and go to:
http://127.0.0.1:8000
