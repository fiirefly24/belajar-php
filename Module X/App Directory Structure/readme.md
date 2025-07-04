# 🧱 Common PHP App Directory Structure (Before Laravel)

Here’s a real-world structure used in many modern PHP apps (before Laravel):

```
project-root/
├── public/              # Web-accessible files
│   └── index.php        # Single entry point
│   └── assets/          # CSS, JS, images
├── src/                 # Application code
│   ├── Models/           # User.php, Post.php
│   ├── Controllers/      # UserController.php, PostController.php
│   ├── Services/         # Logic that isn't in controller
│   ├── Repositories/     # Data abstraction layer
│   ├── Middleware/       # Authentication, logging
│   └── Helpers/          # Utility functions
├── config/               # App settings
├── views/                # HTML templates
├── routes/               # Where routing happens
├── vendor/               # Composer packages
├── tests/                # PHPUnit tests
└── composer.json         # Autoload + dependencies
```

This is very close to Laravel’s folder structure — and helps you scale cleanly.

---

## 📁 Breakdown of Key Folders

| Folder        | Purpose                                | Laravel Equivalent |
|---------------|----------------------------------------|--------------------|
| `public/`     | Entry point (like `index.php`)          | `public/index.php` |
| `src/`        | Your core app logic                    | `app/`             |
| `Models/`     | Hold database logic                    | `app/Models`       |
| `Controllers/`| Handle HTTP requests                   | `app/Http/Controllers` |
| `Services/`   | Business logic                         | `app/Services` (custom) |
| `Repositories/` | Data abstraction                     | `app/Repositories` (custom) |
| `Middleware/` | Request filtering                      | `app/Http/Middleware` |
| `views/`      | HTML templates                         | `resources/views`   |
| `config/`     | Settings                               | `config/`           |
| `vendor/`     | Composer packages                      | `vendor/`           |
| `routes/`     | Routing logic                          | `routes/web.php`    |

---

## 🧩 Real Example – How to Organize Your Module 11 Code

Let’s say you're building a User system with login and dashboard.

### 📁 Folder Structure:

```
user-app/
├── public/
│   └── index.php
├── src/
│   ├── Models/
│   │   └── User.php
│   ├── Controllers/
│   │   └── UserController.php
│   └── Interfaces/
│       └── UserRepositoryInterface.php
├── config/
│   └── app.php
├── views/
│   └── dashboard.php
└── composer.json
```

Now you can:
- Keep all logic in `src/`  
- Use `public/index.php` as entry point  
- Load everything via Composer autoloading  

---

## 🚀 Laravel’s Structure – You’re Already Close

Laravel uses a similar structure — just more standardized:

```
laravel-app/
├── app/
│   ├── Models/
│   ├── Http/
│   │   └── Controllers/
│   ├── Services/
│   └── Providers/
├── config/
├── resources/
│   └── views/
├── routes/
├── public/
├── database/
├── tests/
└── vendor/
```

So when you move to Laravel:
- You already know where to find things  
- You understand why it’s structured that way  
- You’re not confused by `App\Models\User` vs `App\Http\Controllers\UserController`  

---

## 🧠 Why This Structure Matters

✅ **Separation of Concerns:**

| Layer         | Responsibility                       |
|---------------|--------------------------------------|
| Models        | Data                                 |
| Controllers   | Requests                             |
| Views         | Templates                            |
| Services      | Business logic                       |
| Repositories  | Data abstraction                     |

This makes your code easier to:
- Read  
- Test  
- Maintain  
- Scale  

---

## 🔧 How to Use This Structure in Your PHP App

### 1. Use `public/index.php` as the Only Entry Point

```php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\UserController;

$controller = new UserController();
$controller->show();
```

This ensures all traffic goes through one file — Laravel does this too.

---

### 2. Define Routes Dynamically (Optional)

Create a simple routing system:

```php
$request = $_SERVER['REQUEST_URI'];

if ($request === '/users') {
    $controller = new UserController();
    echo $controller->index();
} elseif ($request === '/login') {
    $controller = new AuthController();
    echo $controller->login();
}
```

Later, you’ll learn how Laravel uses `routes/web.php` for this.

---

## 🧪 Example: Your Module 11 Code – Now in Real App Structure

🔹 **`src/Models/User.php`**
```php
<?php

namespace App\Models;

class User {
    public function greet() {
        return "Hello from User class";
    }
}
```

---

🔹 **`src/Controllers/UserController.php`**
```php
<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    public function index() {
        $user = new User();
        return $user->greet();
    }
}
```

---

🔹 **`public/index.php`**
```php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\UserController;

$controller = new UserController();
echo $controller->index();
```

✅ Now your code is organized, reusable, and ready to scale.

---

## 🛠 How to Make It Work – PSR-4 Autoloading

Add this to `composer.json`:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

Then run:
```bash
composer dump-autoload
```

Now:
- `App\Models\User` → `src/Models/User.php`  
- `App\Controllers\UserController` → `src/Controllers/UserController.php`  

No more `require_once()` everywhere!

---

## 🧩 Bonus: How Laravel Uses This

Laravel uses this same idea — but adds:

- Artisan commands  
- Eloquent ORM  
- Blade templates  
- Built-in routing  
- Middleware and policies  

But the core structure is the same:
- `app/Http/Controllers` → controllers  
- `app/Models` → models  
- `routes/web.php` → routing  

So when you move to Laravel, you’ll already know where things go.

Let me know if you'd like this saved as a downloadable `.md` file or added to your collection! 💪