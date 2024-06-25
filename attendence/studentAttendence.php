<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="studentAttendencestyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?>    
        
        <div class="second_nav">
            <div class="heading_con">
                <span class="heading">Attendence Report</span><span class="path">Home > Student Attendence</span>
            </div>
        </div>
        <div class="teachers_table">
            <div class="teacher_table_main">
                <div class="right_container">
                    <h2>ATTENDENCE</h2>
                    <label for="select_class">Select Class:</label>
                    <input type="number" min="1" max="12">
                    <label for="Date_input">Date</label>
                    <input type="date">
                    <span><button>Add/Update</button><button>View</button></span>
                </div>
                
                <div class="teacher_body_table">
                    <h3>ATTENDENCE OVERVIEW</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Attendence</th>
                                <th>Comments</th>
                            </tr>
                            <tbody>
                                
                            </tbody>
                        </thead>
                    </table>
                    <div class="fotter_content">
                        <span>Show
                            <input type="number">
                            <span>Entries</span>
                            <span>Showing 1 to 1 of 1 entries</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>