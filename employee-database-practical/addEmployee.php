<?php
     include "header.php";
     session_start();

     if ( isset ($_SESSION['errors_data']) )
     {
        session_destroy();
     }
?>

        <!--Main Section Start-->
        <section id="main-section" class="common-pad">
            <div class="container">
                <h1>Add Employee Details</h1>
                <div class="employee-info">

                    <form method="post" action="insert.php" enctype="multipart/form-data">
                        <div class="first-name common-float form-pad">
                            <input class="employee-details form-pad" type="text" name="firstname"  placeholder="First Name*" value="<?php echo $_SESSION['firstname'];?>">
                                <span class="error-msg">
                                    <?php echo $_SESSION['errors_data']['firstname_error']; ?>
                                </span>
                        </div>
                        <div class="last-name common-float form-pad">
                            <input  class="employee-details form-pad" type="text" name="lastname"  placeholder="Last Name*" value="<?php echo $_SESSION['lastname'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errors_data']['lastname_error']; ?>
                            </span>
                        </div>
                        <div class="clear"></div>  
                        <div class="email-info common-float form-pad">
                            <input class="employee-details form-pad" type="text" name="email"  placeholder="Email*" value="<?php echo $_SESSION['email'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errors_data']['email_error']; ?>
                            </span>
                        </div>
                        <div class="phone-info common-float form-pad">
                            <input class="employee-details form-pad" type="tel" name="phone"  placeholder="Phone*" value="<?php echo $_SESSION['phone'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errors_data']['phone_error']; ?>
                            </span>
                        </div>
                        <div class="clear"></div>
                        <div class="gender-info common-float form-pad">
                            <div class="">
                                <label>Gender*</label>
                            </div>
                            <div class="radio-group">
                                <div class="common-block common-float-w-auto">
                                    <input type="radio" name="gender" id="g-male" value="male" value="<?php echo $_SESSION['gender'];?>">
                                    <label for="g-male">Male</label>
                                    
                                </div>
                                
                                <div class="common-block common-float-w-auto">
                                <input class="radio" type="radio" id="g-female" name="gender" value="female" value="<?php echo $_SESSION['gender'];?>">
                                    <label for="g-female">female</label>
                                </div>
                                <span class="error-msg">
                                    <?php echo $_SESSION['errors_data']['gender_error']; ?>
                                </span>

                                <div class="clear"></div>
                            </div>
                            
                        </div>

                        <div class="birthdate-info common-float form-pad">
                            <input class="employee-details form-pad" type="date" name="birthdate"  placeholder="Birthdate*" value="<?php echo $_SESSION['birthdate'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errors_data']['birthdate_error']; ?>
                            </span>
                        </div>

                        <div class="clear"></div>
                        <div class="qualification-info form-pad"> 
                            <div class="">
                                <label class="display">Qualifications*</label>
                            </div>
                            <ul class="list-field">
                                <li>
                                    <input type="checkbox" name="qualification[]" id="m-tech" value="M.tech">
                                    <label for="m-tech">M.tech</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="b-tech" value="B.tech">
                                    <label for="b-tech">B.tech</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="b-it" value="B-IT">
                                    <label for="b-it">B-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="be-cs" value="BE-CS&E">
                                    <label for="be-cs">BE-CS&E</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="me-it" value="ME-IT">
                                    <label for="me-it">ME-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="me-cs" value="ME-CS&E">
                                    <label for="me-cs">ME-CS&E</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="bca" value="BCA">
                                    <label for="bca">BCA</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="mca" value="MCA">
                                    <label for="mca">MCA</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="bsc-it" value="Bsc-IT">
                                    <label for="bsc-it">Bsc-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="msc-it" value="Msc-IT">
                                    <label for="msc-it">Msc-IT</label>
                                </li>   
                        </ul>
                        </div>
                        <span class="error-msg">
                            <?php echo $_SESSION['errors_data']['qualification_error']; ?>
                        </span>

                        <div class="">
                            <label class="form-pad">Upload Photo*</label>
                        </div>
                        <div class="clear"></div>
                        <div class="lable-info"><input class="file-info form-pad" type="file" name="photo" value="<?php echo $_SESSION['file_name'];?>"></div>
                        <span class="error-msg">
                            <!-- <?php echo $_SESSION['errors_data']['photo_error']; ?> -->
                            <?php 
                                echo $_FILES['photo']['name']; 
                                echo $_FILES['photo']['size'];
                                echo $_FILES['photo']['type'];
                            ?>
                        </span>
                        <div class="form-pad">
                            <textarea class="employee-details form-pad" rows="7" cols="30" name="description"  placeholder="About Employee" value="<?php echo $_SESSION['description'];?>"></textarea>
                            <span class="error-msg">
                            <?php echo $_SESSION['errors_data']['description_error']; ?>
                        </span>
                        </div>
                    
                        <div class="">
                            <input type="submit" class="profile-button submit-btn" name="submit" value="Submit">    
                            <a class="profile-back profile-button" href="#"><span>&#60;Back</span></a>
                        </div>
                </form>
              </div>
            </div>
        </section>
        <!--Main Section End-->

        <?php 
             include "footer.php";
        ?>

    </body>
</html>
