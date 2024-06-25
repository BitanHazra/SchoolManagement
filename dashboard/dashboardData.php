<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    
if($_POST['work']==='view_notify')
    {
        $no_of_data = $_POST['no_of_data'];
        $query = "select * from notifys LIMIT $no_of_data";
        $result = pg_query($db,$query);
        $query_total = "select count(*) from notifys";
        $pagination = pg_query($db,$query_total);
        $pagination = pg_fetch_result($pagination,0,0);

        $student_total = "select count(*) from student";
        $s_total = pg_query($db,$student_total);
        $s_total = pg_fetch_result($s_total,0,0);

        $parent_total = "select count(*) from parent";
        $p_total = pg_query($db,$parent_total);
        $p_total = pg_fetch_result($p_total,0,0);

        $teacher_total = "select count(*) from teacher";
        $t_total = pg_query($db,$teacher_total);
        $t_total = pg_fetch_result($t_total,0,0);

        $class_total = "select count(*) from class_info";
        $c_total = pg_query($db,$class_total);
        $c_total = pg_fetch_result($c_total,0,0);
        
        
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pagination"=>$pagination,
            "s_total"=>$s_total,
            "p_total"=>$p_total,
            "t_total"=>$t_total,
            "c_total"=>$c_total,
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='activity_calender')
    {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $query = "select * from events where event_date > $1 and event_date < $2";
        $result = pg_query_params($db,$query,array($from_date,$to_date));
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='login'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT admin FROM login where username='$username' and password='$password'";
    $result = pg_query($db,$query);
    $admin = pg_fetch_result($result,0,0);
    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['admin'] = $admin;

    header('Content-Type: application/json');
    echo json_encode($admin);
}
if($_POST['work']==='logout'){
    session_start();
    $_SESSION = array();
    session_destroy();
    
    header('Content-Type: application/json');
    echo json_encode(1);
}
?>