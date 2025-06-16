## 🧩 Task 2: Match vs Switch  

Convert this `switch` statement into a `match` expression:

```php
$role = "admin";

switch ($role) {
    case "admin":
        echo "Full access granted.";
        break;
    case "editor":
        echo "Limited editing access.";
        break;
    default:
        echo "No access.";
}
```

Then **explain why `match` is better in this case**.

✅ **Deliverable**: Paste your `match` version and explanation.