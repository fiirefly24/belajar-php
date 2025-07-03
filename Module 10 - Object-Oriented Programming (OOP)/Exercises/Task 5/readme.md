## 🧩 Task 5: Magic Methods

Update your `User` class to support magic methods:
- Use `__set()` to store extra fields in a private array  
- Use `__get()` to retrieve those values  
- Use `__toString()` to return `"User: $name <$email>"`

**Example:**
```php
$user = new User("Ammad", "ammad@example.com");
$user->address = "Jakarta"; // Stored via __set()
echo $user->address;       // Retrieved via __get()
echo $user;                // Uses __toString()
```

✅ **Deliverable:** Paste your full class with magic methods.