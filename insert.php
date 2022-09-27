<?php

    //include connection
    include "connection.php";

    // Start session
    session_start();

    //Creating Empty Array
    $validateErrors = array();

    if (isset( $_POST['submit'] ) )
    {
        //Remove slashes, whitespaces and store data
        $firstName = stripslashes( trim($_POST['firstname']) );
        $lastName = stripslashes( trim($_POST['lastname']) );
        $email = stripslashes( trim($_POST['email']) );
        $phone = stripslashes( trim($_POST['phone']) );
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];

        //Check firstname empty or not Validation and store error message
        if ( empty ( $firstName ) )
        {
            $validateErrors['firstnameError'] = "Firstname is required";
        }

        //Check Lastname empty or not Validation and store error message
        if ( empty ( $_POST['lastname'] ) )
        {
            $validateErrors['lastnameError'] = "Lastname is required";
        }

        //Check email empty or not Validation and store error message
        if ( empty ( $_POST['email'] ) )
        {
            $validateErrors['emailError'] = "Email is required";
        }
        else
        {
            //Check if email is well-formed and store error message
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
            {
                $validateErrors['emailError']="Please enter correct email";
            }
        }

        //Check phone empty or not Validation and store error message
        if ( empty ( $_POST['phone'] ) )
        {
            $validateErrors['phoneError'] = "Phone is required";
        }
        else
        {
            //Check if phone is well-formed and store error message
            if ( !preg_match('/^[0-9]{10}+$/', $phone) )
            {
                $validateErrors['phoneError']="Please enter correct phone";
            }
        }

        //Check gender empty or not Validation and check set or not
        if ( empty ( $_POST['gender'] ) || !isset ( $_POST['gender'] ) )
        {
            $validateErrors['genderError'] = "Gender is required";
        }
        
        //Check phone empty or not Validation and store error message
        if ( empty ( $_POST['birthdate'] ) )
        {
            $validateErrors['birthdateError'] = "Birthdate is required";
        }
        else
        {
            // $userDate = date_create ("d-m-Y", strtotime($birthdate) );  
            $d='31';
            $m='11';
            $y='05';

            If(!checkdate($d,$m,$y))
            {
                $validateErrors['birthdateError'] = "Birthdate is invalid";
            }

            //Convert birthdate in d/m/Y format
            // $userDate = date_create ("d-m-Y", strtotime($birthdate) );  
            // // echo $userDate;
            // echo gettype($userDate)."\n";

            // $d = DateTime::createFromFormat($birthdate);
            // echo $d;
            // $d && $d->format('d-m-y') === $birthdate;
        
            // $currentDate = date_create("d-m-Y");

            // // echo $currentDate;es
            // echo gettype($currentDate)."\n";
            // // // echo $currentDate;
            // $result = $currentDate->diff($userDate);

            // echo $result->format('%y');

            // $interval = date_diff($currentDate, $userDate);
            // echo $interval->format("%y");

            // $dateofBirth = $interval->y;
            // if ( $dateofBirth >= 18 )
            // {
            //     $validateErrors['birthdateError'] = "Please enter DOB above 18 Years";
            // }
        }
        //Qualification Empty Validation
        if ( empty ( $_POST['qualification'] ) || !isset ( $_POST['qualification'] ) )
        {
            //Store error message
            $validateErrors['qualification_error'] = "Qualification is required";
        }
        else
        {
            $qualification = $_POST['qualification'];
            //Return string from an array using implode function
            $qua = implode (',', $qualification);
        }
        //Photo Validation
        //check whether Variable is set or not
        if ( isset( $_FILES['photo'] ) )
        {
            $file_name = $_FILES['photo']['name'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_type = $_FILES['photo']['type'];
            //Store image type like png,jpeg
            $file_ext = strtolower( end( explode( '.', $_FILES['photo']['name'] ) ) );
            
            $extensions = array( "jpeg","jpg","png" ); 
            //Match file type both are same or not
            if ( in_array( $file_ext,$extensions ) === false)
            {
               $validateErrors['file_allowed'] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            //Match file size with 2097152 
            if ( $file_size > 2097152 )  
            {
               $validateErrors['file_size'] = 'File size must be excately 2 MB';
            }
            //Condition true then store in uploads file
            if ( empty( $validateErrors ) == true) 
            { 
               move_uploaded_file( $file_tmp,"uploads/".$file_name );
            }
            //Check file exists or not
            if (file_exists($file_name)) 
            {
                $validateErrors['file_error'] = 'File is already exists';
            } 
            else
            {
               print_r( $validateErrors );
            }
        }
        
        //Description Validation
        if ( empty ( $_POST['description'] ) )
        {
            $validateErrors['description_error'] = "Description is required";
        }
        else
        {
            $description = stripslashes( trim( $_POST['description'] ) );
        }
        //If not empty then store in session
        if(!empty($validateErrors))
        {
            $_SESSION['errorsData'] = $validateErrors;

            $_SESSION['firstname'] = $firstName;
            $_SESSION['lastname'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['gender'] = $gender;
            $_SESSION['birthdate'] = $birthdate;
            $_SESSION['qualification'] = $qualification;
            $_SESSION['file_name'] = $file_name;
            $_SESSION['description'] = $description;
            //Redirect to this page
            header("Location: /arpesh/employee-database-practical/addEmployee.php");
        }
        else
        {
            //Insert data in the database using insert query
            $insertQuery = "INSERT INTO emp (firstname, lastname, email, phone, gender, birthdate, qualification, photo, description) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt= $pdo->prepare($insertQuery);
            $stmt->execute([$firstName, $lastName, $email, $phone, $gender, $birthdate, $qua, $file_name , $description]);
            
            // if($stmt)
            // {
            //     $_SESSION['insert_data'] = "Data Successfully Inserted";
            // }

            //If successfully inserted data then redirect to this page
            // header("Location: /arpesh/employee-database-practical/index.php");
        }
    }

?>