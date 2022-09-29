<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>final keyword program</title>
</head>
<body>
    
<?php

    //Create final class
    final class Base 
    {
        // Final method
        final function printdata() 
        {
            echo "final base class final method";
            echo "<br>";
        }
            
        // Non final method
        function nonfinal() 
        {
            echo "\nnon final method of final base class";
        }
    }
    
    //Create class object and call method
    $obj = new Base;
    $obj->printdata();
    $obj->nonfinal();

?>

</body>
</html>