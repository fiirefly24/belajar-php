<?php

class DatabaseUserRepository implements UserRepositoryInterface {
    private array $users = [
        1 => ['id' => 1, 'name' => 'Ammad', 'email' => 'ammad@example.com'],
        2 => ['id' => 2, 'name' => 'John', 'email' => 'john@example.com']
    ];

    public function all(): array {
        return $this->users;
    }

    public function find(int $id): ?array {
        return $this->users[$id] ?? null;
    }
}
?>