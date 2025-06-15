# 🧮 Operators in PHP – Explained  

Operators are symbols or keywords used to perform operations on variables and values. They allow you to manipulate data, compare values, control logic flow, and more.

PHP supports several types of operators:  
- Arithmetic Operators  
- Assignment Operators  
- Comparison Operators  
- Logical Operators  
- Increment/Decrement Operators  
- String Operators  
- Ternary Operator (Short-hand if-else)  
- Null Coalescing Operator (`??`)  
- Spaceship Operator (`<=>`)  

Let’s go through each one with examples and pro tips.

---

## 1. Arithmetic Operators  

Used for basic math operations.

| Operator | Name         | Example       | Result |
|----------|--------------|---------------|--------|
| `+`      | Addition     | `5 + 3`       | `8`    |
| `-`      | Subtraction  | `5 - 3`       | `2`    |
| `*`      | Multiplication | `5 * 3`     | `15`   |
| `/`      | Division     | `10 / 3`      | `3.333...` |
| `%`      | Modulus      | `10 % 3`      | `1`    |
| `**`     | Exponent     | `2 ** 3`      | `8`    |

💡 **Pro Tip:** Use modulus `%` to check even/odd numbers:

```php
if ($num % 2 == 0) {
    echo "$num is even";
}
```

---

## 2. Assignment Operators  

Assign values to variables.

| Operator | Description          | Example             | Equivalent To        |
|----------|----------------------|---------------------|-----------------------|
| `=`      | Assign               | `$a = 5;`           | `$a = 5;`             |
| `+=`     | Add and assign       | `$a += 3;`          | `$a = $a + 3;`        |
| `-=`     | Subtract and assign  | `$a -= 3;`          | `$a = $a - 3;`        |
| `*=`     | Multiply and assign  | `$a *= 3;`          | `$a = $a * 3;`        |
| `/=`     | Divide and assign    | `$a /= 3;`          | `$a = $a / 3;`        |
| `.=`     | Concatenate and assign | `$str .= " world";` | `$str = $str . " world";` |

**Example:**
```php
$a = 10;
$a += 5; // Now $a = 15
```

---

## 3. Comparison Operators  

Used in conditions to compare two values.

| Operator | Name              | Example           | Description                      |
|----------|-------------------|-------------------|----------------------------------|
| `==`     | Equal             | `5 == "5"`        | Same value                       |
| `===`    | Identical         | `5 === "5"`       | Same value and type              |
| `!=`     | Not equal         | `5 != 6`          | Values not equal                 |
| `!==`    | Not identical     | `5 !== "5"`       | Type or value differ             |
| `<`      | Less than         | `3 < 5`           | Left less than right             |
| `>`      | Greater than      | `5 > 3`           | Left greater than right          |
| `<=`     | Less than or equal| `3 <= 3`          | Left ≤ right                     |
| `>=`     | Greater or equal  | `5 >= 5`          | Left ≥ right                     |

**Example:**
```php
if ($age >= 18) {
    echo "You can vote!";
}
```

⚠️ **Important:** Use `===` when comparing strict types (e.g., checking return values like `false` vs `0`).

---

## 4. Logical Operators  

Used to combine conditions.

| Operator | Keyword | Description              | Example                     |
|----------|---------|--------------------------|-----------------------------|
| `&&`     | AND     | Both conditions true     | `$a > 5 && $b < 10`        |
| `||`     | OR      | At least one true        | `$a == 5 || $b == 10`      |
| `!`      | NOT     | Inverts condition        | `!($a == $b)`               |
| `xor`    | XOR     | Only one condition true  | `$a xor $b`                 |

**Example:**
```php
if ($isLoggedIn && $isAdmin) {
    echo "Access granted";
}
```

💡 **Pro Tip:** Use parentheses to avoid ambiguity:
```php
if (($age >= 18 && $hasID) || $isAdmin)
```

---

## 5. Increment/Decrement Operators  

Increase or decrease a variable by one.

| Operator | Name            | Example                | Behavior                          |
|----------|-----------------|------------------------|-----------------------------------|
| `++$a`   | Pre-increment   | `$a = 5; ++$a;`        | `$a = 6` (before use)             |
| `$a++`   | Post-increment  | `$a = 5; $a++;`        | `$a = 6` (after use)              |
| `--$a`   | Pre-decrement   | `$a = 5; --$a;`        | `$a = 4` (before use)             |
| `$a--`   | Post-decrement  | `$a = 5; $a--;`        | `$a = 4` (after use)              |

**Example:**
```php
$i = 1;
echo $i++; // Outputs 1, then increments to 2
echo ++$i; // Increments first to 3, then outputs 3
```

---

## 6. String Operators  

Only two string-specific operators.

| Operator | Name             | Example                              |
|----------|------------------|--------------------------------------|
| `.`      | Concatenation    | `"Hello" . " World" → "Hello World"` |
| `.=`     | Concatenate assign | `$greeting = "Hello"; $greeting .= " World";` |

**Example:**
```php
$name = "John";
$message = "Welcome, " . $name . "!"; // Welcome, John!
```

---

## 7. Ternary Operator (`? :`)  

Shorthand for `if-else`.

```php
$result = condition ? value_if_true : value_if_false;
```

**Example:**
```php
$status = ($age >= 18) ? "Adult" : "Minor";
```

💡 **Pro Tip:** Avoid nesting ternaries—they become hard to read quickly.

---

## 8. Null Coalescing Operator (`??`)  

Returns the left operand if it exists and is not null; otherwise, returns the right operand.

```php
$value = $_GET['page'] ?? 'home';
```

Equivalent to:
```php
$value = isset($_GET['page']) ? $_GET['page'] : 'home';
```

✅ Very useful in Laravel and modern PHP apps.

---

## 9. Spaceship Operator (`<=>`)  

Compares two expressions and returns:
- `1` if left > right  
- `0` if equal  
- `-1` if left < right  

Useful in sorting functions.

**Example:**
```php
echo 5 <=> 3;  // 1
echo 3 <=> 3;  // 0
echo 2 <=> 5;  // -1
```

---

## 📌 Summary Table of Operators

| Category             | Operators                                  |
|----------------------|--------------------------------------------|
| **Arithmetic**       | `+`, `-`, `*`, `/`, `%`, `**`              |
| **Assignment**       | `=`, `+=`, `-=`, `*=`, `/=`, `.=`          |
| **Comparison**       | `==`, `===`, `!=`, `!==`, `<`, `>`, `<=`, `>=` |
| **Logical**          | `&&`, `||`, `!`, `xor`                     |
| **Increment/Decrement** | `++$a`, `$a++`, `--$a`, `$a--`         |
| **String**           | `.`, `.=`                                  |
| **Ternary**          | `?:`                                       |
| **Null Coalescing**  | `??`                                       |
| **Spaceship**        | `<=>`                                      |