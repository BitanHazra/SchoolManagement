<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    if($_POST['work']==='load_pagi')
    {
        $query = "select c.std,t.teacher_name from class_info c
        LEFT JOIN
        teacher t
        ON c.class_teacher=t.employee_id limit ".intval($_POST['records']);
        $result = pg_query($db,$query);
        $query_teacher_name = "select teacher_name from teacher";
        $resultName = pg_query($db,$query_teacher_name);
        $q_count = "select count(*) as counS from class_info";
        $no_rows = pg_query($db,$q_count);
        $pagination_length = pg_fetch_result($no_rows,0,0);
            
        $rows = array();
        $teacherName = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        while($row = pg_fetch_assoc($resultName)){
            $teacherName[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pages"=>$pagination_length,
            "teacherName"=>$teacherName
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='load_pagi_subject')
    {
        $query = "select subject_code,subject,teacher,t.teacher_name from subject_info s
        LEFT JOIN 
        teacher t
        ON s.std=t.employee_id limit ".intval($_POST['records']);
        $result = pg_query($db,$query);
        $q_count = "select count(*) as counS from subject_info";
        $no_rows = pg_query($db,$q_count);
        $pagination_length = pg_fetch_result($no_rows,0,0);
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pages"=>$pagination_length,
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='updateData')
    {
        $className = $_POST['className'];
        $classTeacher = $_POST['teacherName'];
        $query = "UPDATE class_info set class_teacher = 
        (select employee_id from teacher where teacher_name=$1)
        where std=$2";
        $result = pg_query_params($db,$query,array($classTeacher,$className));

        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='deleteData')
    {
        $className = $_POST['className'];
        $classTeacher = $_POST['teacherName'];
        $query = "DELETE FROM class_info WHERE std=$1";
        $result = pg_query_params($db,$query,array($className));

        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='newData')
    {
        $className = $_POST['className'];
        $classTeacher = $_POST['teacherName'];
        $queryEmp = "SELECT employee_id FROM teacher WHERE teacher_name='$classTeacher'";
        $employeeIDQ = pg_query($db,$queryEmp);
        $employeeIDQresult=0;
        while($rows = pg_fetch_assoc($employeeIDQ)){
            $employeeIDQresult = $rows;
        }
        $query = "INSERT INTO class_info VALUES ($1,$2)";
        $result = pg_query_params($db,$query,array($className,$employeeIDQresult));

        header('Content-Type: application/json');
        echo json_encode(1);
}
?>