<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private program</title>
</head>
<body>
    
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