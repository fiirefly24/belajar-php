## 🧩 Task 2: Inheritance

Create an `Admin` class that extends `User`.  
Add method `banUser($username)` → outputs `"Admin $this->name banned $username"`

**Example:**
```php
$admin = new Admin("SuperAdmin", "admin@example.com");
echo $admin->getInfo(); // Same as before
echo $admin->banUser("BadUser");
// Output: Admin SuperAdmin banned BadUser
```

✅ **Deliverable:** Paste your `Admin` class and test code.