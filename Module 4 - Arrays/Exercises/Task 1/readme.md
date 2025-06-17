## 🧩 Task 1: Basic Array Manipulation  

Given this array:

```php
$people = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30],
    ["name" => "Charlie", "age" => 20]
];
```

Use `array_map()` to add a `"status"` field:
- If `age ≥ 25` → `"approved"`  
- Else → `"pending"`  

**Expected Output:**
```php
[
    ["name" => "Alice", "age" => 25, "status" => "approved"],
    ["name" => "Bob", "age" => 30, "status" => "approved"],
    ["name" => "Charlie", "age" => 20, "status" => "pending"]
]
```

✅ **Deliverable**: Paste your PHP code.