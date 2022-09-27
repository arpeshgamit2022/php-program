<?php
     include "header.php";
     session_start();

     if ( isset ($_SESSION['errorsData']) )
     {
        session_destroy();
     }
?>

        <!--Main Section Start-->
        <section id="main-section" class="common-pad">
            <div class="container">
                <h1>Add Employee Details</h1>

                <!-- <span class="">
                    <?php 
                        if(isset($_SESSION['insert_data']))
                        {
                            echo $_SESSION['insert_data'];
                            unset($_SESSION['insert_data']);
                        }
                    ?>
                </span> -->

                <div class="employee-info">

                    <form method="post" action="insert.php" enctype="multipart/form-data">
                        <div class="first-name common-float form-pad">
                            <input class="employee-details form-pad" type="text" name="firstname" placeholder="First Name*" value="<?php echo $_SESSION['firstname'];?>">
                                <span class="error-msg">
                                    <?php echo $_SESSION['errorsData']['firstnameError']; ?>
                                </span>
                        </div>
                        <div class="last-name common-float form-pad">
                            <input  class="employee-details form-pad" type="text" name="lastname" placeholder="Last Name*" value="<?php echo $_SESSION['lastname'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errorsData']['lastnameError']; ?>
                            </span>
                        </div>
                        <div class="clear"></div>  
                        <div class="email-info common-float form-pad">
                            <input class="employee-details form-pad" type="email" name="email" placeholder="Email*" value="<?php echo $_SESSION['email'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errorsData']['emailError']; ?>
                            </span>
                        </div>
                        <div class="phone-info common-float form-pad">
                            <input class="employee-details form-pad" type="tel" name="phone" placeholder="Phone" value="<?php echo $_SESSION['phone'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errorsData']['phoneError']; ?>
                            </span>
                        </div>
                        <div class="clear"></div>
                        <div class="gender-info common-float form-pad">
                            <div class="">
                                <label>Gender*</label>
                            </div>
                            <div class="radio-group">
                                <div class="common-block common-float-w-auto">
                                    <input type="radio" name="gender" id="g-male" value="male" required="required" <?php if (isset( $_SESSION['gender'] ) ){ echo 'checked'; } ?> >
                                    <label for="g-male">Male</label>
                                    
                                </div>
                                
                                <div class="common-block common-float-w-auto">
                                <input class="radio" type="radio" id="g-female" name="gender" value="female" required="required" <?php if (isset( $_SESSION['gender'] ) ) { echo 'checked'; } ?> >
                                    <label for="g-female">female</label>
                                </div>
                                <span class="error-msg">
                                    <?php echo $_SESSION['errorsData']['gender_error']; ?>
                                </span>

                                <div class="clear"></div>
                            </div>
                            
                        </div>

                        <div class="birthdate-info common-float form-pad">
                            <input class="employee-details form-pad" type="date" name="birthdate" required placeholder="Birthdate*" min="1997-01-01" max="2030-12-31" value="<?php echo $_SESSION['birthdate'];?>">
                            <span class="error-msg">
                                <?php echo $_SESSION['errorsData']['birthdate_error']; ?>
                            </span>
                        </div>

                        <div class="clear"></div>
                        <div class="qualification-info form-pad"> 
                            <div class="">
                                <label class="display">Qualifications*</label>
                            </div>
                            <ul class="list-field">
                                <li>
                                    <input type="checkbox" name="qualification[]" id="m-tech" value="M.tech" <?php if (isset($_SESSION['qualification'] ) ) { if(in_array(" M.tech",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="m-tech">M.tech</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="b-tech" value="B.tech" <?php if (isset( $_SESSION['qualification'] ) ) { if(in_array( "B.tech",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="b-tech">B.tech</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="b-it" value="B-IT" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "B-IT",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="b-it">B-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="be-cs" value="BE-CS&E" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "BE-CS&E",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="be-cs">BE-CS&E</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="me-it" value="ME-IT" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "ME-IT",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="me-it">ME-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="me-cs" value="ME-CS&E" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "ME-CS&E",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="me-cs">ME-CS&E</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="bca" value="BCA" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "BCA",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="bca">BCA</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="mca" value="MCA" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "MCA",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="mca">MCA</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="bsc-it" value="Bsc-IT" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array( "Bsc-IT",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="bsc-it">Bsc-IT</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="qualification[]" id="msc-it" value="Msc-IT" <?php if ( isset( $_SESSION['qualification'] ) ) { if (in_array("Msc-IT",$_SESSION['qualification'] ) ) { echo 'checked'; } } ?> >
                                    <label for="msc-it">Msc-IT</label>
                                </li>   
                        </ul>
                        </div>
                        <span class="error-msg">
                            <?php echo $_SESSION['errorsData']['qualification_error']; ?>
                        </span>

                        <div class="">
                            <label class="form-pad">Upload Photo*</label>
                        </div>
                        <div class="clear"></div>
                        
                        <div class="lable-info"><input class="file-info form-pad" type="file" name="photo" required value="<?php echo $_SESSION['file_name'];?>"></div>
                        <span class="error-msg">
                            <?php 
                                echo $_SESSION['errors_data']['file_error'];
                                echo $_SESSION['errors_data']['file_allowed'];
                                echo $_SESSION['errors_data']['file_size'];
                                echo $_FILES['photo']['name']; 
                                echo $_FILES['photo']['size'];
                                echo $_FILES['photo']['type'];
                            ?>
                        </span>
                        <!-- <img src="./uploads/<?php echo $_SESSION['file_name']; ?>"> -->

                        <div class="form-pad">  
                            <textarea class="employee-details form-pad" rows="7" cols="30" name="description" placeholder="About Employee" value="<?php echo $_SESSION['description'];?>"></textarea>
                            <!-- <span class="error-msg">
                                <?php echo $_SESSION['errorsData']['description_error']; ?>
                            </span> -->
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
