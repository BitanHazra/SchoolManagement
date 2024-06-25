<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    
if($_POST['work']==='view_att')
    {
        $query = "select * from attendence_s where rollno=".intval($_POST['rollno']);
        $result = pg_query($db,$query);
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='delete_att')
    {
        $query = "delete from attendence_s where rollno=".intval($_POST['rollno']);
        $result = pg_query($db,$query);
            
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='update_att')
    {
        $t_name = $_POST['name'];
        $address = $_POST['address'];
        $class_10 = $_POST['class_10'];
        $class_12 = $_POST['class_12'];
        $grad = $_POST['grad'];
        $pg = $_POST['pg'];
        $ex = $_POST['ex'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $phone = $_POST['phone'];
        $quali = $_POST['quali'];
        $fileData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
        header('Content-Type: image/jpeg');
        $query = "UPDATE attendence_s SET attendence_s_name=$1,class10=$2,class12=$3,graduation=$4,pg=$5,experience=$6, address=$7,dob=$8,gender=$9,blood_group=$10,phone=$11,quali=$12,image=$13 WHERE student_id=".intval($_POST['emp_id']);
        $result = pg_query_params($db,$query,array($t_name,$class_10,$class_12,$grad,$pg,$ex,$address,$dob,$gender,$blood,$phone,$quali,$fileData));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='addNew_att')
    {
        $t_name = $_POST['name'];
        $address = $_POST['address'];
        $class_10 = $_POST['class_10'];
        $class_12 = $_POST['class_12'];
        $grad = $_POST['grad'];
        $pg = $_POST['pg'];
        $ex = $_POST['ex'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $phone = $_POST['phone'];
        $quali = $_POST['quali'];

        $query_findmax = "SELECT MAX(r) FROM attendence_s";
        $result = pg_query($db,$query_findmax);
        $max_value=pg_fetch_result($result,0,0)+1;
        $query = "INSERT INTO attendence_s VALUES ($max_value,$1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,'',$12)";
        $result = pg_query_params($db,$query,array($t_name,$dob,$gender,$blood,$phone,$address,$class_10,$class_12,$grad,$pg,$ex,$quali));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}