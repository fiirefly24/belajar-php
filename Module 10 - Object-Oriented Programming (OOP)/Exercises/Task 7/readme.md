## 🧩 Task 7: Singleton Pattern

Create a `Database` class using the **Singleton** pattern:
- Only one instance should exist  
- Add a method `connect()` → echoes `"Connected!"`  

**Test:**
```php
$db1 = Database::getInstance();
$db2 = Database::getInstance();
var_dump($db1 === $db2); // Should be true
```

This is used heavily in Laravel for services like `DB::connection()`.

✅ **Deliverable:** Paste your full Singleton class and test output.