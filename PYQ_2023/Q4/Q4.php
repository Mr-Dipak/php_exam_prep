<?php
// Q4.php content
// Abstract class example
abstract class Animal {
    // Abstract method (does not have a body)
    abstract protected function makeSound();

    // Regular method
    public function sleep() {
        echo "Sleeping\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark\n";
    }

    public function sound() {
        $this->makeSound();
    }
}

$dog = new Dog();
$dog->makeSound(); // Outputs: Bark
$dog->sleep(); // Outputs: Sleeping

// Interface example
interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

class Car implements Vehicle {
    public function startEngine() {
        echo "Engine started\n";
    }

    public function stopEngine() {
        echo "Engine stopped\n";
    }
}

$car = new Car();
$car->startEngine(); // Outputs: Engine started
$car->stopEngine(); // Outputs: Engine stopped
?>