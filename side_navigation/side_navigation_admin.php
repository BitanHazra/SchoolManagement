<?php session_start(); ?>
        <div class="side_navigation_container">
            <div class="side_navigation_heading_container">
                <img src="/school_Management/side_navigation/icons/bird_2.jpg">
                <span class="company_name">S Management</span>
            </div>
            <div class="side_navigation_body">
                <a href="/school_Management/dashboard/dashboard.php"><span><img src="/school_Management/side_navigation/icons/icons8-dashboard-50 (1).png" class="nav_icon"></span>Dashboard</a>
                <a href="/school_Management/teachers/teachers.php"><span><img src="/school_Management/side_navigation/icons/icons8-teacher-50.png" class="nav_icon"></span>Teacher</a>
                <?php
    if(isset($_SESSION['admin'])): 
    if($_SESSION['admin']==1): ?>
                <a href="/school_Management/student/student.php"><span><img src="/school_Management/side_navigation/icons/icons8-student-50.png" class="nav_icon"></span>Student</a>
                <a href="/school_Management/parent/parent.php"><span><img src="/school_Management/side_navigation/icons/icons8-parents-50.png" class="nav_icon"></span>Parents</a>
                <button class="class_tab_button" onclick="openClass()">
                    <span>
                        <img src="/school_Management/side_navigation/icons/icons8-meeting-room-24.png" class="nav_icon">
                    </span>
                    Classes
                </button>
                <div class="school_drop" id="school_drop_id">
                    <a href="/school_Management/classes/classes.php" class="class_tab_class">Class</a>
                    
                    <a href="/school_Management/classes/subjects.php" class="class_tab_subject">Subject</a>
                
                </div>
                   
                <a href="/school_Management/events/events.php"><span><img src="/school_Management/side_navigation/icons/icons8-events-64.png" class="nav_icon"></span>Events</a>
                <a href="/school_Management/notifys/notifys.php"><span><img src="/school_Management/side_navigation/icons/icons8-dashboard-50 (1).png" class="nav_icon"></span>Notify</a>
            <?php endif;endif; ?>
            </div>
        </div>
        
        <script>
            function openClass(){
                var button_drop = document.getElementById('school_drop_id');
                if(button_drop.className.indexOf(' class_show')==-1){
                    button_drop.className = ' class_show';
                }else{
                    button_drop.className = button_drop.className.replace(' class_show','school_drop');
                }
            }
            function att_drop(){
                
                var button_drop = document.getElementById("attendence_button");
                if(button_drop.className.indexOf(' attendence_show')==-1){
                    button_drop.className += ' attendence_show';
                }else{
                    button_drop.className = button_drop.className.replace(' attendence_show','');
                }
            }
            
        </script>
        <style>
            .side_navigation_heading_container img{
                width:40px;
                height:40px;
            }
            .side_active{
                background: rgb(233, 187, 187);
            }
            .class_attendence{
                display: none;
                flex-direction: column;
            }
            .attendence_show{
                display: flex;
                background: #f3f0f7;
            }
            .class_show{
                display: flex;
                flex-direction: column;
            }
            .attendence_button{
                text-decoration: none;
                border-bottom: 1px solid #dac6f8;
                padding: 15px 25px;
                color: black;
            }
            .class_tab_button{
                text-decoration: none;
                border-bottom: 1px solid #dac6f8;
                padding: 15px 25px;
                color: black;
            }
            .class_tab_button:hover,.attendence:hover{
                cursor: pointer;
                background: #f3d7d7;
                color: #6946c9;
            }
            .school_drop{
                display: none;
                flex-direction: column;
            }
            .school_drop a,.class_show a{
                background: #f3f0f7;
            }
        </style>
        

    