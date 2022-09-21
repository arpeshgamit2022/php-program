<?php

    include "connection.php";
    session_start();

    $validateErrors = array();

    function input_data($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    if( isset($_POST['submit']) )
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        $fname = input_data($_POST['firstname']);
        $lname = input_data($_POST['lastname']);
        $email = input_data($_POST['email']);
        //Email validation
        function checkemail($str) 
        {
            return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
        if(!checkemail($email) )
        {
            $validateErrors['email_error']="Please enter correct email";

        }

        $phone = input_data($_POST['phone']);
        //Phone number Validation
        function valid_phone($phone)
        {
            return preg_match('/^[0-9]{10}+$/', $phone);
        }
        if(!valid_phone($phone))
        {
            $validateErrors['phone_error']="Please enter correct phone";
        }
        
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // die;
        $gender = $_POST['gender'];

        $birthdate = input_data($_POST['birthdate']);
        //Birthdate Validation
        function validateDOB($birthdate)
        {
            $maxAge=strtotime("+18 YEAR");
            $entrantAge= strtotime($birthdate);

        if ($entrantAge < $maxAge)
        {   
            return false;
        }
            return true;
        }

        if(!validateDOB($birthdate))
        { 
            $validateErrors['birthdate_error']="Please enter DOB above 18 Years";
        }

        $qualification = $_POST['qualification'];
        // echo "<pre>";
        // print_r($qualification);
        // echo "</pre>";
        $qua = implode (',', $qualification);

        // echo "<pre>";
        // print_r($qua);
        // echo "</pre>";
        // die;
        
        if(isset($_FILES['photo']))
        {
            $file_name = $_FILES['photo']['name'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_type = $_FILES['photo']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false)
            {
               $validateErrors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152) 
            {
               $validateErrors[]='File size must be excately 2 MB';
            }
            
            if(empty($validateErrors)==true) 
            {
               move_uploaded_file($file_tmp,"uploads/".$file_name);
            //    echo "Success";
            }
            else
            {
               print_r($validateErrors);
            }
        }

        $description = input_data($_POST['description']);

        if ( empty ( $_POST['firstname'] ) )
        {
            $validateErrors['firstname_error'] = "Firstname is required";
            // $oldData['first_name'] = $_POST['firstname'];
        }
        elseif ( empty ( $_POST['lastname'] ) )
        {
            $validateErrors['lastname_error']="Lastname is required";
        }
        elseif ( empty ( $_POST['email'] ) ) 
        {   
            $validateErrors['email_error']="Email is required";
        }
        elseif ( empty ( $_POST['phone'] ) )
        {
            $validateErrors['phone_error']="Phone is required";
        }
        elseif ( !isset( $_POST['gender'] ) )
        {
            $validateErrors['gender_error']="Gender is required";
        }   
        // elseif ( empty ( $_POST['gender'] ) 
        // {
        //     $validateErrors['gender_error']="Gender is required";
        // }
        elseif ( empty ( $_POST['birthdate'] ) )
        {
            $validateErrors['birthdate_error']="Birthdate is required";
        }
        elseif ( !isset( $_POST['qualification'] ) )
        {
            $validateErrors['qualification_error']="Qualification is required";
        }
        // elseif ( empty ( $_POST['qualification'] ) )
        // {
        //     $validateErrors['qualification_error']="Qualification is required";
        // }
        elseif ( empty ( $_POST['description'] ) )
        {
            $validateErrors['description_error']="Description is required";
        }
        else
        {
            $insertQuery = "INSERT INTO emp (firstname, lastname, email, phone, gender, birthdate, qualification, photo, description) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt= $pdo->prepare($insertQuery);
            $stmt->execute([$fname, $lname, $email, $phone, $gender, $birthdate, $qua, $file_name , $description]);
            header("Location: /arpesh/employee-database-practical/addEmployee.php");
            // echo "data inserted";
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
            $_SESSION['file_name'] = $file_name;
            $_SESSION['description'] = $description;

            header("Location: /arpesh/employee-database-practical/addEmployee.php");
        }
    }

?>