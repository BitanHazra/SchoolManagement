<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="notifysstyle.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/side_navigation.css">
        <link rel="stylesheet" href="/school_Management/side_navigation/top_navigationstyle.css">
    
    </head>
    <body>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\side_navigation_admin.php';?>
    <?php include 'C:\xampp\htdocs\school_Management\side_navigation\top_navigation.php';?>    
    <?php if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1): ?>
        <div class="second_nav">
            <div class="heading_con">
                <span class="heading"><a href="/school_Management/notifys/notifys.php">NOTIFICATION</a></span><span class="path">Home / <a href="/school_Management/notifys/notifys.php"> Notification</a></span>
            </div>
        </div>
        <div class="teachers_table">
            <div class="teacher_table_main">
                <div class="right_container">
                    <h2>NOTIFICATION</h2>
                    <label for="select_class">Notify Detail:</label>
                    <input type="text" class='notify_detail'>
                    <label for="Date_input">Date</label>
                    <input type="date" class='notify_date'>
                    <span><button id="Add_Update">Add/Update</button></span>
                </div>
                
                <div class="teacher_body_table" id="mtable">
                    <h3>NOTIFY OVERVIEW</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Notify Date</th>
                                <th>Notify Description</th>
                            </tr>
                            <tbody>
                                
                            </tbody>
                        </thead>
                    </table>
                    <div class="fotter_content">
                        <span>Show
                            <input type="number" id="no_of_data" min=0>
                            <span>of</span>
                            <span><span class="pagination_entry"></span> entries</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;endif; ?>
        <script src="notifys.js"></script>
    </body>
</html>