<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceess modifiers program</title>
</head>
<body>
    
    <h1>Using Public keyword</h1>
    <?php

        class Studytonight 
        {
            // to store name of Studytonight
            public $url = "studytonight.com";
            
            // simple class method
            function desc() 
            {
                echo "Studytonight helps you learn Coding.";
            }
        }

        $appu = new Studytonight();
        echo $appu->url."</br>";
        $appu->desc();
        echo "</br>";

        //Public example
        class MyClass 
        {
            public $number;
        }
          
        $obj = new MyClass();
        $obj->number = 5;
        echo "The number is " . $obj->number;

    ?>

    <h1>Private Access Modifier</h1>
    <?php
    
        class Person 
        {
            // first name of person
            private $name;
            
            // public function to set value for name (setter method)
            public function setName($name) 
            {
                $this->name = $name;
            }
            
            // public function to get value of name (getter method)
            public function getName() 
            {
                return $this->name;
            }
        }
        
        // creating class object
        $john = new Person();
        
        // calling the public function to set fname
        $john->setName("John Wick");
        
        // getting the value of the name variable
        echo "My name is " . $john->getName();

    ?>

    <h1>Private example</h1>

    <?php
 
        class Car 
        {
            //using private keyword
            private $model;
            
            //the public access modifier allows the access to the method from outside the class
            public function setModel($model)
            {
                $this -> model = $model;
            }
            
            public function getModel()
            {
                return "The car model is  " . $this -> model;
            }
        }
        //Create object
        $mercedes = new Car();

        //Sets the car’s model
        $mercedes -> setModel("Mercedes benz");

        //Gets the car’s model
        echo $mercedes -> getModel();
 
    ?>

</body>
</html> 