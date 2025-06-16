## 🧩 Task 4: Refactor to Use Guard Clauses  

Refactor the following nested code using guard clauses:

```php
function checkAccess($user, $role) {
    if ($user->isLoggedIn()) {
        if ($user->hasRole($role)) {
            echo "Access granted.";
        } else {
            echo "Insufficient role.";
        }
    } else {
        echo "Not logged in.";
    }
}
```

✅ **Deliverable**: Paste your refactored version using early returns and guard clauses.