# E-Commerce Platform for Vegetables

This is an e-commerce platform for selling vegetables, built using the Laravel framework.

## Features

- User Authentication (Admin and Customer roles)
- Product Management (CRUD operations for products)
- Category Management
- Order Management
- User Management (Admin can manage users)
- Search and Filtering for Products and Users
- Role-based Access Control
- Image Upload for Products and Users

## Requirements

- PHP >= 7.4
- Composer
- MySQL
- Node.js and npm

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/tangchanhungit/Ecommerce-with-Laravel.git
   cd ecommerce-with-laravel
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Copy the .env.example file to .env and configure your environment variables:**
   ```bash
   cp .env.example .env
   ```

4. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run the database migrations and seed the database:**
   ```bash
   php artisan migrate --seed
   ```

6. **Serve the application:**
   ```bash
   php artisan serve
   ```

7. **Access the application:**
   Open your browser and navigate to `http://localhost:8000`.

## Database Schema

### Users Table
- `id`
- `first_name`
- `last_name`
- `email`
- `password`
- `status`
- `remember_token`
- `img`
- `created_at`
- `updated_at`

### Roles Table
- `id`
- `name`
- `created_at`
- `updated_at`

### Role_User Table
- `user_id`
- `role_id`

### Products Table
- `id`
- `product_name`
- `description`
- `price`
- `stock`
- `img`
- `created_at`
- `updated_at`

### Categories Table
- `id`
- `name`
- `created_at`
- `updated_at`

### Product_Category Table
- `product_id`
- `category_id`

### Orders Table
- `id`
- `user_id`
- `total_price`
- `status`
- `created_at`
- `updated_at`

### Orders Detail
- `id`
- `product_name`
- `quantity`
- `unit_price`
- `total_price`
- `created_at`
- `updated_at`
- `order_id`
- `product_id`

## Usage

### User Authentication

- Register a new user as a customer.
- Admin can log in and manage users and products.
- Customers can browse products, add them to the cart, and place orders.

### Admin Features

- Manage users (list, add, update, delete)
- Manage products (list, add, update, delete)
- View and manage orders
- Assign roles to users

### Customer Features

- Browse products
- Search and filter products
- Add products to cart
- Place orders
- View order history

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is licensed under the MIT License.

---

Feel free to modify this README file to better fit your project's specifics.
