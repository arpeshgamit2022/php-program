<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object program</title>
</head>
<body>
    
    <h1>Create an Object of a Class</h1>
    <?php

        class Studytonight 
        {
            // Variable with a default value
            var $url = "studytonight.com";
            
            // Simple class method
            function desc() 
            {
                echo "Studytonight helps you learn Coding.";
            }
        }

        // Creating class object
        $obj = new Studytonight();

        // Accessing class variable
        echo $obj->url . "<br/>";

        // Calling class method
        $obj->desc();

    ?>

    <h1>Accessing Class Variables and Methods</h1>
    <?php

        //Create class Student
        class Student 
        {
            // First name of Student
            var $fname;
            // Last name of Student
            var $lname;
            
            function showName() 
            {
                echo "My name is: " . $this->fname . " " . $this->lname;
            }
        }
        
        // creating class object
        $arpesh = new Student();

        // assigning values to variables
        $arpesh->fname = "Arpesh";
        $arpesh->lname = "Gamit";

        // calling the method function
        $arpesh->showName();

    ?>

    <h1>Create multiple object of a class and assign different values</h1>

    <?php

        class Employee 
        {
            // First name of Employee
            var $fname;

            // Last name of Employee
            var $lname;
            
            function showName() 
            {
                echo "My name is: " . $this->fname . " " . $this->lname;
            }
        }
        
        // Creating class object
        $nimesh = new Employee();

        // Assigning values to variables
        $nimesh->fname = "Nimesh";
        $nimesh->lname = "Gamit";

        // Calling the method function
        $nimesh->showName();
        echo "<br/>";
        
        // Creating class object
        $james = new Employee();

        // Assigning values to variables
        $james->fname = "James";
        $james->lname = "Bond";

        // Calling the method function
        $james->showName();

    ?>

</body>
</html>