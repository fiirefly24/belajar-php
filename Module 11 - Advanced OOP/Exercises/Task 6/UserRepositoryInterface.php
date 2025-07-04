<?php

interface UserRepositoryInterface {
    public function all(): array;
    public function find(int $id): ?array;
}
?>