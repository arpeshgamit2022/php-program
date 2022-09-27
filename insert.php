<?php

    //include connection
    include "connection.php";

    // Start session
    session_start();

    //Creating Empty Array
    $validateErrors = array();

    if (isset( $_POST['submit'] ) )
    {
        //firstname Empty Validation
        if ( empty ( $_POST['firstname'] ) )
        {
            //Store error message in array
            $validateErrors['firstname_error'] = "Firstname is required";
        }
        else
        {
            //Remove whitespaces, slashes and store data
            $fname = stripslashes( trim( $_POST['firstname'] ) );
            //Check if firstname is well-formed
            if ( !preg_match("/(^[^s]|\s)/i",$fname) ) 
            {
                $validateErrors['firstname_error'] = "Please enter valid name";
            }
        }

        //Lastname Empty Validation
        if ( empty ( $_POST['lastname'] ) )
        {
            // Store error message in array
            $validateErrors['lastname_error'] = "Lastname is required";
        }
        else
        {
            //Remove whitespaces, slashes and store data
            $lname = stripslashes( trim( $_POST['lastname'] ) );
        }

        //Email Empty Validation
        if ( empty ( $_POST['email'] ) )
        {
            //Store error message
            $validateErrors['email_error'] = "Email is required";
        }
        else
        {
            //Remove whitespaces, slashes and store data in a variable
            $email = stripslashes( trim( $_POST['email'] ) );
            
            //Check if email is well-formed
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
            {
                //Store error message
                $validateErrors['email_error']="Please enter correct email";
            }
        }

        //Phone Empty Validation
        if ( empty ( $_POST['phone'] ) )
        {
            //Store error message
            $validateErrors['phone_error'] = "Phone is required";
        }
        else
        {
            //Remove whitespaces, slashes and store data in a variable
            $phone = stripslashes( trim( $_POST['phone'] ) );
            
            if ( !preg_match('/^[0-9]{10}+$/', $phone) )
            {
                //store error message
                $validateErrors['phone_error']="Please enter correct phone";
            }
        }

        //Gender Empty Validation
        if ( empty ( $_POST['gender'] ) || !isset ( $_POST['gender'] ) )
        {
            //store error message
            $validateErrors['gender_error'] = "Gender is required";
        }
        else
        {
            //Store data in variable
            $gender = $_POST['gender'];
        }
        //Birthdate Empty Validation
        if ( empty ( $_POST['birthdate'] ) )
        {
            //Store error message
            $validateErrors['birthdate_error'] = "Birthdate is required";
        }
        else
        {
            $birthdate = trim( $_POST['birthdate'] );
            //Convert birthdate in dd/mm/yy format
            $result=explode('-',$birthdate);
            $date=$result[2];
            $month=$result[1];
            $year=$result[0];
            $userDate=$date.'-'.$month.'-'.$year;
            // echo $userDate;
            // $currentDate = new DateTime('today');
            // // echo $currentDate;
            // $interval = $currentDate->diff($userDate);
            // $myage = $interval->y;

            // if ( $myage >= 18 )
            // {
            //     $validateErrors['birthdate_error'] = "Please enter DOB above 18 Years";
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
            $_SESSION['errors_data'] = $validateErrors;

            $_SESSION['firstname'] = $fname;
            $_SESSION['lastname'] = $lname;
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
            $stmt->execute([$fname, $lname, $email, $phone, $gender, $birthdate, $qua, $file_name , $description]);
            
            // if($stmt)
            // {
            //     $_SESSION['insert_data'] = "Data Successfully Inserted";
            // }

            //If successfully inserted data then redirect to this page
            header("Location: /arpesh/employee-database-practical/index.php");
        }
    }

?>