# 🚀 Module 11: Advanced OOP & PSR Standards  
## Take Your PHP OOP to the Next Level – Like Laravel Does

Let’s dive into more advanced OOP features and modern PHP standards that power frameworks like Laravel.

---

### 🧠 Topics Covered in Module 11  
- Namespaces – Organize Your Code  
- PSR-4 Autoloading – No More `require_once`  
- Late Static Binding (`static::`) – Dynamic inheritance  
- Abstract vs Interface – When to Use Each  
- Magic Methods Deep Dive – `__call`, `__invoke`, etc.  
- Design Patterns Used in Laravel  
  - Factory Pattern  
  - Strategy Pattern  
  - Repository Pattern  
- Using OOP with Forms & Sessions  
- Type Hints & Return Types (PHP 7+)  
- Anonymous Classes & Closures  
- Working with Attributes (PHP 8+)  

---

### 💡 Pro Tips Before We Dive In  
- Use **namespaces** to avoid class name conflicts (like `App\User` vs `Admin\User`)  
- Always follow **PSR-4 standard** – Laravel does this too  
- Use **late static binding** (`static::`) when overriding parent logic  
- Understand which pattern solves what problem:
  - **Factory** → Create different types of objects  
  - **Strategy** → Choose behavior at runtime  
  - **Repository** → Decouple data source from business logic  
- Use **magic methods** sparingly – they can hide bugs if overused  

---

## 📦 1. Namespaces – Organizing Large Apps

Used to group related classes logically.

```php
// App/Models/User.php
namespace App\Models;

class User {
    // ...
}
```

In another file:
```php
use App\Models\User;

$user = new User();
```

✅ Laravel uses this structure heavily.

---

## 🔁 2. PSR-4 Autoloading – Composer Magic

Create a `composer.json`:

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

Now you can use classes without `require()` or `include()`

---

## 🧬 3. Late Static Binding – `static::` vs `self::`

```php
class Animal {
    public static function makeSound() {
        echo self::class . "\n";
    }

    public static function betterSound() {
        echo static::class . "\n";
    }
}

class Dog extends Animal {}

Animal::makeSound();     // Animal  
Animal::betterSound();   // Animal  
Dog::makeSound();        // Animal ❌  
Dog::betterSound();      // Dog ✅  
```

Use `static::` when you want child class's implementation.

Laravel uses this in Eloquent models and factories.

---

## 🧱 4. Abstract vs Interface – Recap

| Feature             | Abstract Class         | Interface               |
|---------------------|------------------------|-------------------------|
| Shared logic        | ✅ Yes                 | ❌ No                   |
| Multiple inheritance| ❌ No                  | ✅ Yes (via `implements`) |
| Method body         | ✅ Some                | ❌ No (until PHP 8.1)   |
| Property            | ✅ Yes                 | ❌ No                   |

🔹 **Use abstract** when you have shared behavior  
🔹 **Use interface** when defining contracts

---

## 🧪 5. Magic Methods Deep Dive

You already know:
- `__construct()`  
- `__destruct()`  
- `__toString()`  
- `__get()` / `__set()`  

Now let’s go deeper with:

- `__call()` – Handle undefined methods  
- `__invoke()` – Make object callable  
- `__callStatic()` – Same but for static calls  

**Example:**
```php
class Math {
    public function __call($name, $args) {
        if ($name === 'add') {
            return array_sum($args);
        }
    }

    public function __invoke() {
        echo "Callable as function\n";
    }
}

$math = new Math();
echo $math->add(1, 2, 3); // 6  
$math(); // Callable as function
```

This is used in Laravel for dynamic query builders and macros.

---

## 🛠 6. Factory Pattern – Create Objects Dynamically

```php
class ModelFactory {
    public static function create(string $type): object {
        $className = "App\\Models\\" . ucfirst($type);
        return new $className();
    }
}

$user = ModelFactory::create('user');
$post = ModelFactory::create('post');
```

Used in Laravel for model factories and service providers.

---

## 🧩 7. Strategy Pattern – Choose Behavior at Runtime

```php
interface PaymentMethod {
    public function pay(float $amount): void;
}

class CreditCard implements PaymentMethod { /* ... */ }
class PayPal implements PaymentMethod { /* ... */ }

class Checkout {
    public function process(PaymentMethod $method) {
        $method->pay(100);
    }
}
```

Perfect for Laravel services that support multiple drivers.

---

## 🗂 8. Repository Pattern – Decouple Data Logic

```php
interface UserRepositoryInterface {
    public function find(int $id): ?User;
    public function all(): array;
}

class DatabaseUserRepository implements UserRepositoryInterface { /* ... */ }
class FileUserRepository implements UserRepositoryInterface { /* ... */ }

function listUsers(UserRepositoryInterface $repo) {
    foreach ($repo->all() as $user) {
        echo "$user\n";
    }
}
```

Used in Laravel to separate data layer from controllers.

---

## 🎯 9. Type Hints & Return Types (PHP 7+)

```php
public function getUser(): User {
    return new User();
}
```

Use type hints to prevent errors and improve IDE support.

✅ Laravel uses strict typing everywhere.

---

## 🧬 10. Anonymous Classes & Closures

Like JavaScript functions, but in OOP style.

```php
$logger = new class {
    public function log($message) {
        echo "[LOG] $message\n";
    }
};

$logger->log("Test");
```

Used in Laravel for on-the-fly mocks and test doubles.

---

## 🏷️ 11. Attributes / Annotations (PHP 8+)

Replace docblocks with cleaner syntax.

```php
#[Route('/login')]
class LoginController { /* ... */ }

#[Method('POST')]
function postLogin() { /* ... */ }
```

Laravel uses attributes for routing and validation.