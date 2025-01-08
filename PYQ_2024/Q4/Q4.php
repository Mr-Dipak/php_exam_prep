<?php

    interface CanFly{
        function fly();
    }

    abstract class Animal {
        private String $name;
        
        public function __construct(string $name){
            $this->name = $name;
        }
       
        abstract public function sound();

        public function getName(){
            return $this->name;
        }
    }

    class Bird extends Animal implements CanFly{

        public function __construct(string $name){
            parent:: __construct($name);
        }

        public function sound(){
            echo($this->getName()." chirps");
        }    
        
        public function fly(){
            echo($this->getName()." canFly");

        }

    }

    class Dog extends Animal{

        public function __construct(string $name){
            parent::__construct($name);
        }

        public function sound(){
            echo($this->getName()." Bark");        
        }
    }


    $bird = new Bird("Sparrow");
    $bird->sound();
    $bird->fly();

    echo("<br>");

    $dog = new Dog("Tommy");
    $dog->sound();