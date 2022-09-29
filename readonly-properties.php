<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readonly properties program</title>
</head>
<body>

<h1>Readonly Properties</h1>
<?php

    class UserProfile
    {
        //Constructor and define properties
        public function __construct(private string $name, private string $phone)
        {
        }
        //Create changePhone method
        public function changePhone(string $phone)
        {
            $this->phone = $phone;
        }
    }

    class User
    {
        //Using readonly properties
        private readonly string $username;
        private readonly UserProfile $profile;

        //Constructor
        public function __construct(string $username)
        {
            $this->username = $username;
        }

        //Create setProfile method
        public function setProfile(UserProfile $profile)
        {
            $this->profile = $profile;
        }

        //create profile method
        public function profile(): UserProfile
        {
            return $this->profile;
        }
    }

    //Create class object and assign profile to it 
    $user = new User('joe');
    $user->setProfile(new UserProfile('Joe Doe','(408)-555-6666'));

    $user->profile()->changePhone('(408)-999-9999');
    var_dump($user->profile());

?>
    
</body>
</html>