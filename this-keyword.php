<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this keyword</title>
</head>
<body>

<h1>Using this keyword</h1>
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

    <h1>Using Public Static Keyword</h1>
    <?php

        class MyClass 
        {
            //using public static keyword
            public static $str = "Hello Arpesh!";

            //Create public function
            public static function hello() 
            {
                //Using scope resolution operator
                echo MyClass::$str;
            }
        }
    
        echo MyClass::$str;
        echo "<br>";
        //Call function
        echo MyClass::hello();

    ?>

    <h1>Uisng self and this keyword</h1>
    <?php
        
        class Job 
        {
            // opening for position
            public $name;

            // description for the job;
            public $desc;

            // company name - as the company name stays the same
            public static $company;
            
            // public function to get job name
            public function getName() 
            {
                return $this->name;
            }
            
            // public function to get job description
            public function getDesc() 
            {
                return $this->desc;
            }
            
            // static function to get the company name
            public static function getCompany() 
            {
                return self::$company;
            }
            
            // non-static function to get the company name
            public function getCompany_nonStatic() 
            {
                return self::getCompany();
            }
        }
        
        $objJob = new Job();

        // setting values to non-static variables
        $objJob->name = "Data Scientist";
        $objJob->desc = "You must know Data Science";
        
        /* 
            setting value for static variable.
            done using the class name
        */
        Job::$company = "Studytonight";
        
        // calling the methods
        echo "Job Name: " .$objJob->getName()."<br/>";
        echo "Job Description: " .$objJob->getDesc()."<br/>";

        echo "Company Name: " .Job::getCompany_nonStatic();
    
    ?>

</body>
</html>