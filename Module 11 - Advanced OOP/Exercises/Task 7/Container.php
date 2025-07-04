<?php

class Container {
    private array $bindings = [];

    // Store a resolver function under a key
    public function bind(string $key, callable $resolver): void {
        $this->bindings[$key] = $resolver;
    }

    // Get resolved instance
    public function make(string $key): mixed {
        if (!isset($this->bindings[$key])) {
            throw new Exception("No binding found for $key");
        }

        return ($this->bindings[$key])(); // Execute resolver
    }
}
?>