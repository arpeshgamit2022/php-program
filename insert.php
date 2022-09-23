<?php

    include "connection.php";
    session_start();

    $validateErrors = array();

    if( isset($_POST['submit']) )
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        //firstname Validation
        if ( empty ( $_POST['firstname'] ) )
        {
            $validateErrors['firstname_error'] = "Firstname is required";
        }
        else
        {
            $fname = htmlspecialchars( stripslashes( trim( $_POST['firstname'] ) ) );
        }
        //Lastname Validation
        if ( empty ( $_POST['lastname'] ) )
        {
            $validateErrors['lastname_error'] = "Lastname is required";
        }
        else
        {
            $lname = htmlspecialchars( stripslashes( trim( $_POST['lastname'] ) ) );
        }
        //Email Validation
        if ( empty ( $_POST['email'] ) )
        {
            $validateErrors['email_error'] = "Email is required";
        }
        else
        {
            $email = htmlspecialchars( stripslashes( trim( $_POST['email'] ) ) );
            
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
            {
                $validateErrors['email_error']="Please enter correct email";
            }
        }
        //Phone Validation
        if ( empty ( $_POST['phone'] ) )
        {
            $validateErrors['phone_error'] = "Phone is required";
        }
        else
        {
            $phone = htmlspecialchars( stripslashes( trim( $_POST['phone'] ) ) );
            
            if ( !preg_match('/^[0-9]{10}+$/', $phone) )
            {
                $validateErrors['phone_error']="Please enter correct phone";
            }
        }
        //Gender Validation
        if ( empty ( $_POST['gender'] ) || !isset ( $_POST['gender'] ) )
        {
            $validateErrors['gender_error'] = "Gender is required";
        }
        else
        {
            $gender = $_POST['gender'];
        }
        //Birthdate Validation
        if ( empty ( $_POST['birthdate'] ) )
        {
            $validateErrors['birthdate_error'] = "Birthdate is required";
        }
        else
        {
            $birthdate = htmlspecialchars( stripslashes( trim( $_POST['birthdate'] ) ) );
            //today's date
            $currentDate = date( "d-m-Y" );

            $entrantAge = new DateTime( $birthdate );
            $currentDate = new DateTime( $currentDate );

            $interval = $entrantAge->diff( $currentDate );
            $myage = $interval->y;

            if ( $myage >= 18 )
            {
                $validateErrors['birthdate_error'] = "Please enter DOB above 18 Years";
            }
        }
        //Qualification Validation
        if ( empty ( $_POST['qualification'] ) || !isset ( $_POST['qualification'] ) )
        {
            $validateErrors['qualification_error'] = "Qualification is required";
        }
        else
        {
            $qualification = $_POST['qualification'];
            $qua = implode (',', $qualification);
        }
        //Photo Validation
        if ( isset( $_FILES['photo'] ) )
        {
            $file_name = $_FILES['photo']['name'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_type = $_FILES['photo']['type'];
            $file_ext = strtolower( end( explode( '.', $_FILES['photo']['name'] ) ) );
            
            $extensions = array( "jpeg","jpg","png" ); 
            
            if ( in_array( $file_ext,$extensions ) === false)
            {
               $validateErrors['file_allowed'] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if ( $file_size > 2097152 )  
            {
               $validateErrors['file_size'] = 'File size must be excately 2 MB';
            }
            
            if ( empty( $validateErrors ) == true) 
            { 
               move_uploaded_file( $file_tmp,"uploads/".$file_name );

            }

            if (file_exists($file_ext)) 
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
            $description = htmlspecialchars( stripslashes( trim( $_POST['description'] ) ) );
        }

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
            $_SESSION['file_name'] = $file_ext;
            $_SESSION['description'] = $description;

            header("Location: /arpesh/employee-database-practical/addEmployee.php");
        }
        else
        {
            $insertQuery = "INSERT INTO emp (firstname, lastname, email, phone, gender, birthdate, qualification, photo, description) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt= $pdo->prepare($insertQuery);
            $stmt->execute([$fname, $lname, $email, $phone, $gender, $birthdate, $qua, $file_ext , $description]);
            
            header("Location: /arpesh/employee-database-practical/addEmployee.php");

            if($stmt)
            {
                $_SESSION['insert_data'] = "Data Successfully Inserted";
            }
            
            // $validateErrors['insert_data'] = "Data Successfully Inserted";
        }
    }

?>