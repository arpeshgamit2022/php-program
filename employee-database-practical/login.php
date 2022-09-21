<?php 

    include "header.php";
    session_start();
    
    // echo "<pre>";
    // // print_r($_SESSION);
    // echo "</pre>";

?>

    <section id="main-section" class="common-pad">

        <div class="container">

            <h1>Login</h1>
            <div class="employee-managment">

                <div class="name-section">  

                    <form method="post" action="display.php">
                        
                        <div class="uname-section form-pad name-section-common">

                        <span class="error-color">
                            <?php echo  $_SESSION['error_data']['credentail_error']; ?>
                        </span>

                            <input class="employee-text form-pad" type="text" name="user_name" placeholder="User Name*" value="<?php echo $_SESSION['oldData']['username'];?>">
                            <span class="error-color">
                                <?php echo $_SESSION['error_data']['username_error']; ?>
                            </span>
                        </div>
                        
                        <div class="pass-section form-pad name-section-common">
                            <input class="employee-text form-pad" type="password" name="password" placeholder="Password*" value="<?php echo $_SESSION['oldData']['password'];?>">
                            <span class="error-color">
                                <?php echo $_SESSION['error_data']['password_error']; ?>
                            </span>
                        </div>
                        
                        <div class="remember-section common-pad-rem">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Remember Me</label>
                        </div>

                        <div class="btn-section common-pad-rem">
                            <input type="submit" class="btn-info" name="submit" value="Login">    
                        </div>
                        
                    </form>
                    
                </div>
                
            </div>

        </div>

    </section>

<?php include "footer.php"; ?>