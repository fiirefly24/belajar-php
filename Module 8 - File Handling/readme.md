# 🚀 Module 8: File Handling – Read, Write, Upload & Archive  
## Master Everything About Working with Files in PHP  

### 🎯 Goal  
Understand how to securely and efficiently work with files in PHP:
- Reading and writing files (`file_get_contents()`, `file_put_contents()`)  
- Uploading files safely  
- Directory handling  
- File locking (`flock()`)  
- Stream contexts (`fopen()` with custom headers)  
- Serialization (`serialize()` / `unserialize()`)  
- ZIP archive creation with `ZipArchive`  

This is especially important for Laravel apps that handle uploads, logs, config files, or caching.

Let’s dive in!

---

### 🧠 Topics Covered  
- Reading and Writing Files  
- Opening Modes: `r`, `w`, `a`, etc.  
- `file_get_contents()` vs `file_put_contents()`  
- Uploading Files Securely  
- Directory Handling  
- File Locking with `flock()`  
- Stream Contexts with `fopen()`  
- Serialization (`serialize()` / `unserialize()`)  
- ZIP Archive Creation with `ZipArchive`  

---

### 💡 Pro Tips Before We Dive In  
- Always validate and sanitize uploaded files — never trust user input.  
- Use `file_put_contents()` for simple writes, `fopen()` for large files.  
- Prefer `ZipArchive` over shell commands for cross-platform safety.  
- Use file locking when multiple users might write the same file.  
- Store uploads outside of public directory if possible — use PHP to serve them securely.  
- Never use user-provided filenames directly — always rename/sanitize.  

---

## 1. Reading and Writing Files

PHP offers several ways to read/write files:

🔹 **`file_get_contents()`** – Read Entire File as String  
```php
$content = file_get_contents('data.txt');
echo $content;
```

---

🔹 **`file_put_contents()`** – Write to a File (Simple!)  
```php
file_put_contents('data.txt', "Hello World");
```

✅ These are great for small files like logs, config, or cache.

---

## 2. Opening Modes: `r`, `w`, `a`, etc.

| Mode | Description |
|------|-------------|
| `r`  | Read only from start |
| `r+` | Read and write |
| `w`  | Truncate and write (or create) |
| `w+` | Read/write (truncates existing) |
| `a`  | Append to end (doesn’t erase file) |
| `a+` | Read/append |
| `x`  | Create and write (fails if file exists) |

Example:
```php
$handle = fopen("log.txt", "a+");
fwrite($handle, "Log entry\n");
fclose($handle);
```

Use `fopen()` when you need control over reading/writing position.

---

## 3. `file_get_contents()` vs `file_put_contents()`

✅ Best for:
- Small files  
- Quick read/write operations  
- Caching  
- Logging  

```php
$data = file_get_contents('data.txt');
file_put_contents('data.txt', 'New content');
```

These functions are clean and readable — perfect for config files or simple logging.

---

## 4. Uploading Files Securely

Basic HTML form:
```html
<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <button type="submit">Upload</button>
</form>
```

In PHP:
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['upload'])) {
        $name = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];

        // Move uploaded file
        move_uploaded_file($tmp_name, "uploads/" . basename($name));
    }
}
```

⚠️ **Security Rules:**
- Check `is_uploaded_file()` before moving  
- Sanitize filename: `basename($name)` removes path info  
- Set max size in `php.ini`: `upload_max_filesize`, `post_max_size`  
- Restrict extensions (e.g., only `.jpg`, `.png`)  
- Use random names instead of user-provided ones  

# 🔐 The 5 Key Rules for Secure File Uploads  
## With Full Example  

We'll build a complete script that:
- Accepts only `.jpg`, `.png`, `.gif` files  
- Uses random names  
- Checks MIME type  
- Prevents path traversal attacks  
- Moves file safely  

---

## ✅ Rule 1: `is_uploaded_file()` – Ensure It’s a Real Upload

```php
if (!is_uploaded_file($_FILES['upload']['tmp_name'])) {
    die("Invalid upload");
}
```

💡 **Why?**  
To make sure the file came from an actual upload — not a fake request or local file inclusion attack.

---

## ✅ Rule 2: Sanitize Filename with `basename()` + Use Random Name

```php
$originalName = $_FILES['upload']['name'];
$cleanName = basename($originalName); // Removes path info like ../../evil.php
```

Then generate a unique name:
```php
$extension = strtolower(pathinfo($cleanName, PATHINFO_EXTENSION));
$newName = uniqid('file_', true) . '.' . $extension;
```

💡 **Why?**
- User might try to overwrite files by uploading `../../../../config.php`  
- Using `basename()` stops that  
- Using `uniqid()` avoids overwriting existing files  

---

## ✅ Rule 3: Set Max Upload Size in `php.ini`

This is set in your `php.ini` file (not in code):

```ini
; In php.ini
upload_max_filesize = 2M
post_max_size = 8M
```

You can also check file size in PHP:

```php
if ($_FILES['upload']['size'] > 2 * 1024 * 1024) {
    die("File too large");
}
```

💡 **Why?**
- `upload_max_filesize`: Limits individual file size  
- `post_max_size`: Limits total POST data size  
- Make sure `post_max_size > upload_max_filesize` (so upload fits in POST)

---

## ✅ Rule 4: Restrict Extensions & MIME Types

```php
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

if (!in_array($extension, $allowedExtensions)) {
    die("Extension not allowed");
}

// Optional: Check real MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $_FILES['upload']['tmp_name']);
finfo_close($finfo);

$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

if (!in_array($mimeType, $allowedMimeTypes)) {
    die("Only images are allowed");
}
```

💡 **Why?**
- Just checking extension isn't enough — someone could rename `shell.php` to `photo.jpg`  
- Using `finfo_file()` ensures it's really an image  

---

## ✅ Rule 5: Use Random Names

As above:

```php
$newName = uniqid('img_', true) . '.' . $extension;
$uploadPath = "uploads/" . $newName;
```

💡 **Why?**
- Avoids conflicts  
- Prevents users from guessing filenames  
- Makes it harder for attackers to inject scripts  

---

## 🧪 Final Version – Secure Upload Script

### 👇 HTML Form (`upload.html`)
```html
<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <button type="submit">Upload</button>
</form>
```

---

### 👇 PHP Handler (`process.php`)

```php
<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_FILES['upload']) || $_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file");
    }

    $tmp_name = $_FILES['upload']['tmp_name'];
    $originalName = $_FILES['upload']['name'];

    // Rule 1: is_uploaded_file()
    if (!is_uploaded_file($tmp_name)) {
        die("Invalid upload");
    }

    // Rule 2: Sanitize filename
    $cleanName = basename($originalName);
    $extension = strtolower(pathinfo($cleanName, PATHINFO_EXTENSION));

    // Rule 3: Allowed extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extension, $allowedExtensions)) {
        die("Only JPG, PNG, and GIF allowed");
    }

    // Rule 4: Validate MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $tmp_name);
    finfo_close($finfo);

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) {
        die("Only image files are allowed");
    }

    // Rule 5: Generate unique name
    $newName = uniqid('img_', true) . '.' . $extension;
    $uploadPath = "uploads/" . $newName;

    // Move file
    if (move_uploaded_file($tmp_name, $uploadPath)) {
        echo "✅ Uploaded as: $newName";
    } else {
        echo "❌ Upload failed";
    }
}
?>
```

---

## 📋 Summary Table – Why Each Step Matters

| Rule | Code Used | Purpose |
|------|-----------|---------|
| 1. Is uploaded file | `is_uploaded_file($tmp_name)` | Prevent fake uploads |
| 2. Clean filename | `basename()` | Stop directory traversal |
| 3. Allowed extensions | `pathinfo(..., PATHINFO_EXTENSION)` | No executable files |
| 4. MIME validation | `finfo_file()` | Confirm it's actually an image |
| 5. Random name | `uniqid()` | Avoid overwrite + improve security |

Let me know if you want this as a downloadable `.md` file or combined with Module 8!

---

## 5. Directory Handling

Use these functions to manage folders:

🔹 **Create a Folder**  
```php
mkdir("uploads", 0777, true); // Recursive
```

---

🔹 **Scan a Folder**  
```php
$files = scandir("uploads/");
print_r($files);
```

---

🔹 **Delete a File**  
```php
unlink("uploads/file.txt");
```

---

🔹 **Rename a File**  
```php
rename("old.txt", "new.txt");
```

Useful for managing uploads or generated reports.

---

## 6. File Locking with `flock()`

Used to prevent race conditions when multiple scripts try to write to the same file.
```php
$handle = fopen("log.txt", "a");

if (flock($handle, LOCK_EX)) {
    fwrite($handle, "Log entry\n");
    flock($handle, LOCK_UN); // Unlock
}

fclose($handle);
```

Use this in cron jobs, logs, or shared data files.

---

## 7. Stream Contexts with `fopen()`

Allows advanced options like headers, timeouts, and protocols.
```php
$opts = [
    'http' => [
        'method' => 'GET',
        'header' => "User-Agent: MyScript\r\n"
    ]
];

$context = stream_context_create($opts);
$content = file_get_contents('http://example.com', false, $context);
```

Also useful for working with remote APIs or protected files.

---

## 8. Serialization – Save Data to File

Store complex data (like arrays) in a file:
```php
$data = ['user' => 'Ammad', 'role' => 'developer'];
file_put_contents('data.txt', serialize($data));

// Later...
$loaded = unserialize(file_get_contents('data.txt'));
print_r($loaded);
```

Useful for caching, but prefer JSON for readability:
```php
file_put_contents('data.json', json_encode($data));
$data = json_decode(file_get_contents('data.json'), true);
```

---

## 9. ZIP Archive Creation with `ZipArchive`

Create ZIP files on the fly:
```php
$zip = new ZipArchive();
$zip->open('my-archive.zip', ZipArchive::CREATE);

$zip->addFile('file1.txt', 'file1.txt');
$zip->addFile('file2.txt', 'file2.txt');

$zip->close();
```

You can also extract ZIPs:
```php
$zip = new ZipArchive();
if ($zip->open('my-archive.zip')) {
    $zip->extractTo('extracted/');
    $zip->close();
}
```

Perfect for generating downloadable reports or backups.
