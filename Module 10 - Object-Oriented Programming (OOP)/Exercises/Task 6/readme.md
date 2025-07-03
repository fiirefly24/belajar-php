## 🧩 Task 6: Trait

Create a trait `HasRole` that adds:
- Property `$roles`  
- Method `hasRole($role)` → returns `true` if role exists  

Use this trait in both `User` and `Admin` classes.

**Example:**
```php
if ($user->hasRole("admin")) {
    echo "Access granted.";
} else {
    echo "No access.";
}
```

✅ **Deliverable:** Paste your `HasRole` trait and updated classes.