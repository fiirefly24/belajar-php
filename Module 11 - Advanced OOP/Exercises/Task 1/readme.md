## 🧩 Task 1: Use Namespaces

Create two files:

```bash
src/
├── Models/
│   └── User.php
└── Controllers/
    └── UserController.php
```

### In `User.php`:
```php
<?php

namespace App\Models;

class User {
    public function greet() {
        return "Hello from App\Models\User";
    }
}
```

### In `UserController.php`:
```php
<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    public function index() {
        $user = new User();
        echo $user->greet();
    }
}
```

### In `index.php`:
```php
<?php

require_once 'Models/User.php';
require_once 'Controllers/UserController.php';

$controller = new App\Controllers\UserController();
$controller->index();
```

✅ **Expected Output:**  
```
Hello from App\Models\User
```

💡 This mimics how Laravel uses namespaces for models, controllers, etc.

