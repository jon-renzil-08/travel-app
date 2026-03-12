# Travel Booking Application

Aplikasi **Travel Booking System** berbasis Laravel yang memungkinkan passenger untuk melihat jadwal travel, melakukan booking tiket, serta admin dapat mengelola jadwal travel dan melihat laporan passenger.

---

# Requirements

Pastikan perangkat Anda memiliki software berikut:

* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL / MariaDB
* Git

---

# Installation

### 1. Clone Repository

```bash
git clone https://github.com/username/travel-booking-app.git
cd travel-booking-app
```

---

### 2. Install Dependency Backend

```bash
composer install
```

---

### 3. Install Dependency Frontend

Karena aplikasi menggunakan **Laravel Breeze + Tailwind CSS**, jalankan:

```bash
npm install
```

---

### 4. Copy Environment File

```bash
cp .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

# Database Setup

Konfigurasi database pada file `.env`

```
DB_DATABASE=travel_app
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian jalankan migration:

```bash
php artisan migrate
```

Jika terdapat seeder:

```bash
php artisan db:seed
```

---

# Running the Application

Jalankan server Laravel:

```bash
php artisan serve
```

Compile frontend assets:

```bash
npm run dev
```

Aplikasi dapat diakses melalui:

```
http://127.0.0.1:8000
```

---

# Authentication

Aplikasi menggunakan **Laravel Breeze** untuk sistem autentikasi yang menyediakan:

* Login
* Register
* Logout
* Middleware Authentication

---

# Application Features

### Admin

* Manage Travel Schedule (Create, Read, Update, Delete)
* View Passenger Booking History
* View Travel Report

### Passenger

* View Available Travel
* Book Travel Tickets
* View Booking History
* Payment Status

---

# Technologies Used

* Laravel
* Laravel Breeze
* Tailwind CSS
* MySQL
* Blade Template
* Vite

---

# Author

Johni Revormasi Ziliwu
Web Developer
