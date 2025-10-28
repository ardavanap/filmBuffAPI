# 🎥 FilmBuff API

A RESTful movie management API built with **Laravel** and **Sanctum
Authentication**.\
FilmBuffAPI is basically a IDMB-like api that is written for practicing api.

------------------------------------------------------------------------

## ✨ Features
- 🎬 **Movie Management**: Add, update, and delete movies with ease.
- 📝 **Comments**: Allow users to leave comments on movies.
- ⭐ **Ratings**: Enable users to rate movies and view average ratings.
- 🌟 **Favorites**: Let users save their favorite movies.
- 🔒 **Authentication**: Secure user authentication and authorization.
- 📊 **Search and Filter**: Search and filter movies by title, description, category, and release year.

------------------------------------------------------------------------

## 🛠️ Tech Stack
- **Programming Language**: PHP
- **Framework**: Laravel
- **Database**: MySQL
- **Authentication**: Laravel Sanctum

------------------------------------------------------------------------

## 🔐 Authentication

The API uses **Bearer Token Authentication** via Laravel Sanctum.\
After registration or login, include the received token in your
requests:

    Authorization: Bearer YOUR_TOKEN

------------------------------------------------------------------------

## 📁 Endpoints Overview

  --------------------------------------------------------------------------------
  Module          Method          Endpoint                 Description
  --------------- --------------- ------------------------ -----------------------
  **Auth**        POST            `/auth/register`         Register a new user

  **Auth**        POST            `/auth/login`            Log in and receive
                                                           token

  **Auth**        POST            `/auth/logout`           Log out the current
                                                           user

  **Movies**      GET             `/movie`                 Get all movies with
                                                           filters

  **Movies**      GET             `/movie/{id}`            Get movie details

  **Movies**      POST            `/movie`                 Create a new movie

  **Movies**      PATCH           `/movie/{id}`            Update a movie

  **Movies**      DELETE          `/movie/{id}`            Delete a movie

  **Comments**    GET             `/movie/{id}/comment`    Get comments for a
                                                           movie

  **Comments**    POST            `/movie/{id}/comment`    Add a comment to a
                                                           movie

  **Rating**      GET             `/movie/{id}/rating`     Get movie's average
                                                           rating

  **Rating**      POST            `/movie/{id}/rate`       Rate a movie

  **Favorites**   GET             `/user/favorites`        Show user's favorite
                                                           movies

  **Favorites**   POST            `/movie/{id}/favorite`   Mark movie as favorite
  
  --------------------------------------------------------------------------------

### Endpoints Usage

For a detailed usage of this endpoint and examples of responses, [click here](endpoint-usage-tutorial.md)


## 📦 Installation

### Prerequisites
- PHP 8.2 or later
- Composer

### 🧩 Setup

``` bash
git clone https://github.com/yourusername/filmBuffAPI.git
cd filmBuffAPI
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Now you can test endpoints via Postman at:

    http://127.0.0.1:8000/api

------------------------------------------------------------------------


## 📁 Project Structure
```
filmBuffAPI/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── CommentController.php
│   │   │   ├── FavoriteController.php
│   │   │   ├── MovieController.php
│   │   │   ├── RatingController.php
│   │   ├── Requests/
│   │   │   ├── MovieRequest.php
│   │   ├── Resources/
│   │   │   ├── MovieResource.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Comment.php
│   │   ├── Favorite.php
│   │   ├── Movie.php
│   │   ├── Rating.php
│   │   ├── User.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
├── bootstrap/
│   ├── app.php
│   ├── providers.php
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── sanctum.php
│   ├── services.php
│   ├── session.php
├── database/
│   ├── factories/
│   │   ├── CategoryFactory.php
│   │   ├── CommentFactory.php
│   │   ├── FavoriteFactory.php
│   │   ├── MovieFactory.php
│   │   ├── RatingFactory.php
│   │   ├── UserFactory.php
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2025_10_12_181310_create_personal_access_tokens_table.php
│   │   ├── 2025_10_19_132653_create_categories_table.php
├── public/
│   ├── index.php
├── resources/
│   ├── css/
│   │   ├── app.css
│   ├── js/
│   │   ├── app.js
├── routes/
│   ├── api.php
│   ├── console.php
│   ├── web.php
├── storage/
│   ├── app/
│   ├── framework/
│   ├── logs/
├── tests/
│   ├── Feature/
│   ├── Unit/
├── vendor/
├── .env
├── .env.example
├── .gitignore
├── composer.json
├── package.json
├── README.md
├── vite.config.js
└── docker-compose.yml
```

## 🔧 Configuration
- **Environment Variables**: Configure the application by modifying the `.env` file.
- **Configuration Files**: Customize the application by modifying the configuration files in the `config` directory.

## 🗺️ Roadmap

- **Future Improvements**: Add more Requests and Resources.


------------------------------------------------------------------------

© 2025 FilmBuff API --- Built with ❤️ using Laravel.
