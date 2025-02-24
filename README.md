# ByeAccount Backend

Welcome to the **ByeAccount** backend! This project, built with **Laravel**, provides secure and scalable APIs to manage account deletion guides and user interactions.

## 🚀 Features

- 🔐 Secure API endpoints for managing account deletion guides.
- 📊 Scalable architecture for handling user interactions.
- ⚡ Optimized performance with Laravel's robust framework.
- 🛠️ Authentication and authorization using Laravel Sanctum.

## 🛠️ Technologies Used

- **Laravel** - PHP framework for backend development.
- **Laravel Fortify** - User management.
- **Laravel Sanctum** - Authentication and API token management.
- **Spatie Laravel-Permission** - Role-based access control.
- **Pest** - Testing framework.
- **SQLite** - Database management system.

## 📦 Installation and Setup

1. **Clone the project**:
   ```bash
   git clone https://github.com/ByeAccount/ByeAccount-Backend
   cd byeaccount-backend
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Create and configure the `.env` file**:
   ```bash
   cp .env.example .env
   ```
   Update database and API configurations in `.env`.

4. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

5. **Run database migrations**:
   ```bash
   php artisan migrate --seed
   ```

6. **Start the application**:
   ```bash
   php artisan serve
   ```

The backend will be accessible at `http://localhost:[port]/` (watch the terminal).

## 🔧 Configuration

Set up the necessary environment variables in your `.env` file.

## 📄 License

This project is licensed under the GPL-3.0 License. See the `LICENSE` file for more details.

---

If you have any questions or suggestions, feel free to open an issue! 😊

