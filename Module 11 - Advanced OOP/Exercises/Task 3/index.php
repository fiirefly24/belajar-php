<?php 

abstract class Animal {
    public static function speak() {
        echo self::class . "\n";
    }

    public static function betterSpeak() {
        echo static::class . "\n";
    }
}

class Dog extends Animal {}
class Cat extends Animal {}

Dog::speak(); 
Dog::betterSpeak();   

Cat::speak();         
Cat::betterSpeak(); 

/**
 * 
 * self::class define it's own class
 * static::class define the current class
 * 
 */
?>