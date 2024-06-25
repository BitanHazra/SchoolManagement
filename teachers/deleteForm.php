<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="newTeacherstyle.css">
        <link rel="stylesheet" href="viewFormStyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
        
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?> 
        
        <div class="second_nav">
            <div class="heading_con">
                <span class="heading"><a href=""+<?php echo $_SERVER['PHP_SELF']; ?> class="second_heading">TEACHER DETAILS</a></span><span class="path">Home / <a href="teachers.php">Teacher</a>/ <a href=""+<?php echo $_SERVER['PHP_SELF']; ?>>Delete</a></span>
            </div>
        </div>
    
        <form id="sendingData">
            <div class="new_teacher_info">
                <div class="new_teacher_con">
                    <h2>Personal Details</h2>
                    <div class="personal_detail">
                        <div class="first_column">
                            <p>Profile Image</p>
                            <div class="image_con">
                            <span><input type='file' accept="image/*" id="file_input"><img src="icon/1862198.jpg" class="img_upload" alt="Profile Image"></span>
                            <img src="icon/icons8-camera-48.png" class="img_cam">
                            </div>
                            <p>*only JPEG and JPG supported 
                                <br>* Max 150kb Upload</p>
                            <label for="date_of_birth">Date of Birth:</label>
                            <input type="date" name="date_of_birth" id="date_col" value="2024-05-05">
                        </div>
                        <div class="second_column">
                            <label for="gender">Gender:</label>
                            <div class="gender_con">
                                <input type="radio" id="Male" name="gender" value="male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="Female" name="gender" value="female">
                                <label for="female">Female</label><br>
                                <input type="radio" id="Other" name="gender" value="other">
                                <label for="other">Other</label><br>
                            </div> 
                            </select>
                            <label for="first_name">First Name:*</label>
                            <input type="text" name="first_name" id="f_name" required>
                            <label for="blood_group">Blood Group:*</label>
                            <input type="text" name="blood_group" required id="blood">
                        </div>
                        <div class="third_column">
                            <label for="Middle_Name">Middle Name:</label>
                            <input type="text" name="Middle_Name" id="m_name">
                            <label for="phone">Phone:*</label>
                            <input type="text" name="phone" required id="phone">
                        </div>
                        <div class="forth_column">
                            <label for="Last_Name">Last Name:</label>
                            <input type="text" name="Last_Name" id="l_name">
                            <label for="Qualification">Qualification:*</label>
                            <input type="text" name="Qualification" required id="quali">
                        </div>
                    </div>
                    <h2>Address</h2>
                    <div class="personal_detail">
                        <div class="first_column">
                            <label for="flat">Flat/Room/Door/Block No.</label>
                            <input type="text" name="flat" id="flat">
                            <label for="Area">Area/Locality/Taluk</label>
                            <input type="text" name="Area"  id="area">
                            <label for="state">State</label>
                            <input type="text" name="state"  id="state" required> 
                        </div>
                        <div class="second_column">
                            <label for="Building">Building</label>
                            <input type="text" name="Building"  id="building">
                            <label for="City">City</label>
                            <input type="text" name="City"  id="city" required>
                            <label for="pin_code">Pin Code</label>
                            <input type="text" name="pin_code"  id="pincode"> 
                        </div>
                        <div class="third_column">
                            <label for="road">Road/Street</label>
                            <input type="text" name="road"  id="road">
                            <label for="country">Country Name</label>
                            <input type="text" name="country" value="India"  id="country">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip"  id="zip"> 
                        </div>
                    </div>
                    <h2>Education Details</h2>
                    <div class="personal_detail">
                        <div class="first_column">
                            <label for="tenth"><strong>10th</strong> School/University</label>
                            <input type="text" name="tenth" required id="school10">
                            <label for="twelve"><strong>12th</strong> School/University</label>
                            <input type="text" name="twelve" required  id="school12">
                            <label for="graduation"><strong>Graduation</strong> College/University</label>
                            <input type="text" name="graduation" required  id="school_gr"> 
                            <label for="pg"> <strong>Post Graduation</strong> College/University</label>
                            <input type="text" name="pg" required  id="school_pg">
                            <label for="experience">Experience if any</label>
                            <input type="text" name="experience" required id="ex">  
                        </div>
                        <div class="second_column">
                            <label for="year_10">Year</label>
                            <input type="text" name="year_10" id="year_10">
                            <label for="year_12">Year</label>
                            <input type="text" name="year_12" id="year_12">
                            <label for="year_gr">Year</label>
                            <input type="text" name="year_gr"  id="year_gr">
                            <label for="year_pg">Year</label>
                            <input type="text" name="year_pg"  id="year_pg">
                            <label for="year_ex">Year</label>
                            <input type="text" name="year_ex"  id="year_ex">  
                        </div>
                        <div class="third_column">
                            <label for="Percentage_10">Percentage</label>
                            <input type="text" name="Percentage_10" id="per_10">
                            <label for="Percentage_12">Percentage</label>
                            <input type="text" name="Percentage_12" id="per_12">
                            <label for="Percentage_gr">Percentage</label>
                            <input type="text" name="Percentage_gr"  id="per_gr">
                            <label for="Percentage_pg">Percentage</label>
                            <input type="text" name="Percentage_pg"  id="per_pg">
                            <input type="text" id="emp_id" value=<?php echo $_GET['emp_no']; ?> style="opacity:0;"> 
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="button" value="Delete" id="deletebtn">
                        <input type="button" value="Cancle" id="canclebtn">
                    </div>
                </div>  
            </div>
        </form>
        <div class="data_upload_msz">
            <div class="msz_container">
                <div class="msz_flow">
                    <div class="pro_conf">
                        <div class="spinner"></div>
                    </div>
                    <div class="processing_p">Processing...</div>
                    
                </div>
                <div class="msz_flow_s">
                    <div class="pro_conf">
                        <div class="right_border">
                            <div class="rightsign"></div>
                        </div>
                    </div>
                    <div class="processing_s">Data Deleted Succesfully.</div>
                    <span><button id="upload_msz_close">Close</button></span>
                </div>
                <div class="msz_flow_f">
                    <div class="pro_conf">
                            <div class="cross-sign">X</div>   
                    </div>
                    <div class="processing_f">Fail to upload Data.</div>
                    <span><button id="upload_msz_close_f">Close</button></span>
                </div>
            </div>
        </div>
        
        <script src="viewFormscript.js"></script>
    </body>
</html>