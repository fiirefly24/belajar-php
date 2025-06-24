<?php

class SessionLogger implements SessionHandlerInterface {
    private $logFile;

    public function __construct($logFile = 'sessions.log') {
        $this->logFile = $logFile;
    }

    public function open(string $savePath, string $sessionName) : bool {
        file_put_contents($this->logFile, "[Open] Session started\n", FILE_APPEND);
        return true;
    }

    public function close() : bool {
        file_put_contents($this->logFile, "[Close] Session closed\n", FILE_APPEND);
        return true;
    }

    public function read(string $id) : string {
        file_put_contents($this->logFile, "[Read] Reading session $id\n", FILE_APPEND);
        return '';
    }

    public function write($id, $data): bool {
        file_put_contents($this->logFile, "[Write] Session $id updated\n", FILE_APPEND);
        return true;
    }

    public function destroy($id) : bool {
        file_put_contents($this->logFile, "[Destroy] Session $id destroyed\n", FILE_APPEND);
        return true;
    }

    public function gc($max_lifetime) : int {
        file_put_contents($this->logFile, "[GC] Running garbage collection\n", FILE_APPEND);
        return true;
    }

    public function create_sid() {
        return session_create_id();
    }
}
?>