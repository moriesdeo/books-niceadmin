<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This project is a Laravel-based web application designed for managing books and users. It provides a comprehensive solution for book inventory management, user authentication, and role-based access control. The application is built with modern web development practices and integrates seamlessly with front-end tools.

## Features

- User authentication and role-based access control.
- CRUD operations for books and users.
- Responsive UI built with modern front-end frameworks.
- Integration with Vite for asset bundling and live reloading.
- Database migrations and seeders for easy setup.
- RESTful API endpoints for external integrations.

## Getting Started

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js and npm

### Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd books-niceadmin
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
4. Install JavaScript dependencies:
   ```bash
   npm install
   ```
5. Set up the environment file:
   ```bash
   cp .env.example .env
   ```
6. Generate the application key:
   ```bash
   php artisan key:generate
   ```
7. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

### Running the Application

Start the development server:
```bash
php artisan serve
```

Compile front-end assets:
```bash
npm run dev
```

Access the application at [http://localhost:8000](http://localhost:8000).

## API Documentation

The application provides RESTful API endpoints for managing books and users. Detailed API documentation can be found in the `docs/api` directory or accessed via the `/api/docs` route when the application is running.

## Contributing

Contributions are welcome! Please follow the [contribution guidelines](CONTRIBUTING.md) for submitting pull requests.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
