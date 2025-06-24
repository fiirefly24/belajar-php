# 🎉 Module 9: Cookies & Sessions – Managing User State in PHP  
## 🔐 Learn How to Store and Securely Manage User Data Across Requests  

PHP is stateless — each request knows nothing about the last one.  
But with **cookies** and **sessions**, you can:
- Track users  
- Remember login status  
- Show flash messages  
- Store preferences  
- Build shopping carts, dashboards, and more  

This is where Laravel shines — but it all starts with understanding how cookies and sessions work in raw PHP.

Let’s go deep!

---

### 🧠 Topics Covered  
- Managing cookies with `setcookie()`  
- Starting and managing sessions  
- Storing session data  
- Destroying sessions  
- Flash messages pattern  
- Secure cookie flags (`SameSite`, `HttpOnly`, `Secure`)  
- Session fixation prevention  
- Custom session handlers (e.g., database storage)  

We’ll also cover best practices used in Laravel and modern apps.

---

### 💡 Pro Tips Before We Dive In  
- Always use `HttpOnly` and `Secure` flags for cookies.  
- Don’t store sensitive data in cookies — use sessions instead.  
- Regenerate session ID after login/logout to prevent **session fixation**.  
- Use `$_SESSION` for temporary user-specific logic.  
- Flash messages should auto-clear after being shown.  

---

## 1. Managing Cookies with `setcookie()`

Used to store small amounts of data on the browser.

```php
// Set a cookie that expires in 1 hour
setcookie("user", "Ammad", [
    'expires' => time() + 3600,
    'path' => '/',
    'domain' => 'yourdomain.com',
    'secure' => true,     // Only over HTTPS
    'httponly' => true,   // Not accessible via JS
    'samesite' => 'Strict'
]);
```

🔍 **Cookie Flags Explained**

| Flag       | Meaning |
|------------|---------|
| `expires`  | When the cookie will be deleted |
| `path`     | Which URLs can access the cookie |
| `domain`   | Which domain gets the cookie |
| `secure`   | Only send over HTTPS |
| `httponly` | Can't be accessed by JavaScript |
| `samesite` | Prevents CSRF (options: `None`, `Lax`, `Strict`) |

✅ Use these flags in production or when handling sensitive data.

---

## 2. Starting and Managing Sessions

Sessions are stored on the server, not the client.

```php
session_start(); // Must be at top before any output
$_SESSION['user'] = 'Ammad';
```

⚠️ **Warning:** Never use `session_start()` if headers already sent.

You can also configure session behavior in `php.ini` or dynamically:

```php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();
```

---

## 3. Storing Session Data

Perfect for storing:
- Login status  
- Cart items  
- Temporary form errors  
- User preferences  

```php
$_SESSION['cart'][] = 'item_123';
```

✅ Use arrays for structured data.

To read:
```php
echo $_SESSION['user'];
```

---

## 4. Destroying Sessions

Clear session data and destroy session cookie.

```php
session_unset();     // Clears all session variables
session_destroy();   // Destroys session
```

Also clear the cookie manually:

```php
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}
```

✅ This is what Laravel does under the hood during logout.

---

## 5. Flash Messages Pattern

Messages that show only once, then disappear.

```php
// Set flash message
$_SESSION['flash_message'] = "Login successful";

// Redirect or reload page
header("Location: dashboard.php");
```

In next request:
```php
if (isset($_SESSION['flash_message'])) {
    echo "<div class='flash'>" . $_SESSION['flash_message'] . "</div>";
    unset($_SESSION['flash_message']);
}
```

✅ Laravel uses this exact idea with `session()->flash()` and `@if(session('key'))`.

---

## 6. Secure Cookie Flags

Use these for secure cookie handling:

```php
setcookie('remember_me', '1', [
    'expires' => time() + 86400 * 30,
    'path' => '/',
    'domain' => '.example.com',
    'secure' => true,
    'httponly' => false,
    'samesite' => 'Lax'
]);
```

🔒 **Best Practice:**
| Flag             | Why? |
|------------------|------|
| `secure`         | Only sent over HTTPS |
| `httponly`       | Can't be accessed via JS → prevents XSS |
| `samesite=Strict/Lax` | Helps prevent CSRF attacks |
| `path=/`          | Restrict cookie to specific paths |
| `domain=.example.com` | Share across subdomains safely |

---

## 7. Session Fixation Prevention

Attackers may try to reuse session IDs.

Fix it by regenerating the session ID after login/logout:

```php
session_start();
$_SESSION['user'] = 'Ammad';

// Prevent session fixation
session_regenerate_id(true); // true = delete old session file
```

✅ Laravel does this automatically after login.

---

## 8. Custom Session Handlers (Advanced)

By default, PHP stores session files on disk.

You can change this using custom handlers.

### Example: Save sessions in a MySQL table

```php
class MySessionHandler implements SessionHandlerInterface {
    public function open($savePath, $sessionName) { /* connect DB */ }
    public function close() { /* disconnect DB */ }
    public function read($id) { /* get from DB */ }
    public function write($id, $data) { /* save to DB */ }
    public function destroy($id) { /* delete from DB */ }
    public function gc($max_lifetime) { /* clean expired sessions */ }
}

$handler = new MySessionHandler();
session_set_save_handler($handler);
session_start();
```

✅ Used in large-scale Laravel apps with Redis or DB session drivers.





