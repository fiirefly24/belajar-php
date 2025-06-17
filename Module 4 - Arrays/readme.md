# 🚀 Module 4: Arrays – Indexed, Associative, Multi-dimensional & More  
## Master One of PHP’s Most Powerful Data Structures  

### 🎯 Goal  
Understand how to work with arrays in PHP, including:

- Indexed arrays  
- Associative arrays  
- Multi-dimensional arrays  
- Built-in array functions (`array_map`, `array_filter`, `array_reduce`)  
- Sorting and searching  
- Iterating with `foreach`  
- Generators for memory efficiency  

Arrays are used everywhere in PHP — from Laravel collections to configuration files and database results.

Let’s dive in!

---

### 🧠 Topics Covered  
- What Is an Array?  
- Indexed Arrays vs Associative Arrays  
- Multi-dimensional Arrays  
- Common Array Functions  
  - `array_map()`  
  - `array_filter()`  
  - `array_reduce()`  
  - `array_search()`  
  - `array_keys()`, `array_values()`  
- Sorting Arrays  
- Iterating with `foreach`  
- `list()` and `extract()`  
- SPL Data Structures (`SplStack`, `SplQueue`)  
- Array Destructuring (`[$a, $b] = $array`)  
- Recursive Array Iteration  
- Generators for Memory Efficiency  

---

### 💡 Pro Tips Before We Dive In  
- Use associative arrays when working with key-value pairs (like user data).  
- Prefer built-in array functions over manual loops — cleaner and more expressive.  
- Use `array_map()` for transforming data, `array_filter()` for filtering, and `array_reduce()` for aggregations.  
- Avoid deeply nested arrays unless necessary — hard to debug.  
- Use generators when processing large datasets — saves memory.  

---

## 1. What Is an Array?

An **array** is a data structure that holds multiple values in a single variable.

```php
$fruits = ["apple", "banana", "cherry"];
```

PHP arrays can be:
- **Indexed** (numeric keys)  
- **Associative** (string keys)  
- **Multi-dimensional** (arrays inside arrays)  

---

## 2. Indexed Arrays vs Associative Arrays

🔹 **Indexed Arrays**

Keys are automatically assigned (starting at 0):

```php
$colors = ["red", "green", "blue"];
echo $colors[0]; // red
```

---

🔹 **Associative Arrays**

You define the keys:

```php
$user = [
    "name" => "Ammad",
    "role" => "developer"
];
echo $user["name"]; // Ammad
```

✅ Associative arrays are perfect for structured data like JSON responses or database rows.

---

## 3. Multi-dimensional Arrays

An array containing other arrays.

```php
$users = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30]
];

echo $users[1]["name"]; // Bob
```

Useful for representing tables, grids, or hierarchical data.

---

## 4. Common Array Functions

🔹 **`array_map()`** – Transform Values  
Applies a function to each element.

```php
$nums = [1, 2, 3];
$doubled = array_map(fn($n) => $n * 2, $nums);
print_r($doubled); // [2, 4, 6]
```

---

🔹 **`array_filter()`** – Filter Values  
Keeps only elements that return true.

```php
$ages = [15, 20, 25];
$adults = array_filter($ages, fn($age) => $age >= 18);
print_r($adults); // [20, 25]
```

---

🔹 **`array_reduce()`** – Aggregate Values  
Reduces an array to a single value.

```php
$numbers = [1, 2, 3, 4];
$total = array_reduce($numbers, fn($carry, $n) => $carry + $n, 0);
echo $total; // 10
```

---

🔹 **`array_search()`** – Find Key by Value  
Returns the key of the first match.

```php
$colors = ["red", "green", "blue"];
$key = array_search("green", $colors);
echo $key; // 1
```

---

🔹 **`array_keys()` / `array_values()`** – Extract Keys or Values

```php
$data = ["name" => "John", "age" => 30];
print_r(array_keys($data));   // ["name", "age"]
print_r(array_values($data)); // ["John", 30]
```

---

## 5. Sorting Arrays

🔹 **Sort Indexed Arrays**

```php
$nums = [3, 1, 2];
sort($nums);
print_r($nums); // [1, 2, 3]
```

---

🔹 **Sort Associative Arrays by Value**

```php
$prices = ["apple" => 2, "banana" => 1, "cherry" => 3];
asort($prices);
print_r($prices); // banana => 1, apple => 2, cherry => 3
```

---

🔹 **Sort by Key**

```php
ksort($prices);
```

There are many sorting functions — use the right one based on your needs.

---

## 6. Iterating with `foreach`

Best way to loop through arrays.

🔹 **Indexed Array**

```php
$fruits = ["apple", "banana", "cherry"];
foreach ($fruits as $fruit) {
    echo "$fruit\n";
}
```

---

🔹 **Associative Array**

```php
$user = ["name" => "Ammad", "role" => "developer"];
foreach ($user as $key => $value) {
    echo "$key: $value\n";
}
```

---

## 7. `list()` and `extract()`

🔹 **`list()`** – Assign Multiple Variables from Array

```php
list($a, $b) = [10, 20];
echo $a; // 10
```

---

🔹 **`extract()`** – Turn Associative Array into Variables

```php
$data = ["name" => "John", "age" => 30];
extract($data);
echo $name; // John
```

⚠️ Be careful with `extract()` — it can overwrite existing variables.

---

## 8. SPL Data Structures

PHP Standard Library (SPL) offers useful structures like:

🔹 **`SplStack`** – LIFO (Last In First Out)

```php
$stack = new SplStack();
$stack->push("one");
$stack->push("two");
echo $stack->pop(); // two
```

---

🔹 **`SplQueue`** – FIFO (First In First Out)

```php
$queue = new SplQueue();
$queue->enqueue("first");
$queue->enqueue("second");
echo $queue->dequeue(); // first
```

These are great for advanced logic and algorithms.

---

## 9. Array Destructuring

New in PHP 7.1+ – assign values directly:

```php
[$a, $b, $c] = [1, 2, 3];
echo $a; // 1
```

Works with associative arrays too:

```php
['name' => $name, 'age' => $age] = ['name' => 'John', 'age' => 30];
echo $name; // John
```

---

## 10. Recursive Array Iteration

To iterate deeply nested arrays, use `RecursiveIteratorIterator`.

```php
$array = [
    "a",
    ["b", "c"],
    ["d", ["e", "f"]]
];

$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
foreach ($it as $value) {
    echo "$value\n";
}
// Outputs: a b c d e f
```

Great for flattening complex data.

---

## 11. Generators for Memory Efficiency

Used for large datasets — yields values one at a time instead of loading all into memory.

```php
function getNumbers() {
    for ($i = 1; $i <= 1000000; $i++) {
        yield $i;
    }
}

foreach (getNumbers() as $num) {
    echo "$num\n";
}
```

Perfect for reading large files, querying big databases, etc.