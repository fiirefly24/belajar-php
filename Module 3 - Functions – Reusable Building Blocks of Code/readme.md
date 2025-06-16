# 🚀 Module 3: Functions – Reusable Building Blocks of Code  
## Learn How to Write Clean, Powerful PHP Functions  

### 🎯 Goal  
Understand how to create and use functions in PHP — the building blocks of any real application.

You'll learn:
- How to define functions  
- Pass parameters (by value and by reference)  
- Return values  
- Use built-in and user-defined functions  
- Scope (global, local, static)  
- Anonymous & arrow functions  
- And more!

---

### 🧠 Topics Covered  
- What Is a Function?  
- How to Define and Call a Function  
- Function Parameters and Return Values  
- Variable Scope (Global, Local, Static)  
- Built-in Functions (`strlen`, `substr`, etc.)  
- Anonymous Functions  
- Arrow Functions (PHP 7.4+)  
- Passing by Reference vs Value  
- Variadic Functions (`...$args`)  
- Internal Functions (`func_get_args`, `call_user_func`)  
- Backtrace Debugging with `debug_backtrace()`  

---

### 💡 Pro Tips Before We Dive In  
- Keep your functions small and focused on one task.  
- Use return values instead of echoing directly — makes functions reusable.  
- Prefer arrow functions for short callbacks.  
- Understand scope — avoid using `global` unless absolutely necessary.  
- Use type hints and return type declarations (PHP 7+).  

---

## 1. What Is a Function?

A function is a block of code that performs a specific task and can be reused throughout your program.

```php
function sayHello() {
    echo "Hello, world!";
}
```

You define it once, then call it when needed:

```php
sayHello(); // Outputs: Hello, world!
```

---

## 2. How to Define and Call a Function

🔹 **Syntax**

```php
function functionName($parameter1, $parameter2) {
    // Code here
    return $value; // optional
}
```

🔹 **Example**

```php
function add($a, $b) {
    return $a + $b;
}

echo add(3, 5); // Outputs: 8
```

✅ Functions should do one thing well — don’t make them too long or complex.

---

## 3. Function Parameters and Return Values

🔹 **Parameters**

Values passed into a function.

```php
function greet($name) {
    echo "Hello, $name!";
}

greet("Ammad"); // Hello, Ammad!
```

🔹 **Return Values**

Use `return` to send data back from a function.

```php
function multiply($a, $b) {
    return $a * $b;
}

$result = multiply(4, 5);
echo $result; // 20
```

✅ A function can return any data type: string, int, array, object, etc.

---

## 4. Variable Scope (Global, Local, Static)

🔹 **Local Scope**

Variables inside a function are not accessible outside.

```php
function test() {
    $x = 10;
    echo $x;
}

test(); // 10
echo $x; // Error: Undefined variable
```

---

🔹 **Global Scope**

Use `global` keyword to access global variables inside a function.

```php
$x = 10;

function test() {
    global $x;
    echo $x;
}

test(); // 10
```

⚠️ Avoid overusing `global` — it makes debugging harder.

---

🔹 **Static Variables**

Retain their value between function calls.

```php
function counter() {
    static $count = 0;
    echo $count . "\n";
    $count++;
}

counter(); // 0
counter(); // 1
counter(); // 2
```

---

## 5. Built-in Functions

PHP has hundreds of built-in functions for strings, arrays, files, math, and more.

🔹 **String Functions**

```php
echo strlen("hello");       // 5
echo substr("hello", 0, 2); // he
echo strtoupper("hello");   // HELLO
```

---

🔹 **Array Functions**

```php
$array = [1, 2, 3];
echo count($array);        // 3
print_r(array_map(fn($x) => $x * 2, $array)); // [2, 4, 6]
```

💡 You’ll use these often — especially in Laravel apps.

---

## 6. Anonymous Functions

Also called **closures**, they have no name and are useful as callback functions.

```php
$greet = function($name) {
    echo "Hello, $name!\n";
};

$greet("Ammad"); // Hello, Ammad!
```

Used heavily in Laravel routes, collections, and event handling.

---

## 7. Arrow Functions (PHP 7.4+)

Shorter syntax for anonymous functions that return a single expression.

```php
$add = fn($a, $b) => $a + $b;
echo $add(3, 4); // 7
```

Very clean and readable for simple logic.

---

## 8. Passing by Reference vs Value

🔹 **By Value (Default)**

The function gets a copy of the variable.

```php
function increment($num) {
    $num++;
}

$x = 5;
increment($x);
echo $x; // Still 5
```

---

🔹 **By Reference**

The function modifies the original variable.

```php
function increment(&$num) {
    $num++;
}

$x = 5;
increment($x);
echo $x; // Now 6
```

Useful when you want to modify input variables directly.

---

## 9. Variadic Functions (`...$args`)

Accept any number of arguments.

```php
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3); // 6
```

Also works with named parameters:

```php
function logMessages($prefix, ...$messages) {
    foreach ($messages as $msg) {
        echo "$prefix: $msg\n";
    }
}

logMessages("INFO", "Login success", "Page loaded");
```

---

## 10. Internal Functions

Functions used to work with other functions dynamically.

🔹 **`func_get_args()`**

Get all arguments passed to a function.

```php
function demo() {
    $args = func_get_args();
    print_r($args);
}

demo("apple", "banana", "cherry");
// Outputs: Array ( [0] => apple [1] => banana [2] => cherry )
```

---

🔹 **`call_user_func()`**

Call a function by its name as a string.

```php
function sayHi() {
    echo "Hi there!\n";
}

call_user_func("sayHi"); // Hi there!
```

Useful in frameworks like Laravel for dynamic routing and callbacks.

---

## 11. Backtrace Debugging with `debug_backtrace()`

Shows the call stack — useful for debugging.

```php
function a() {
    b();
}

function b() {
    c();
}

function c() {
    print_r(debug_backtrace());
}

a();
```

This shows which function called which — great for tracking bugs.