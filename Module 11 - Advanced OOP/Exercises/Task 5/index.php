<?php 

require_once __DIR__.'/vendor/autoload.php';

class ModelFactory {
    public static function make(string $type): ?object {
        $className = "App\\Models\\" . ucfirst($type);
        if (class_exists($className)) {
            return new $className();
        }
        return null;
    }
}

$user = ModelFactory::make('user');
if ($user) {
    echo $user->greet();
} else {
    echo "Model not found.";
}
?>