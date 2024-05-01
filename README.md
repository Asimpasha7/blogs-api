Blog API
This is a RESTful API for a simple blogging platform built using Laravel. The API allows users to perform CRUD operations on blog posts and comments, and it includes authentication using JSON Web Tokens (JWT).


Installation
----------------------------------

1. Clone the repository: git clone https://github.com/your-username/blog-api.git
2. Install dependencies: composer install
3. Copy the .env.example file to .env and configure your environment variables, including the database connection details and JWT secret key
4. Generate an application key: Generate an application key:
5. Migrate the database: php artisan migrate
6. Generate a JWT secret key: php artisan jwt:secret
7. Serve the application: php artisan serve


Usage
-----------------------------------
1. Register a new user: Send a POST request to /api/register with the user's name, email, and password.
2. Log in: Send a POST request to /api/login with the user's email and password to obtain a JWT token.
3. Use the JWT token to access protected routes:
   Include the JWT token in the Authorization header of your requests with the value Bearer {token}.
4. Perform CRUD operations on blog posts and comments:
   Use the provided API endpoints to create, read, update, and delete blog posts and comments.

   API Documentation
   ---------------------------------
   The API documentation can be found in the blogs-api docs directory of this repository.

