<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class object Program</title>
</head>
<body>
    
<?php

    echo "Using Class Property and object"."<br>";
    //include file of classess
    include "classess.php";

    //Declare object
    $student = new Student;
    //Print all property
    $student->details();
    
    echo "<br>";
    echo "Using Constructor and Methods"."<br>";
    //Class object
    $worker = new Worker("Ankur","Gamit","1425362514");
    //Call method introduction
    $worker->introduction();

?>

</body>
</html>