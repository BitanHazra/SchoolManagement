
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
                <a href="classes.php" id="heading">CLASSES</a><span class="path">Home /<a href="classes.php">Class</a><button class="create_new_btn" style="width: 100px; text-decoration: none;"><img src="icon/icons8-add-new-50.png" class="span_img">Create</button></span>
            </div>
        </div>
        <div class="classes_table">
            <div class="classes_table_main">
                <div class="classes_table_heading">
                    <div class="con_left">
                        <h2>Class Teacher</h2>
                    </div>
                </div>
                <div class="classes_body_table" id="printContent">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;"><input type="checkbox"></th>
                                <th>Class</th>
                                <th>Class Teacher</th>
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
        <div class="newFrame">
            <div class="editContainer">
                <div class="closeCon">
                    <div class="cross">&#215;</div>
                </div>
                <div class="editContentCon" style="height: 50px;justify-content: center;">
                    <h2>Create New Data</h2>
                </div>
                
                <div class="editContentCon">
                    
                    <label for="className">Enter Class:</label>
                    <input type="text" class="className" name="className" id="classNameNew">
                    
                    <label for="teacher_name">Teacher Name:</label>
                    <select class="teacher_name" name="teacher_name" id="teacher_nameNew">

                    </select>
                    <button id="create">Create</button>
                </div>
            </div>
        </div>
        <div class="editFrame">
            <div class="editContainer">
                <div class="closeCon">
                    <div class="cross">&#215;</div>
                </div>
                <div class="editContentCon" style="height: 50px;justify-content: center;">
                    <h2>Change Data</h2>
                </div>
                
                <div class="editContentCon">
                    
                    <label for="className">Select Class:</label>
                    <select class="className" name="className" id="classNames">
                        
                    </select>
                    <label for="teacher_name">Teacher Name:</label>
                    <select class="teacher_name" name="teacher_name" id="teacher_names">

                    </select>
                    <button id="edit">Edit</button>
                </div>
            </div>
        </div>
        <div class="deleteFrame">
            <div class="editContainer">
                <div class="closeCon">
                    <div class="cross">&#215;</div>
                </div>
                <div class="editContentCon" style="height: 50px;justify-content: center;">
                    <h2>Delete Data</h2>
                </div>
                <div class="editContentCon">
                    <label for="className">Select Class:</label>
                    <select class="className" name="className" id="classNameDelete" >

                    </select>
                    <label for="teacher_name">Teacher Name:</label>
                    <select class="teacher_name" name="teacher_name" id="teacher_nameDelete" >

                    </select>
                    <button id="delete">Delete</button>
                </div>
            </div>
        </div>
    <?php endif;endif; ?>
        <script src="classScripts.js"></script>
    </body>
</html>