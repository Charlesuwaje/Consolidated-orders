<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<!--
## Consolidated Orders Import & Refresh Command

Overview

This module handles the import, management, and refreshing of consolidated orders. It supports bulk data import via Excel and includes an artisan command (orders:refresh) to refresh order data efficiently.

Features Implemented

Excel Import: Import bulk orders using an Excel file.

Data Validation: Ensures required fields are present and formatted correctly.

Error Handling: Prevents database inconsistencies and missing data issues.

Performance Optimizations: Improves analytics reporting for large datasets.

Order Refresh Command: Reprocesses and updates consolidated order data.

Installation & Setup

Ensure dependencies are installed:

composer install
php artisan migrate
Run your seeder.
Importing Orders

To import orders, upload an Excel file containing the following required fields:

order_id

customer_id

customer_name

customer_email

product_id

product_name

sku

quantity

item_price

line_total

order_date

order_status

order_total

The import process is handled by ConsolidatedOrdersImport.php and ensures data integrity.

Running the Orders Refresh Command

To refresh consolidated orders, run:

php artisan orders:refresh

This command:

Updates existing order records.

Fixes any data inconsistencies.

Ensures analytics reports remain accurate.

Error Handling

Undefined Array Keys: Ensures missing fields are handled gracefully.

Invalid Date Formats: Converts or rejects improperly formatted dates.

Database Constraints: Ensures required fields are not null before inserting records.

Future Improvements

Implement queue-based processing for large data imports.

Enhance logging and monitoring for import failures.

Improve data normalization for better analytics performance.🚀

 -->

# Consolidated Orders Module

## Overview

The **Consolidated Orders Module** enables efficient order management, importation, and analytics. This module supports **bulk data import via Excel**, **data validation**, and an **automated order refresh process** using an Artisan command. It ensures accurate and up-to-date order information for analytics and reporting.

## Features

-   **Excel Order Import**: Allows bulk import of orders using an Excel file.
-   **Data Validation**: Ensures required fields are formatted correctly and not missing.
-   **Error Handling**: Prevents database inconsistencies and missing data issues.
-   **Performance Optimization**: Enhances analytics reporting for large datasets.
-   **Order Refresh Command**: Updates consolidated order records to maintain accurate reports.
-   **API Support**: Endpoints available for fetching consolidated orders.
-   **Automated Weekly Refresh**: The consolidated order data is refreshed every Sunday at midnight.

## Installation & Setup

### **Prerequisites**

Ensure your environment has the following installed:

-   PHP 8.x
-   Composer
-   Laravel 10.x
-   MySQL or PostgreSQL Database
-   [Laravel Excel](https://laravel-excel.com/) package for Excel imports

### **Setup Instructions**

1. Install dependencies:
    ```sh
    composer install
    ```
2. Configure environment variables:
    ```sh
    cp .env.example .env
    ```
3. Set up the database:
    ```sh
    php artisan migrate --seed
    ```
4. Start the application:

    ```sh
    php artisan serve
    ```

    5. Refresh application DB:

    ```sh
    php artisan orders:refresh
    ```

## Running the Orders Refresh Command

To refresh consolidated orders manually, run:

```sh
php artisan orders:refresh
```

This command:

-   Updates existing order records.
-   Fixes any data inconsistencies.
-   Ensures analytics reports remain accurate.

The refresh command also runs **automatically every Sunday at midnight** via the Laravel Scheduler:

```php
$schedule->command('orders:refresh')->weeklyOn(0, '00:00');
```

## API Endpoints & Postman Documentation

### **Base URL:**

```
http://127.0.0.1:8000/api
```

### **Postman Documentation**

For detailed API testing and documentation, import the following Postman collection:
[Postman Collection Link](https://www.postman.com/your-collection-url)

## Future Improvements

-   Implement **queue-based** processing for large data imports.
-   Enhance **logging and monitoring** for import failures.
-   Improve **data normalization** for better analytics performance.
