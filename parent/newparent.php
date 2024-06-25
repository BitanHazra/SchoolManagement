<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="newparentstyle.css">
        <<link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
    </head>
    <body>
        <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
        <?php include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';?>
        <?php
        
        ?>
        <div class="top-nav">
            <div class="drop-container">
                <div class="user_con">
                    <img src="icon/1862198.jpg" class="user_img"><span class="user">ADMIN</span><span class="arrow"></span>
                </div>
                <div class="dropdown">
                    <a href="#">Change password</a>
                    <a href="#">Log out</a>
                </div>
            </div>
        </div>
        <div class="second_nav">
            <div class="heading_con">
                <span class="heading">NEW parent</span><span class="path">Home / <a href="parent.php">parent</a>/ <a href="newparent.php">New parent</a></span>
            </div>
        </div>
    
        <form id="sendingData">
            <div class="new_parent_info">
                <div class="new_parent_con">
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
                            <input type="date" name="date_of_birth">
                        </div>
                        <div class="second_column">
                            <label for="gender">Gender:</label>
                            <div class="gender_con">
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label><br>
                                <input type="radio" id="other" name="gender" value="other">
                                <label for="other">Other</label><br>
                            </div> 
                            </select>
                            <label for="first_name">First Name:*</label>
                            <input type="text" name="first_name" required>
                            <label for="blood_group">Blood Group:*</label>
                            <input type="text" name="blood_group" required>
                        </div>
                        <div class="third_column">
                            <label for="Middle_Name">Middle Name:</label>
                            <input type="text" name="Middle_Name">
                            <label for="phone">Phone:*</label>
                            <input type="text" name="phone" required>
                        </div>
                        <div class="forth_column">
                            <label for="Last_Name">Last Name:</label>
                            <input type="text" name="Last_Name">
                            <label for="Qualification">Qualification:*</label>
                            <input type="text" name="Qualification" required>
                        </div>
                    </div>
                    <h2>Address</h2>
                    <div class="personal_detail">
                        <div class="first_column">
                            <label for="flat">Flat/Room/Door/Block No.</label>
                            <input type="text" name="flat">
                            <label for="Area">Area/Locality/Taluk</label>
                            <input type="text" name="Area">
                            <label for="state">State</label>
                            <input type="text" name="state" required> 
                        </div>
                        <div class="second_column">
                            <label for="Building">Building</label>
                            <input type="text" name="Building">
                            <label for="City">City</label>
                            <input type="text" name="City" required>
                            <label for="pin_code">Pin Code</label>
                            <input type="text" name="pin_code"> 
                        </div>
                        <div class="third_column">
                            <label for="road">Road/Street</label>
                            <input type="text" name="road">
                            <label for="country">Country Name</label>
                            <input type="text" name="country" value="India">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip"> 
                        </div>
                    </div>
                    <h2>Education Details</h2>
                    <div class="personal_detail">
                        <div class="first_column">
                            <label for="tenth"><strong>10th</strong> School/University</label>
                            <input type="text" name="tenth" required>
                            <label for="twelve"><strong>12th</strong> School/University</label>
                            <input type="text" name="twelve" required>
                            <label for="graduation"><strong>Graduation</strong> College/University</label>
                            <input type="text" name="graduation" required> 
                            <label for="pg"> <strong>Post Graduation</strong> College/University</label>
                            <input type="text" name="pg" required>
                            <label for="experience">Experience if any</label>
                            <input type="text" name="experience" required>  
                        </div>
                        <div class="second_column">
                            <label for="first_name">Year</label>
                            <input type="text" name="first_name">
                            <label for="blood_group">Year</label>
                            <input type="text" name="blood_group">
                            <label for="blood_group">Year</label>
                            <input type="text" name="blood_group">
                            <label for="blood_group">Year</label>
                            <input type="text" name="blood_group">
                            <label for="blood_group">Year</label>
                            <input type="text" name="blood_group">  
                        </div>
                        <div class="third_column">
                            <label for="first_name">Percentage</label>
                            <input type="text" name="first_name">
                            <label for="blood_group">Percentage</label>
                            <input type="text" name="blood_group">
                            <label for="blood_group">Percentage</label>
                            <input type="text" name="blood_group">
                            <label for="blood_group">Percentage</label>
                            <input type="text" name="blood_group"> 
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="submit" id="addNewbtn" ><input type="button" value="Cancle" id="canclebtn">
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
                    <div class="processing_s">Data Uploaded Succesfully.</div>
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
        
        <script src="newparent.js">
            
        </script>
    </body>
</html>