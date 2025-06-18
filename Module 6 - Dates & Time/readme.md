# 🚀 Module 6: Working with Dates & Time  
## Master Date Handling in PHP – From Basics to Advanced  

### 🎯 Goal  
Understand how to work with dates and time in PHP, including:
- `date()` and `time()` functions  
- Formatting dates  
- Creating timestamps  
- Calculating date differences  
- Using the `DateTime` class (OOP style)  
- Time zones and daylight saving adjustments  
- Benchmarking code execution time  

PHP's date handling has evolved from basic functions like `date()` to modern OOP classes like `DateTime`, which are especially important when working with Laravel.

Let’s dive in!

---

### 🧠 Topics Covered  
- Basic Date Functions (`date()`, `time()`, `strtotime()`)  
- Formatting Dates  
- Creating Timestamps  
- Calculating Date Differences  
- The `DateTime` Class (OOP Style)  
- Working with Time Zones  
- Daylight Saving Adjustments  
- Benchmarking Code Execution Time  

---

### 💡 Pro Tips Before We Dive In  
- Prefer `DateTime` over `date()`/`strtotime()` for complex logic — it’s more readable and less error-prone.  
- Always specify time zones — never rely on server defaults.  
- Use **Carbon** (Laravel’s default date library) for cleaner syntax.  
- Store all dates in **UTC**, then convert to user timezones at display time.  
- Avoid using `mktime()` or `strtotime()` for new projects — use `DateTime` instead.  

---

## 1. Basic Date Functions

🔹 **`date()`** – Format a Local Date/Time  
```php
echo date("Y-m-d H:i:s"); // Outputs: 2025-04-05 14:30:00
```

Format characters:
| Char | Meaning |
|------|---------|
| `Y`  | 4-digit year |
| `y`  | 2-digit year |
| `m`  | Month (01–12) |
| `d`  | Day of month |
| `H`  | Hour (00–23) |
| `i`  | Minutes |
| `s`  | Seconds |

✅ Tip: Use `date_default_timezone_set('UTC')` to avoid local timezone issues.

---

🔹 **`time()`** – Current Unix Timestamp  
```php
echo time(); // Outputs: 1717692000 (seconds since 1970)
```

Useful for comparisons and benchmarks.

---

🔹 **`strtotime()`** – Convert Human-readable Date to Timestamp  
```php
echo strtotime("now");
echo strtotime("next Friday");
echo strtotime("+3 days");
```

⚠️ Be careful with ambiguous input — it can return `false`.

---

## 2. Formatting Dates

You can format any timestamp:

```php
$timestamp = strtotime("2025-04-05 10:00:00");
echo date("l, F jS Y g:i A", $timestamp);
// Outputs: Saturday, April 5th 2025 10:00 AM
```

Use this to show localized or formatted dates to users.

---

## 3. Creating Timestamps

🔹 **Manual creation**
```php
$timestamp = mktime(10, 30, 0, 4, 5, 2025); // 2025-04-05 10:30:00
```

---

🔹 **From string with `strtotime()`**
```php
$timestamp = strtotime("2025-04-05 10:30:00");
```

---

🔹 **With `DateTime`**
```php
$date = new DateTime("2025-04-05 10:30:00");
echo $date->getTimestamp();
```

---

## 4. Calculating Date Differences

🔹 **Using `DateTime`**
```php
$date1 = new DateTime("2025-04-05");
$date2 = new DateTime("2025-04-10");

$interval = $date1->diff($date2);
echo $interval->days; // 5
```

---

🔹 **Output difference:**
```php
echo $interval->format("%a days between dates");
```

This is much safer than manually calculating days with `strtotime()`.

---

## 5. The `DateTime` Class (OOP Style)

Modern way to handle dates in PHP (used heavily in Laravel).

🔹 **Create**
```php
$date = new DateTime(); // Now
$date = new DateTime("2025-04-05");
```

---

🔹 **Modify**
```php
$date->modify("+3 days");
```

---

🔹 **Format**
```php
echo $date->format("Y-m-d H:i:s");
```

---

🔹 **Compare**
```php
if ($date1 < $date2) {
    echo "Date1 is earlier";
}
```

✅ You’ll see this everywhere in Laravel models, controllers, and APIs.

---

## 6. Working with Time Zones

🔹 **Set Default Timezone**
```php
date_default_timezone_set("Asia/Jakarta");
```

---

🔹 **With `DateTime`**
```php
$date = new DateTime("now", new DateTimeZone("Europe/London"));
echo $date->format("Y-m-d H:i:s T"); // Includes timezone
```

---

🔹 **Change Timezone**
```php
$date->setTimezone(new DateTimeZone("America/New_York"));
```

⚠️ Never assume the server’s timezone — always set explicitly.

---

## 7. Daylight Saving Adjustments

PHP handles DST automatically if you use `DateTime` and real timezones.

```php
$date = new DateTime("2025-03-10 00:00:00", new DateTimeZone("Europe/London"));
$date->modify("+1 day");
echo $date->format("Y-m-d H:i:s T"); // Shows correct DST change
```

Avoid hardcoded offsets like `+0100` — always use named zones.

---

## 8. Benchmarking Code Execution Time

Use `microtime()` to measure performance.

```php
$start = microtime(true);

// Your code here
sleep(1);

$end = microtime(true);
echo "Execution time: " . round($end - $start, 2) . " seconds\n";
```

Useful for debugging slow queries or heavy computations.

---
# 📅 PHP Date Format Reference – Breakdown of Common Format Strings

A quick reference guide to help you understand and build custom date formats in PHP.

---

## 🔤 Common Date Format Symbols Explained

| Symbol | Meaning                        | Example Output |
|--------|--------------------------------|----------------|
| `l`    | Full weekday name              | Saturday       |
| `,`    | Literal comma                  | ,              |
| `F`    | Full month name                | April          |
| `j`    | Day of the month (no leading zero) | 5            |
| `S`    | English ordinal suffix for day   | th             |
| `Y`    | 4-digit year                   | 2025           |
| `g`    | Hour in 12-hour format (no leading zero) | 10     |
| `:`    | Literal colon                  | :              |
| `i`    | Minutes with leading zeros     | 30             |
| `A`    | Uppercase Ante/Post Meridiem   | AM / PM        |

---

## 🔁 Putting It All Together

Given:

```php
echo date("l, F jS Y g:i A");
```

If current time is:
```text
2025-04-05 10:30:00 UTC
```

Output will be:
```text
Saturday, April 5th 2025 10:30 AM
```

---

## 🧠 Other Common Date Formats You Might See

| Format String         | Example Output               | Use Case                             |
|-----------------------|----------------------------|--------------------------------------|
| `"Y-m-d H:i:s"`       | `2025-04-05 10:30:00`     | MySQL datetime, APIs                 |
| `"d/m/Y"`             | `05/04/2025`               | European date style                  |
| `"m/d/Y"`             | `04/05/2025`               | US date style                        |
| `"D, d M Y H:i:s"`    | `Sat, 05 Apr 2025 10:30:00` | RFC 2822 (used in email headers)  |
| `"c"`                 | `2025-04-05T10:30:00+00:00` | ISO 8601 (ideal for JSON/APIs)    |

> 💡 You’ll often use these when formatting dates in Laravel apps, APIs, or forms.

Let me know if you want this as a downloadable `.md` file or combined with Module 6!