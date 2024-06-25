
<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="teachersstyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?>    
        
    <?php
    if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1 | $_SESSION['admin']==0): ?>
    
        <div class="second_nav">
            <div class="heading_con">
                <a href="teachers.php" id="heading">TEACHERS</a><span class="path">Home /<a href="teachers.php">Teacher</a>
                <?php
    if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1): ?>
                <a href="newTeacher.php" style="width: 100px; text-decoration: none;"><span class="create_new_btn"><img src="icon/icons8-add-new-50.png" class="span_img">Create new</span></a></span>
                <?php endif;endif; ?>
            </div>
        </div>
        <div class="teachers_table">
            <div class="teacher_table_main">
                <div class="teacher_table_heading">
                    <div class="con_left">
                        <label for="select_class_name">Select Employee ID: </label>
                        <select name="employeeIdSelect" id="employeeIdSelect">
                            
                        </select>
                    </div>
                    <div class="con_right">
                        <button id="print"><span><img src="icon/icons8-print-50.png" class="span_img">Print</span></button>
                        <button id="export"><span><img src="icon/icons8-export-64.png" class="span_img">Export</span></button>
                    </div>
                </div>
                <div class="action_search">
                    <div>
                        <p>Seach option:
                        <select name="select_option" id="select_option">
                            <option value="Teacher_name" data-code="teacher_name">Teacher Name</option>
                            <option value="Gender" data-code="gender">Gender</option>
                            <option value="Blood_Group" data-code="blood_group">Blood Group</option>
                        </select>
                    </div>
                    <div>
                        <input type="search" placeholder="Search.." id='search'>
                    </div>   
                </div>
                <div class="teacher_body_table" id="printContent">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;"><input type="checkbox"></th>
                                <th>Employee Code</th>
                                <th>Teacher Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <?php
                                if(isset($_SESSION['admin'])): 
                                if($_SESSION['admin']==1): ?>
                                <th>Action</th>
                                <?php endif;endif; ?>
                                <?php
                                if(isset($_SESSION['admin'])): 
                                if($_SESSION['admin']==0): ?>
                                <th>Phone</th>
                                <?php endif;endif; ?>
                            </tr>
                            <tbody>
                              <tr>
                                
                              </tr>  
                            </tbody>
                        </thead>
                    </table>
                </div>
                <div class="fotter_content">
                    <span>Show
                        <input type="number" id="entry_to_view" min="0">
                        <span>Entries</span>
                        <span>of<span id="total_entry"></span>entries</span>
                    </span>
                </div>
            </div>
        </div>
    <?php endif;endif; ?>
    <?php
    if(isset($_SESSION['admin'])): 
        if($_SESSION['admin']==0): ?>
            <p  class="admin">0</p>
    <?php endif;endif; ?>
    <?php
    if(isset($_SESSION['admin'])): 
        if($_SESSION['admin']==1): ?>
            <p  class="admin">1</p>
    <?php endif;endif; ?>
        <script src="teachersScript.js"></script>
    </body>
</html>