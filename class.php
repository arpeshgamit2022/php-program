<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class program</title>
</head>
<body>

    <h1>Using class and object</h1>
    <?php
        //Create class
        class Person
        {
            //Store name of person
            var $name;

            //Print name using get
            function get_name()
            {
                //$this keyword use for access
                return $this->name;
            }

            function set_name($new_name)
            {
                $this->name = $new_name;
            }
        }

        //Fruit class
        class Fruit 
        {
            // Properties
            public $name;
            public $color;
          
            // Methods using getter and setter function
            function set_name($name) 
            {
              $this->name = $name;
            }

            function get_name() 
            {
              return $this->name;
            }

        }
            //Create object
            $apple = new Fruit();
            $banana = new Fruit();
            
            $apple->set_name('Apple');
            $banana->set_name('Banana');
            
            //Print the value using get_name
            echo $apple->get_name();
            echo "<br>";
            echo $banana->get_name();
          
        //Define a Class without any Variable
        class Human 
        {
            // for male
            function male() 
            {
                echo "This human is a male";
            }
            
            function female() 
            {
                echo "This human is a female";
            }
            
        }

    ?>

</body>
</html>