<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructor program</title>
</head>
<body>
    
    <?php

        class Person 
        {
            // first name of person
            private $fname;
            // last name of person
            private $lname;
            
            // Constructor
            public function __construct($fname, $lname) 
            {
                echo "Initialising the object...<br/>"; 
                $this->fname = $fname;
                $this->lname = $lname;
            }
            
            // public method to show name
            public function showName() 
            {
                echo "My name is: " . $this->fname . " " . $this->lname; 
            }
        }

        // creating class object
        $john = new Person("John", "Wick");
        $john->showName();

    ?>

    <h1>Constuctor example</h1>
    <?php
        //Create class Fruit
        class Fruit 
        {
            //Properties of Fruit class
            public $name;
            //Using constructor
            function __construct($name) 
            {
                //initialize object
                $this->name = $name; 
            }

            function getName() 
            {
                return $this->name;
            }

        }
        //Create object and assign value
        $apple = new Fruit("Apple");
        echo $apple->getName();

    ?>

    <h1>Using destructor</h1>

    <?php

        class Person 
        {
            // first name of person
            private $fname;
            // last name of person
            private $lname;
            
            // Constructor
            public function __construct($fname, $lname) 
            {
                echo "Initialising the object...<br/>"; 
                $this->fname = $fname;
                $this->lname = $lname;
            }
            
            // Destructor
            public function __destruct()
            {
                // clean up resources or do something else
                echo "Destroying Object...";
            }
            
            // public method to show name
            public function showName() 
            {
                echo "My name is: " . $this->fname . " " . $this->lname . "<br/>"; 
            }
        }
        
        // creating class object
        $john = new Person("John", "Wick");
        $john->showName();
        
    ?>

</body>
</html>