<?php

    include "connection.php";
    
    session_start();
    
    //static username and password
    $credentail=array("user_name"=>"arpesh.gamit", "password"=>"1234");
    
    $errors = array();
    $oldData = array();
    
    if (isset($_POST['submit']))
    {
        unset($_SESSION['error_data']);  
        unset($_SESSION['oldData']);  

        // Check data empty or not 
        if (empty($_POST['user_name']))
        {
            $errors['username_error']="Username is required";   
        }
        else 
        {
            if( $credentail['user_name'] !== $_POST['user_name'] )
            {
                $errors['username_error']="Wrong username";
                $oldData['username'] = $_POST['user_name'];
            }
        }
        
        if (empty($_POST['password']))
        {
            $errors['password_error']="Password is required*";
        }
        else
        {
            if( $credentail['password'] !== $_POST['password'] )
            {
                $errors['password_error']="wrong password";
                $oldData['password'] = $_POST['password'];

            }
        }


        if (!empty($errors))
        {
            // session_start();
            $_SESSION['error_data'] = $errors;
            $_SESSION['oldData'] = $oldData;

            header("Location: /arpesh/Training_Practical_3/login.php");

        } else 
        {
            $_SESSION['user_name'] = $_POST['user_name'];
            $_SESSION['password'] = $_POST['password'];
        
            header("Location: /arpesh/Training_Practical_3/index.php");
        }

        
    }
    
?>