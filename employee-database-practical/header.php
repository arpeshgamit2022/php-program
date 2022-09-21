<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Employee Details</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        
        <!--Header Start-->
        <header id="header-section">
            <div class="container">
                <div class="header-section-info">
                    <div class="image-logo common-align">
                        <img src="images/MA-Logo-Design.webp" alt="logo">
                    </div>
                    <nav class="navigation-menu">
                            <ul class="menu-list common-align">
                                <li><a class="dashboard" href="http://localhost/arpesh/employee-database-practical/index.php">Dashboard</a></li>
                                <li><a class="employee" href="http://localhost/arpesh/employee-database-practical/addEmployee.php">Add Employee</a></li>
                                
                                <div class="btn-section logout-btn">
                                    <?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                        echo '<a href="logout.php"><button class="btn-info" type="logout">Logout</button></a>';
                                    }
                                    else
                                    {
                                        echo '<a href="login.php"><button class="btn-info" type="logout">login</button></a>';
                                    }
                                    ?>
                                </div>
                            </ul>
                    </nav>
                </div>  
            </div>
        </header>
        <!--Header End-->