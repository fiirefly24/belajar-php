
## 🧩 Task 5: Factory Pattern

### Create a `ModelFactory` class that dynamically creates models:
```php
class ModelFactory {
    public static function make(string $type): ?object {
        $className = "App\\Models\\" . ucfirst($type);
        if (class_exists($className)) {
            return new $className();
        }
        return null;
    }
}
```

### Test it:
```php
$user = ModelFactory::make('user');
if ($user) {
    echo $user->greet();
} else {
    echo "Model not found.";
}
```

✅ This mimics how Laravel's Eloquent model factory works.

