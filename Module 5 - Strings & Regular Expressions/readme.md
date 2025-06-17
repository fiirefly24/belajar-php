# 🚀 Module 5: Strings & Regular Expressions  
## Master Text Manipulation, Regex, and Unicode in PHP  

### 🎯 Goal  
Understand how to work with strings and regular expressions in PHP, including:

- String manipulation (`strlen`, `substr`, `str_replace`)  
- Heredoc/Nowdoc syntax  
- Regular expressions (`preg_match`, `preg_replace`)  
- Validating input with regex  
- Multibyte strings and Unicode handling  
- Emoji support 😄  
- Regex optimization tips  

Strings are everywhere — from user input to API responses. Learning how to manipulate them safely and efficiently is critical for any PHP developer.

---

### 🧠 Topics Covered  
- String Basics  
- String Functions (`strlen`, `strpos`, `substr`, `str_replace`)  
- Heredoc & Nowdoc Syntax  
- Regular Expressions in PHP  
  - `preg_match()`  
  - `preg_replace()`  
  - `preg_split()`  
  - Validating input with regex  
- Multibyte String Functions  
- Unicode Handling & Emojis  
- Regex Optimization Tips  

---

### 💡 Pro Tips Before We Dive In  
- Use `mb_*` functions when dealing with UTF-8 (e.g., emojis or non-Latin characters).  
- Always escape user input before using it in regex.  
- Use regex sparingly — prefer built-in validation functions like `filter_var()` when possible.  
- Use `preg_quote()` if you're embedding user input into a regex pattern.  
- Keep regex patterns readable — complex ones can be hard to debug.  

---

## 1. String Basics

In PHP, strings can be defined using:
- Single quotes `'Hello'`  
- Double quotes `"Hello $name"`  
- Heredoc / Nowdoc (for large blocks)  

```php
$name = "Ammad";
echo "Hello, $name"; // Hello, Ammad
```

Double quotes allow variable interpolation and escape sequences (`\n`, `\t`, etc.)

---

## 2. Common String Functions

🔹 **`strlen()`** – Get String Length  
```php
echo strlen("hello"); // 5
```
⚠️ For UTF-8 strings, use `mb_strlen()` instead.

---

🔹 **`strpos()`** – Find Position of Substring  
```php
$pos = strpos("hello world", "world");
echo $pos; // 6
```
Returns position or `false` if not found.

---

🔹 **`substr()`** – Extract Part of a String  
```php
echo substr("hello world", 0, 5); // hello
```
Useful for truncation or extraction.

---

🔹 **`str_replace()`** – Replace Text  
```php
echo str_replace("world", "PHP", "hello world"); // hello PHP
```

Also works on arrays:
```php
$values = ["apple", "banana"];
echo str_replace($values, "fruit", "I ate an apple and banana.");
// I ate an fruit and fruit.
```

---

## 3. Heredoc & Nowdoc Syntax

Useful for long strings, especially with variables.

🔹 **Heredoc** (interpolated)  
```php
$name = "Ammad";
$text = <<<EOT
Hello $name,
Welcome to the course!
EOT;

echo $text;
```

---

🔹 **Nowdoc** (no interpolation)  
```php
$name = "Ammad";
$text = <<<'EOT'
Hello $name,
Welcome to the course!
EOT;

echo $text;
// Outputs:
// Hello $name,
// Welcome to the course!
```

Great for writing SQL queries, HTML templates, or config files.

---

## 4. Regular Expressions in PHP

Regex lets you match, search, and replace text based on patterns.

PHP uses PCRE (Perl Compatible Regular Expressions) via `preg_*` functions.

🔹 **`preg_match()`** – Search for Match  
```php
if (preg_match("/\d+/", "My age is 25")) {
    echo "Found a number!";
}
```

---

🔹 **`preg_replace()`** – Replace Matches  
```php
$new = preg_replace("/cat/i", "dog", "The cat sat on the mat");
echo $new; // The dog sat on the mat
```

---

🔹 **`preg_split()`** – Split String Using Regex  
```php
$parts = preg_split("/[\s,]+/", "apple, banana orange ,grape");
print_r($parts);
// ["apple", "banana", "orange", "grape"]
```

---

🔹 **Validating Input with Regex**

Check email format:
```php
$email = "test@example.com";
if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "Valid email";
}
```

But better to use built-in function:
```php
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email";
}
```

---

## 5. Multibyte String Functions

Standard string functions don’t handle UTF-8 well. Use these instead:

| mb_* Function       | Standard Equivalent |
|---------------------|----------------------|
| `mb_strlen()`       | `strlen()`           |
| `mb_substr()`       | `substr()`           |
| `mb_strpos()`       | `strpos()`           |
| `mb_ereg_match()`   | `preg_match()`       |

Example:
```php
$str = "こんにちは"; // Japanese greeting
echo mb_strlen($str); // 5 (correct)
echo strlen($str);   // 15 (incorrect byte count)
```

Always use `mb_*` functions when working with international content.

---

## 6. Unicode Handling & Emojis

PHP supports Unicode, but only if handled correctly.

🔹 **Working with Emojis**
```php
$str = "I ❤️ PHP";
echo mb_strlen($str, 'UTF-8'); // 7
```

---

🔹 **Remove Invalid UTF-8 Characters**
```php
$clean = mb_convert_encoding($dirty, 'UTF-8', 'UTF-8');
```

---

🔹 **Detect Emojis**
```php
if (preg_match('/[\x{1F600}-\x{1F64F}/u', $text)) {
    echo "Contains emoji!";
}
```

---

## 7. Regex Optimization Tips

✅ **Use Anchors for Exact Matches**
```php
// Better than loose matching
if (preg_match("/^abc$/", $str)) { ... }
```

---

✅ **Use Non-Capturing Groups When Possible**
```php
// Faster than capturing
preg_match("/(?:red|blue)/", $color);
```

---

✅ **Avoid Greedy Matching Unless Needed**

Use `?` after quantifiers to make them lazy:
```php
// Lazy match
preg_match("/<.*?>/s", "<b>Hello</b>", $match);
```

---

✅ **Escape User Input**
```php
$pattern = '/' . preg_quote($input, '/') . '/';
```

Avoids unexpected behavior in dynamic patterns.

---

# 🔠 Common Regular Expression Symbols (Regex Cheatsheet)

Here’s a quick reference table of the most commonly used symbols and patterns in PHP regex:

| Symbol | Meaning | Example | Matches |
|--------|---------|---------|---------|
| `.` | Any single character (except newline) | `a.c` | `"abc"`, `"aXc"` |
| `\d` | Digit (0–9) | `\d{3}` | `"123"` |
| `\D` | Non-digit | `\D+` | `"abc"` |
| `\w` | Word character `[a-zA-Z0-9_]` | `\w+` | `"hello_123"` |
| `\W` | Non-word character | `\W+` | `"!,@#"` |
| `\s` | Whitespace (space, tab, newline) | `\s+` | spaces |
| `\S` | Non-whitespace | `\S+` | text without spaces |
| `^` | Start of string | `^Hello` | strings starting with "Hello" |
| `$` | End of string | `world$` | strings ending with "world" |
| `*` | Zero or more | `go*` | `"g"`, `"go"`, `"goo"` |
| `+` | One or more | `go+` | `"go"`, `"goo"` (not `"g"`) |
| `?` | Zero or one | `colou?r` | `"color"` or `"colour"` |
| `{n}` | Exactly n times | `\d{3}` | `"123"` |
| `{n,}` | At least n times | `\d{2,}` | `"12"`, `"123"` |
| `{n,m}` | Between n and m times | `\d{2,4}` | `"12"`, `"123"`, `"1234"` |
| `[]` | Character class | `[aeiou]` | any vowel |
| `[^]` | Negated character class | `[^aeiou]` | non-vowel |
| `()` | Grouping | `(abc)+` | `"abc"`, `"abcabc"` |
| `\|` | OR | `cat\|dog` | `"cat"` or `"dog"` |
| `\b` | Word boundary | `\bcat\b` | `"cat"` in `"the cat"` but not `"category"` |
| `\B` | Non-word boundary | `\Bcat\B` | `"cat"` inside `"scatcat"` |
| `?=` | Positive lookahead | `foo(?=bar)` | matches `"foo"` before `"bar"` |
| `?!` | Negative lookahead | `foo(?!bar)` | matches `"foo"` NOT followed by `"bar"` |
| `[]+` | Match one or more from set | `[a-z]+` | one or more lowercase letters |
| `[]*` | Match zero or more from set | `[a-z]*` | zero or more lowercase letters |

---

## 🚀 Unicode & Emoji Patterns

| Pattern | Description | Example |
|--------|-------------|---------|
| `[\x{1F600}-\x{1F64F}]` | Emoticons 😄 | `"😄", "😂"` |
| `[\x{1F300}-\x{1F5FF}]` | Symbols & pictographs 🌍 | `"🌍", "🌈"` |
| `[\x{2600}-\x{26FF}]` | Miscellaneous symbols ☀️ | `"☀️", "⚡"` |
| `[\x{1F900}-\x{1F9FF}]` | Supplemental symbols 🧠 | `"🧩", "🧠"` |
| `[\x{1F680}-\x{1F6FF}]` | Transport and map symbols 🚗 | `"🚗", "✈️"` |

### ✅ Emoji Detection Example:
```php
function hasEmoji($text) {
    return preg_match('/[\x{1F600}-\x{1F64F}]/u', $text);
}

echo hasEmoji("I ❤️ coding!") ? "Contains emoji\n" : "No emoji\n";
```

---

## ⚙️ Regex Optimization Tips – Write Fast, Safe, Readable Patterns

Regular expressions are powerful — but can be slow or even dangerous if not written carefully.

Here are pro tips for writing optimized regex in PHP:

### 1. Use Anchors (`^`, `$`) for Exact Matches

❌ Bad:
```php
preg_match("/123/", "abc123xyz"); // matches!
```

✅ Better:
```php
preg_match("/^123$/", "abc123xyz"); // no match
```

---

### 2. Prefer Literal Strings Over Complex Patterns When Possible

❌ Unnecessary regex:
```php
if (preg_match("/apple/", $text)) { ... }
```

✅ Better:
```php
if (str_contains($text, "apple")) { ... }
```

---

### 3. Use Non-Capturing Groups When You Don’t Need Capture

❌ Slower:
```php
preg_match_all("/(red|blue|green)/", $text, $matches);
```

✅ Faster:
```php
preg_match_all("/(?:red|blue|green)/", $text, $matches);
```

> Use `(?:...)` when you only care about matching, not capturing.

---

### 4. Avoid Greedy Matching Unless Needed

By default, quantifiers like `*`, `+`, `{}` are **greedy** — they match as much as possible.

Greedy (default):
```php
/<.*>/s
```
Matches everything between `<...>` — including inner tags!

Lazy (non-greedy):
```php
/<.*?>/s
```
Matches each tag individually.

---

### 5. Escape User Input with `preg_quote()`

Never embed raw user input directly into a regex pattern — it could break your regex or open up security holes.

✅ Always do this:
```php
$search = preg_quote($input, '/');
preg_match("/$search/", $text);
```

---

### 6. Use Character Classes Instead of Alternation

❌ Slower:
```php
/(jpg|jpeg|png)/
```

✅ Faster:
```php
/\.(jpe?g|png)$/i
```

---

### 7. Compile Patterns with `preg_match()` Only Once

If you're using the same regex repeatedly, define it once and reuse it.
```php
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($emailPattern, $email1)) { ... }
if (preg_match($emailPattern, $email2)) { ... }
```

---

### 8. Limit Backtracking

Backtracking is where the engine tries different ways to make a match — which can get really slow on large inputs.

❌ Slow example:
```php
/.*(\d+)/
```

✅ Optimized:
```php
/.*?(\d+)/
```

Using lazy quantifiers (`*?`, `+?`) reduces backtracking.

---

### 9. Use `mb_*` Functions with UTF-8

When working with Unicode or multibyte characters, always use `mb_*` functions and add `/u` modifier to regex.
```php
// Correct UTF-8 handling
if (preg_match("/日本語/u", $string)) {
    echo "Found Japanese text!";
}
```

---

### 10. Test Your Regex with Tools

Use tools like:

- [regex101.com](https://regex101.com) 
- [phpliveregex.com](https://www.phpliveregex.com) 

These help debug, optimize, and understand how your regex works step-by-step.