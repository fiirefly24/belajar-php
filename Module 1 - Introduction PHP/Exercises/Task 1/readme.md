## Task 1: Environment Setup  

- Install **XAMPP** or set up a Docker-based PHP environment (e.g., `php:8.1-apache`).  
- Verify installation using:

```bash
php -v
```

- Create a file named `info.php` inside `htdocs` or your Docker www directory with:

```php
<?php
phpinfo();
?>
```

- Open it in your browser: [http://localhost/info.php](http://localhost/info.php) and confirm the page loads.

✅ **Deliverable**: Paste the output line showing the PHP version and loaded configuration file (`Loaded Configuration File`).

---