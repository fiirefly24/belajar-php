
## 🧩 Task 7: Build a Simple Service Container

Build a basic version of Laravel's service container:

```php
class Container {
    private array $bindings = [];

    public function bind(string $key, callable $resolver) {
        $this->bindings[$key] = $resolver;
    }

    public function make(string $key): mixed {
        if (!isset($this->bindings[$key])) {
            throw new Exception("No binding for $key");
        }
        return ($this->bindings[$key])();
    }
}
```

### Example Usage:
```php
$container = new Container();

$container->bind('logger', fn() => new Logger());
$container->bind('config', fn() => loadConfig());

$logger = $container->make('logger');
$logger->log("App started");
```

✅ This mimics Laravel’s core dependency injection system.