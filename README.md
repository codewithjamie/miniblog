<p align="center">Simple Blog Application</p>
<p align="center">A simple blog application built with Laravel, featuring user authentication, post creation and management, commenting, and more.</p>

<p align="center">
<a href="https://github.com/your-username/simple-blog-app/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This is a simple blog application built with Laravel, offering features such as user authentication, post management, commenting, and more.

## Setup Instructions

### Installation
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/simple-blog-app.git
   cd simple-blog-app
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   php artisan serve
   ```

3. **Set up environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - Update `.env` with your database credentials.

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the database**
   ```bash
   php artisan db:seed
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

### Usage

#### User Authentication
- **Register:** Navigate to `/register` to create a new account.
- **Login:** Navigate to `/login` to log into your account.

### Running Tests
- **Unit Tests:** Run the following command to execute unit tests.
  ```bash
  - **To run Test for creating posts** php artisan test --filter PostsTest
  - **To run Test for commenting on posts** php artisan test --filter CommentsTest
  ```

### API Endpoints (Bonus)
- **List Posts:** `GET /api/posts`
- **Specific Post:** `GET /api/posts/id`
- **Create Post:** `POST /api/posts`
- **Comment on Post:** `POST /api/posts/{id}/comments`

## Database Setup
- Migration files included for setting up necessary tables.
- Seeders provided to populate the database with sample data.
