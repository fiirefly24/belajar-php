# 🚀 Module 7: Forms & User Input  
## Handle HTML Forms, GET/POST, and Secure Input Like a Pro  

### 🎯 Goal  
Understand how to securely handle HTML forms and user input in PHP, including:
- HTML form basics  
- `GET` vs `POST` methods  
- Handling form data in PHP  
- `$_GET`, `$_POST`, `$_REQUEST`  
- Sanitizing and validating user input  
- Security tips: XSS, CSRF  
- Using validation libraries like Respect/Validation  
- reCAPTCHA v3 integration (optional)  

Forms are the main way users interact with your app — whether it's logging in, registering, or submitting data.

Let’s dive in!

---

### 🧠 Topics Covered  
- HTML Forms Basics  
- GET vs POST Methods – What’s the Difference?  
- Handling Form Data in PHP  
- Super Globals: `$_GET`, `$_POST`, `$_REQUEST`  
- Sanitizing User Input (`filter_var()`)  
- Validating Input (`filter_var()` / regex)  
- Security Tips: Preventing XSS & CSRF  
- CSRF Token Generation & Validation  
- Using Form Validation Libraries (e.g., Respect/Validation)  
- reCAPTCHA v3 Integration (Bonus)  

---

### 💡 Pro Tips Before We Dive In  
- Prefer `POST` for sensitive or destructive actions (like login or delete).  
- Always **sanitize** and **validate** all user input.  
- Never trust `$_REQUEST` — it combines `GET`, `POST`, and `cookies` → security risk.  
- Use `htmlspecialchars()` to prevent **XSS** (Cross-Site Scripting).  
- Generate and verify **CSRF tokens** on every form submission.  
- Use libraries like `Respect\Validation` or Laravel’s built-in validators instead of writing raw validation logic.  

---

## 1. HTML Forms Basics

A basic HTML form:

```html
<form method="post" action="/process.php">
    <label>Name:</label>
    <input type="text" name="name">
    
    <label>Email:</label>
    <input type="email" name="email">

    <button type="submit">Submit</button>
</form>
```

When submitted, data is sent to `/process.php` using either `GET` or `POST`.

---

## 2. GET vs POST Methods – What’s the Difference?

| Feature             | GET                          | POST                        |
|---------------------|------------------------------|-----------------------------|
| Visible in URL      | ✅ Yes                       | ❌ No                      |
| Bookmarked          | ✅ Yes                       | ❌ No                      |
| Caching             | ✅ Yes                       | ❌ No                      |
| Idempotent (safe to repeat) | ✅ Yes              | ❌ No                      |
| Maximum length      | ❌ Limited                   | ✅ Unlimited                |
| Suitable for        | Search, filtering            | Login, registration, updates |

✅ **Use POST** when changing server state.  
✅ **Use GET** for safe, non-destructive requests.

---

## 3. Handling Form Data in PHP

After submitting a form, you can access the data via superglobals:

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
}
```

Always check the request method before accessing `$_POST` or `$_GET`.

---

## 4. Super Globals: `$_GET`, `$_POST`, `$_REQUEST`

| Variable   | Contains                                      |
|------------|-----------------------------------------------|
| `$_GET`    | Data from query string                        |
| `$_POST`   | Data from POST requests                       |
| `$_REQUEST`| Combines `$_GET`, `$_POST`, and `$_COOKIE`   |

✅ **Best Practice:**  
Use `$_POST` or `$_GET` explicitly — avoid `$_REQUEST` unless you have a specific reason.

---

## 5. Sanitizing User Input

Sanitize means "clean up" without rejecting the input.

🔹 **Example: Clean Email**
```php
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
```

---

🔹 **Example: Strip Tags from Text**
```php
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
```

Use these functions before displaying or storing user input.

---

## 6. Validating Input

Validation ensures input meets expected format.

🔹 **Validate Email**
```php
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
}
```

---

🔹 **Validate Integer**
```php
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
if ($age === false) {
    echo "Invalid age";
}
```

Use strict checks to reject bad input early.

---

## 7. Security Tips: Preventing XSS & CSRF

🔹 **Cross-Site Scripting (XSS)**  
Occurs when untrusted input is displayed without escaping.

✅ Fix:
```php
echo "<p>" . htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8') . "</p>";
```

---

🔹 **Cross-Site Request Forgery (CSRF)**  
Attackers trick users into making unintended requests.

✅ Fix:  
Generate and validate one-time tokens per form.

**Example:**
```php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(50));
```

In form:
```html
<input type="hidden" name="token" value="<?= $_SESSION['csrf_token'] ?>">
```

On submit:
```php
if ($_POST['token'] !== $_SESSION['csrf_token']) {
    die("CSRF attack detected");
}
```

---

## 8. CSRF Token Generation & Validation

Use sessions to store token, regenerate on each form load, and compare on submit.

You can also use libraries like:
- Laravel CSRF Protection (automatic)  
- [PHP-CSRF](https://github.com/mebjas/php-csrf-protection)  library  
- [Aura\Session](https://github.com/auraphp/Aura.Session)  for secure token handling  

---

## 9. Form Validation Libraries

Writing validation manually gets messy fast. Use libraries like:

🔹 **Respect/Validation** – Powerful and clean syntax

Install via Composer:
```bash
composer require respect/validation
```

Usage:
```php
use Respect\Validation\Validator as v;

$name = $_POST['name'];
$email = $_POST['email'];

if (
    v::stringType()->length(1, 100)->validate($name) &&
    v::email()->validate($email)
) {
    echo "All inputs valid!";
} else {
    echo "Invalid input";
}
```

Much cleaner than nested `if/else`.

---

## 10. reCAPTCHA v3 Integration (Optional)

Google reCAPTCHA helps detect bots without annoying users.

🔹 **Steps:**

1. Get site key and secret from [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)   
2. Add script to your form:
```html
<script src="https://www.google.com/recaptcha/api.js"></script> 
```

Add hidden input:
```html
<input type="hidden" name="g-recaptcha-response" id="recaptchaToken">
<script>
    fetch('https://www.google.com/recaptcha/api/siteverify',  {
        method: 'POST',
        body: JSON.stringify({ response: token, secret: 'YOUR_SECRET' })
    });
</script>
```

Laravel has built-in support via packages like [`anhskohbo/no-captcha`](https://github.com/anhskohbo/laravel-nocaptcha). 

---