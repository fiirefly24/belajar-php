

## 🧩 Task 3: Late Static Binding (`static::`)

### Create an abstract class `Animal`:
```php
abstract class Animal {
    public static function speak() {
        echo self::class . "\n"; // ❌ Always returns base class
    }

    public static function betterSpeak() {
        echo static::class . "\n"; // ✅ Returns actual child class
    }
}

class Dog extends Animal {}
class Cat extends Animal {}
```

### Test:
```php
Dog::speak();       // Should output "Animal" ❌  
Dog::betterSpeak(); // Should output "Dog" ✅  

Cat::speak();       // Outputs "Animal" ❌  
Cat::betterSpeak(); // Outputs "Cat" ✅  
```

✅ **Deliverable:** Paste your full code and explain why `self::` and `static::` behave differently.

This is exactly how Laravel handles model factories and macros.

