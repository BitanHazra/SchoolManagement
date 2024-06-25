
<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="studentsstyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?>    
        
    <?php
    if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1): ?>
        <div class="second_nav">
            <div class="heading_con">
                <a href="students.php" id="heading">STUDENTS</a><span class="path">Home /<a href="student.php">Student</a><a href="newstudent.php" style="width: 100px; text-decoration: none;"><span class="create_new_btn"><img src="icon/icons8-add-new-50.png" class="span_img">Create new</span></a></span>
            </div>
        </div>
        <div class="students_table">
            <div class="student_table_main">
                <div class="student_table_heading">
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
                            <option value="Teacher_name" data-code="student_name">Student Name</option>
                            <option value="Gender" data-code="gender">Gender</option>
                            <option value="Blood_Group" data-code="blood_group">Blood Group</option>
                        </select>
                    </div>
                    <div>
                        <input type="search" placeholder="Search.." id="search">
                    </div>   
                </div>
                <div class="student_body_table" id="printContent">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;"><input type="checkbox"></th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Date Of Birth</th>
                                <th>Gender</th>
                                <th>Action</th>
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
        <script src="studentScript.js"></script>
    </body>
</html>