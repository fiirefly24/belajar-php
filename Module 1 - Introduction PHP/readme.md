# 📘 Module 1: Introduction to PHP  
## A Beginner-Friendly Guide to Setting Up & Understanding PHP  

### 🎯 Goal  
Understand what PHP is, how to set up your development environment, and the basic syntax needed to start writing PHP scripts.  

### 🧠 Key Concepts  

#### 1. What is PHP?  
- Server-side scripting language used for web development.
- Originally stood for Personal Home Page, now stands for PHP: Hypertext Preprocessor (recursive acronym).
- Interpreted by the server before being sent to the browser as HTML.
- Used in popular platforms like WordPress, Laravel, Drupal.

#### 2. Setting Up Your Environment  
To write and run PHP code, you need:  
- **Web Server**: Apache or Nginx  
- **PHP Interpreter**  
- **Database** (optional): MySQL, MariaDB  
- **Code Editor**: VS Code, PhpStorm, Sublime  

✅ Recommended Tools:  
- **XAMPP**: All-in-one package with Apache, PHP, MySQL, phpMyAdmin  
- **Docker**: Containerized environment (e.g., `php:8.4-apache`)  
- **VS Code**: Lightweight editor with PHP extensions  
- **PHP CLI**: Run PHP scripts from terminal  

💡 Tip:  
- Use `php -v` to check installed version.  
- Use `php -S localhost:8000` to run built-in dev server.  

#### 3. Your First PHP Script  
```php
<?php
echo "Hello, world!";
?>
```

Or to see full PHP configuration:  
```php
<?php
phpinfo();
?>
```

Save this in a file like `index.php`, place it in your server directory (`htdocs` for XAMPP), then open in browser.

#### 4. Basic Syntax Rules  
- Start with `<?php` and end with `?>`  
- Each statement ends with a semicolon `;`  
- Case-sensitive for variables (`$name ≠ $Name`)  
- Not case-sensitive for keywords/functions (`ECHO`, `Echo`, `echo` are same)  

#### 5. Comments, Variables, Constants  
##### 🔤 Comments  
```php
// Single-line comment
# Another single-line comment
/*
   Multi-line
   comment block
*/
```

##### 📦 Variables  
Start with `$`, no need to declare type.  
```php
$name = "Ammad";
$age = 27;
```

##### 🔐 Constants  
Defined using `define()` or `const`.  
```php
define("APP_NAME", "PHP Mastery Course");
const VERSION = "1.0";
```

#### 6. Data Types  
PHP supports several data types:  
- `string`: `"hello"`  
- `integer`: `123`  
- `float`: `123.45`  
- `boolean`: `true / false`  
- `array`: `[1, 2, 3]`  
- `object`: `new stdClass()`  

💡 PHP is dynamically typed — variable type changes based on value.  

#### 7. Type Juggling & Casting  
##### 🔁 Type Juggling  
Automatic conversion based on context:  
```php
$a = "10" + 5; // $a becomes integer 15
```

##### ⚙ Type Casting  
Force a specific type:  
```php
$numStr = "123";
$numInt = (int)$numStr; // 123
$numFloat = (float)$numInt; // 123.0
```

Other casts: `(bool)`, `(string)`, `(array)`, `(object)`  

#### 8. Operators Overview  
| Operator Type       | Examples                        |
|---------------------|---------------------------------|
| ➕ Arithmetic        | `+ - * / % **`                  |
| ⚖ Comparison        | `== === != !== < > <= >=`       |
| ∧∨ Logical          | `&& || ! xor`                   |
| ↔ Assignment        | `= += -= *= /= .=`              |
| 🔁 Increment/Decrement | `++$a $a++ --$a $a--`      |
| 📣 String Operators | `. .=`                          |
| ❓ Ternary Operator | `$result = condition ? true : false;` |
| ?? Null Coalescing | `$value = $_GET['page'] ?? 'home';` |
| <=> Spaceship       | `echo 5 <=> 3; // 1`            |

#### 9. PHP Tags  
| Tag                | Description                     | Safe? |
|--------------------|----------------------------------|-------|
| `<?php ... ?>`     | Standard, always safe           | ✅ Yes |
| `<?= ... ?>`       | Short echo tag                  | ✅ Safe if enabled |
| `<? ... ?>`        | Deprecated short open tag       | ❌ Avoid |

⚠️ Always use `<?php` for maximum compatibility.

#### 10. PHP 7.x vs PHP 8.x  
| Feature             | PHP 7.x | PHP 8.x |
|---------------------|---------|---------|
| Union Types         | ❌      | ✅ `function foo(int|string $input)` |
| Constructor Promotion | ❌    | ✅ `public function __construct(public $name)` |
| Match Expression    | ❌      | ✅ Cleaner than switch |
| Attributes          | ❌      | ✅ Replaces docblock annotations |
| JIT Compilation     | ❌      | ✅ Performance boost (CLI only) |

#### 11. PHP with Apache vs Nginx  
| Feature             | Apache                         | Nginx                          |
|---------------------|--------------------------------|--------------------------------|
| Handling            | Multi-threaded                 | Event-driven                   |
| Performance         | Good for small sites           | Better for high traffic        |
| Configuration       | `.htaccess` files              | Central config file            |
| Rewrites            | `.htaccess`                    | In server block                |

🛠 For development: Use **Apache** (XAMPP).  
For production: Consider **Nginx + PHP-FPM**.

#### 12. Role of PHP in Modern Backend Development  
Despite myths, PHP remains powerful:  
- Powers **WordPress**, which runs over 35% of the web  
- Frameworks like **Laravel**, **Symfony**, **CodeIgniter**  
- Can build REST APIs, microservices, real-time apps  
- Integrates well with modern frontends (**Vue**, **React**, **Livewire**)  

🚀 PHP is not dying — it’s evolving!

### 🧪 Module 1 Exercises Recap  
| Exercise                                | Status |
|----------------------------------------|--------|
| 1. Environment Setup & `phpinfo()`     | ✅     |
| 2. Variables, Constants, Echo          | ✅     |
| 3. Data Types, Casting, `gettype()`    | ✅     |
| 4. Operators, Logic, `if/else`         | ✅     |
| 5. PHP Tags Explanation                | ✅     |