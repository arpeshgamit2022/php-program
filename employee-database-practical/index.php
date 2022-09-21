<?php
    include "header.php";
?>  

        <!--Main Section-->
        <section id="main-section" class="common-pad-tab">
            <div class="container">
            <h1>Employee List</h1>
                 <div class="employee-list common-pad-tab">
                    
                         <table class="" cellspacing="0" cellpadding="10">
                            <tr class="table-heading">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Qualifications</th>
                                <td class="col" colspan="3">Actions</td>
                                
                            </tr>

                            <tr class="">
                                <td>1</td>
                                <td>Mark Wood</td>
                                <td>mark@gmail.com</td>
                                <td>9632587412</td>
                                <td>Male</td>
                                <td>26-12-1990</td>
                                <td>BE-IT</td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">View</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Edit</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Delete</a></button></td>
                            </tr>

                            <tr class="jullie-info common-color color-black ">
                                <td>2</td>
                                <td>Jullie Josh</td>
                                <td>jullie@yahoo.com</td>
                                <td>7896523140</td>
                                <td>Female</td>
                                <td>01-01-2000</td>
                                <td>BE-Tech</td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">View</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Edit</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Delete</a></button></td>
                            </tr>

                            <tr class="">
                                <td>3</td>
                                <td>Larry Watson</td>
                                <td>larry@hotmail.com</td>
                                <td>6985632014</td>
                                <td>Female</td>
                                <td>15-09-1999</td>
                                <td>BCA</td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">View</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Edit</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Delete</a></button></td>
                            </tr>

                            <tr class="haris-info common-color color-black ">
                                <td>4</td>
                                <td>Haris Amla</td>
                                <td>haris@gmail.com</td>
                                <td>7895632140</td>
                                <td>Male</td>
                                <td>16-08-1997</td>
                                <td>MCA</td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">View</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Edit</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Delete</a></button></td>
                            </tr>

                            <tr class="">
                                <td>5</td>
                                <td>David Aten</td>
                                <td>dave@yahoo.com</td>
                                <td>9874563210</td>
                                <td>Male</td>
                                <td>26-03-1997</td>
                                <td>Bsc-IT</td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">View</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Edit</a></button></td>
                                <td><button class="view-pad"><a href="http://localhost/arpesh/Training_Practical_3/viewEmployeeDetail.php">Delete</a></button></td>
                            </tr>

                         </table>
                 </div>

                 <!--Pagination List-->
                 <div class="pagination-info">
                     <div class="pagination color-black">
                         <a href="#">&laquo;</a>
                         <a href="#">1</a>
                         <a href="#">2</a>
                         <a href="#">3</a>
                         <a href="#">4</a>
                         <a href="#">5</a>
                         <a href="#">&raquo;</a>
                     </div>
                </div>


            </div>
        </section>
        

        <?php
            include "footer.php";
        ?>  

    </body>
</html>