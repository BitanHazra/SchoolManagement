
<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="classTeacher.css">
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
                <a href="subjects.php" id="heading">SUBJECT TEACHER</a><span class="path">Home /<a href="subjects.php">Subject Teacher</a></span>
            </div>
        </div>
        <div class="classes_table">
            <div class="classes_table_main">
                <div class="classes_table_heading">
                    <div class="con_left">
                        <h5>SUBJECT TEACHER: </h5>
                        
    
                    </div>
                    <div class="con_right">
                        <button id="print"><span><img src="icon/icons8-print-50.png" class="span_img">Print</span></button>
                        
                        <button id="export"><span><img src="icon/icons8-export-64.png" class="span_img">Export</span></button>
                    </div>
                </div>
                
                <div class="classes_body_table" id="printContent">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;"><input type="checkbox"></th>
                                <th>Subject code</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Teacher</th>
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
        <script src="subjectsScript.js"></script>
    </body>
</html>