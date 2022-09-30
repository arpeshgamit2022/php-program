<?php

    //Create Student class
    class Student
    {
        //Define properties
        public $name="Arpesh";
        public $city="Vyara";
        public $age="24";

        public function details()
        {
           echo "Name:".$this->name."<br>";
           echo "City:".$this->city."<br>";
           echo "Age:".$this->age."<br>";
        }
    }

    //Define Worker class
    class Worker
    {
        //Class Properties 
        public $firstname;
        public $lastname;
        public $phone;

        //Constructor and Pass three Parameters
        function __construct($firstname,$lastname,$phone)
        {
            $this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->phone=$phone;
        }

        //Methods
        function introduction()
        {
            echo "My firstname is" . " " . $this->firstname."<br>";
            echo "My lastname is" . " " . $this->lastname."<br>";
            echo "My phone is". " " .$this->phone."<br>";
        }
    }

    class Batsman
    {
        function virat()
        {
            echo "Virat is a good player";
        }

        function rohit()
        {
            echo "Rohit is a captain of india";
        }
    }

    class Bowler extends Batsman
    {
        function rohit()
        {
            echo "Rohit is a opener";
        }
    }

?>