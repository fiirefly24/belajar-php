## 🧩 Task 2: PSR-4 Autoloading

Create a project structure like this:

```bash
project/
├── composer.json
├── src/
│   └── (same files as above)
└── public/
    └── index.php
```

### Update `composer.json`:
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

Then run:
```bash
composer dump-autoload
```

### Update `public/index.php` to work without manual `require()`:
```php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\UserController;

$controller = new UserController();
$controller->index();
```

✅ If it works → you’ve successfully set up **PSR-4 autoloading**, just like Laravel does!

