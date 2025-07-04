<?php

class FileUserRepository implements UserRepositoryInterface {
    public function all(): array {
        $file = fopen("users.csv", "r");
        $users = [];

        while (($data = fgetcsv($file)) !== false) {
            $users[] = [
                'id' => $data[0],
                'name' => $data[1],
                'email' => $data[2]
            ];
        }

        fclose($file);
        return $users;
    }

    public function find(int $id): ?array {
        $users = $this->all();
        return $users[$id - 1] ?? null; // CSV index starts at 0
    }
}
?>