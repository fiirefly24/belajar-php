# 🧭 Module 2: Control Structures  
## Mastering Conditional Logic and Loops in PHP  

### 🎯 Goal  
Understand how to control the flow of your PHP programs using:

- `if`, `else if`, `else`  
- `switch` and `match` (PHP 8+)  
- Loop structures: `for`, `while`, `do-while`, `foreach`  
- Best practices for writing clean, readable logic  

---

### 🧠 Topics Covered  
- Conditional Statements (`if`, `else if`, `else`)  
- Ternary Operator – Quick Conditionals  
- Switch Statement  
- Match Expression (PHP 8.0+)  
- For Loops  
- While / Do-While Loops  
- Foreach (for Arrays)  
- Breaking and Continuing Loops  
- Match vs Switch – Which Should You Use?  
- Loop Best Practices  
- Nesting Control Structures  

---

### 💡 Pro Tips Before We Dive In  
- Always use `{}` even for single-line conditionals — improves readability.  
- Avoid deep nesting; refactor with early returns or guard clauses.  
- Prefer `match()` over `switch` when possible — cleaner syntax and strict comparison.  
- Use `continue` and `break` carefully — they can make code harder to read if overused.  

---

## 1. Conditional Statements (`if`, `else if`, `else`)  

Used to execute different blocks of code based on conditions.

```php
$age = 20;

if ($age >= 18) {
    echo "You're an adult.";
} elseif ($age >= 13) {
    echo "You're a teenager.";
} else {
    echo "You're a child.";
}
```

✅ **Key Notes:**  
- Conditions must return a boolean (`true`/`false`)  
- Can chain multiple `elseif` blocks  
- `else` is optional  

---

## 2. Ternary Operator – Quick Conditionals  

Short-hand for simple `if/else`.

```php
$status = ($age >= 18) ? "Adult" : "Minor";
```

Also supports nested ternaries (not recommended):

```php
$status = ($age >= 18) ? "Adult" : (($age >= 13) ? "Teenager" : "Child");
```

⚠️ **Avoid deeply nested ternaries** — hard to read.

---

## 3. Switch Statement  

Useful when comparing one variable against many values.

```php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of the week!";
        break;
    case "Friday":
        echo "End of the week!";
        break;
    default:
        echo "Just another day.";
}
```

✅ **Key Notes:**  
- Each `case` ends with `break` to avoid fall-through  
- `default` handles unmatched cases  

---

## 4. Match Expression (PHP 8.0+)  

A modern, cleaner alternative to `switch`. Returns a value directly.

```php
$day = "Wednesday";

$result = match($day) {
    "Monday" => "Start of the week!",
    "Friday" => "End of the week!",
    default => "Just another day.",
};

echo $result;
```

✅ **Key Differences from `switch`:**  
- Strict comparison (`===`)  
- No need for `break`  
- Must assign result to a variable  
- More concise and readable  

---

## 5. For Loops  

Used when you know how many times you want to loop.

```php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i\n";
}
```

✅ **Structure:**
```php
for (init; condition; increment) {
    // Code to repeat
}
```

---

## 6. While / Do-While Loops  

**`while`**: Runs while condition is true  
```php
$count = 1;
while ($count <= 5) {
    echo "Count: $count\n";
    $count++;
}
```

**`do-while`**: Runs at least once, then checks condition  
```php
$count = 1;
do {
    echo "Count: $count\n";
    $count++;
} while ($count <= 5);
```

---

## 7. Foreach (for Arrays)  

Perfect for looping through arrays.

**Indexed Array:**
```php
$fruits = ["apple", "banana", "cherry"];

foreach ($fruits as $fruit) {
    echo "$fruit\n";
}
```

**Associative Array:**
```php
$user = ["name" => "Ammad", "age" => 27];

foreach ($user as $key => $value) {
    echo "$key: $value\n";
}
```

---

## 8. Breaking and Continuing Loops  

**`break`** – Exits the loop immediately  
```php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) break;
    echo "$i\n";
}
```

**`continue`** – Skips current iteration  
```php
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) continue;
    echo "$i is odd.\n";
}
```

---

## 9. Match vs Switch – Which Should You Use?

| Feature             | switch       | match        |
|---------------------|--------------|--------------|
| Comparison Type     | Loose (`==`) | Strict (`===`) |
| Fall-through        | Yes          | No           |
| Return Value        | No           | Yes          |
| Syntax              | Verbose      | Clean & Modern |

✅ **Recommendation:** Use `match()` whenever possible.

---

## 10. Loop Best Practices  

- Avoid infinite loops by ensuring the loop will eventually terminate  
- Use meaningful variable names (e.g., `$i` → `$index`, `$item`)  
- Keep loop bodies short and focused  
- Use `continue`/`break` only when needed  
- Prefer `foreach` for arrays, `for` when counting  

---

## 11. Nesting Control Structures  

You can nest any structure inside another:

```php
for ($i = 1; $i <= 3; $i++) {
    if ($i % 2 == 0) {
        echo "$i is even.\n";
    } else {
        echo "$i is odd.\n";
    }
}
```

✅ **Best Practice:**  
Avoid deep nesting — it makes code hard to read. Instead, use early returns or helper functions.