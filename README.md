## SImple-inventories-app TASK
A simple app for products information entry and manipulation 
## Features

- User Registration: Users can create an account by providing their name, email, and password.
- User Authentication: Users can log in using their email and password to obtain an access token.
- Product Management:
 - Create new products
 - Update existing products
 - View product details
 - Delete products

## API Endpoints

- `POST /register`: Register a new user
- `POST /login`: Authenticate and obtain an access token

Protected routes (require authentication):

- `GET /v1/products`: Retrieve a list of all products
- `POST /v1/products`: Create a new product
- `GET /v1/products/{id}`: Show details of a specific product
- `PUT /v1/products/{id}`: Update an existing product
- `DELETE /v1/products/{id}`: Delete a product

## Technologies Used

- Laravel Framework
- Laravel Sanctum (Authentication)
- MySQL (Database)

## Getting Started

Follow the installation instructions in the project's documentation to set up the application locally. Don't forget to configure the database connection and run the necessary migrations and seeders.
using `php artisan db:seed`
