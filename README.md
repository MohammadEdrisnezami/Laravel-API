# Laravel API Project
![Description](public/img/demo.png)

## Introduction
This is a Laravel-based API project developed to provide a robust backend for various applications. The project follows best practices in API development and integrates authentication, validation, and error handling mechanisms.

## Features
- RESTful API structure
- Authentication using Laravel Sanctum
- CRUD operations for different resources
- Request validation and error handling
- Middleware for security
- API documentation using Laravel Swagger (if applicable)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/MohammadEdrisnezami/Laravel-API.git
   cd Laravel-API
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy the environment file and configure it:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Configure the database in the `.env` file and run migrations:
   ```bash
   php artisan migrate --seed
   ```

6. Start the development server:
   ```bash
   php artisan serve
   ```

## API Endpoints

### Authentication
- `POST /api/register` - Register a new user
- `POST /api/login` - Authenticate user and receive a token
- `POST /api/logout` - Logout user and revoke token

### Example Resource
- `GET /api/resources` - Fetch all resources
- `POST /api/resources` - Create a new resource
- `GET /api/resources/{id}` - Get a specific resource
- `PUT /api/resources/{id}` - Update a resource
- `DELETE /api/resources/{id}` - Delete a resource

## Technologies Used
- Laravel
- Laravel Sanctum (for authentication)
- MySQL/PostgreSQL (Database)
- Composer (Dependency Manager)
- Laravel Swagger (for API documentation, if used)

## Contribution
Feel free to fork this repository and submit pull requests for improvements. Make sure to follow Laravel's coding standards and best practices.

## License
This project is licensed under the MIT License.

## Author
**Mohammad Edris Nezami**
[GitHub Profile](https://github.com/MohammadEdrisnezami)
