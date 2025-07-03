## 🧩 Task 4: Interface

Create an interface `Authenticatable`:

```php
interface Authenticatable {
    public function getId(): int;
    public function getRoles(): array;
}
```

Make your `User` and `Admin` classes implement this interface.  
Set fake roles like:

```php
$user->roles = ["user"];
$admin->roles = ["admin", "user"];
```

Then test with a function:

```php
function checkAccess(Authenticatable $user) {
    echo "User ID: " . $user->getId() . "\n";
    echo "Roles: " . implode(", ", $user->getRoles()) . "\n";
}
```

✅ **Deliverable:** Paste your interface, updated classes, and test output.
