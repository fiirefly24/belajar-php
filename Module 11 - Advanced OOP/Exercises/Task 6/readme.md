
## 🧩 Task 6: Repository Pattern

### Create a `UserRepositoryInterface`:
```php
interface UserRepositoryInterface {
    public function find(int $id): ?array;
    public function all(): array;
}
```

### Implement two versions:
- `DatabaseUserRepository`  
- `FileUserRepository`  

### Then write a function that can use either:
```php
function listUsers(UserRepositoryInterface $repo) {
    foreach ($repo->all() as $user) {
        echo $user['name'] . "\n";
    }
}
```

✅ This shows how Laravel decouples data sources from business logic.
