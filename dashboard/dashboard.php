<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="bashboardstyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">

        
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?>    
    <?php if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1 | $_SESSION['admin']==0): ?>
        <div class="second_nav">
            <div class="heading_con">
                <span class="heading"><a href="dashboard.php">Dashboard</a></span><span class="path">Home /
                    <a href="dashboard.php">Dashboard</a></span>
            </div>
        </div>
        <div class="summary_con">
            <a  href="/school_Management/student/student.php" class="s_summary">
                <p class="s_name">Student</p>
                <p><span class="t_inc_s">+</span><span><img src="icons\icons8-student-50.png" class="thumb_icon"></span></p>
            </a>
            <a  href="/school_Management/teachers/teachers.php" class="t_summary">
                <p class="t_name">Teacher</p>
                <p><span class="t_inc_t">+</span><span><img src="icons\icons8-teacher-50.png" class="thumb_icon"></span></p>
            </a>
            <a  href="/school_Management/parent/parent.php" class="p_summary">
                <p class="p_name">Parents</p>
                <p><span class="t_inc_p">+</span><span><img src="icons\icons8-parents-50.png" class="thumb_icon"></span></p>
            </a>
            <a  href="/school_Management/classes/classes.php" class="c_summary">
                <p class="c_name">Class</p>
                <p><span class="t_inc_c">+</span><span><img src="icons\icons8-meeting-room-24.png" class="thumb_icon"></span></p>
            </a>
        </div>
        <div class="calander_exam">
            <div class="calender_con">
                <div class="calendar">
                    <div class="calendar-header">
                        <h2>Activity Calendar</h2>
                        <span><select id="month" name="month">

                        </select>
                        <select id="year" name="year">
                            
                        </select>
                    </div>

                    <div class="calendar-days" id="calendarDays">
                        <!-- Days will be generated here -->
                    </div>

                    <div class="add-activity-form" id="addActivityForm">
                        <form onsubmit="addActivity(event)">
                        <input type="text" id="activityName" placeholder="Activity Name" required>
                        <input type="date" id="activityDate" required>
                        <input type="submit" value="Add">
                        </form>
                    </div>
                    </div>
            </div>
            <div class="exam_con">
                <div class="exam_heading">
                    <h2>Notification</h2>
                </div>
                <div class="event_table">
                    <table id="mtable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="fotter_content">
                    <span>Show
                        <input type="number" id="entry_to_view" min="0">
                        <span>Entries</span>
                        <span>of<span id="total_entry"></span>entries</span>
                    </span>
                </div>
                </div>
            </div>
        </div>
        <?php endif;endif; ?>
        <script src="dashboardScript.js"></script>
    </body>
</html>