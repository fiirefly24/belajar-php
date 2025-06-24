## 🧩 Task 5: Custom Session Handler (Bonus Challenge)

Create a simple class that logs session start and end to a file.

```php
class FileSessionLogger {
    private $logFile;

    public function __construct($logFile = 'sessions.log') {
        $this->logFile = $logFile;
    }

    public function open($savePath, $sessionName) {
        file_put_contents($this->logFile, "Session opened\n", FILE_APPEND);
        return true;
    }

    public function close() {
        file_put_contents($this->logFile, "Session closed\n", FILE_APPEND);
        return true;
    }

    public function read($id) {
        return '';
    }

    public function write($id, $data) {
        file_put_contents($this->logFile, "Session written: $id\n", FILE_APPEND);
        return true;
    }

    public function destroy($id) {
        file_put_contents($this->logFile, "Session destroyed: $id\n", FILE_APPEND);
        return true;
    }

    public function gc($max_lifetime) {
        return true;
    }
}

$handler = new FileSessionLogger();
session_set_save_handler($handler);
session_start();

$_SESSION['user'] = 'Ammad';
```

This logs session activity without saving real data.

✅ **Deliverable**: Paste your full working example.