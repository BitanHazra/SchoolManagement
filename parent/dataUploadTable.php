<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    if($_POST['work']==='load_pagi')
    {
        $query = "select student_name,father_name,mother_name,p.phone,std from student s
        LEFT JOIN 
        parent p
        ON s.student_id=p.student_id limit ".intval($_POST['records']);
        $result = pg_query($db,$query);
        $queryClass = "select distinct(std) from student s
        LEFT JOIN 
        parent p
        ON s.student_id=p.student_id order by std asc";
        $resultClass = pg_query($db,$queryClass);
        $checkBoxQuery = "select * from login";
        $checkData = pg_query($db,$checkBoxQuery);
        $q_count = "select count(*) as counS from parent";
        $no_rows = pg_query($db,$q_count);
        $pagination_length = pg_fetch_result($no_rows,0,0);
            
        $rows = array();
        $checkResult = array();
        $arrayClass = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        while($row = pg_fetch_assoc($checkData)){
            $checkResult[] = $row; 
        }
        while($row = pg_fetch_assoc($resultClass)){
            $arrayClass[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pages"=>$pagination_length,
            "checkResult"=>$checkResult,
            "student_class"=>$arrayClass
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='view_emp')
    {
        $query = "select * from parent where parent_id=".intval($_POST['emp_id']);
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
if($_POST['work']==='delete_emp')
    {
        $query = "delete from parent where parent_id=".intval($_POST['emp_id']);
        $result = pg_query($db,$query);
            
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='update')
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
        $query = "UPDATE parent SET parent_name=$1,class10=$2,class12=$3,graduation=$4,pg=$5,experience=$6, address=$7,dob=$8,gender=$9,blood_group=$10,phone=$11,quali=$12,image=$13 WHERE parent_id=".intval($_POST['emp_id']);
        $result = pg_query_params($db,$query,array($t_name,$class_10,$class_12,$grad,$pg,$ex,$address,$dob,$gender,$blood,$phone,$quali,$fileData));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='addNew')
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

        $query_findmax = "SELECT MAX(parent_id) FROM parent";
        $result = pg_query($db,$query_findmax);
        $max_value=pg_fetch_result($result,0,0)+1;
        $query = "INSERT INTO parent VALUES ($max_value,$1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,'',$12)";
        $result = pg_query_params($db,$query,array($t_name,$dob,$gender,$blood,$phone,$address,$class_10,$class_12,$grad,$pg,$ex,$quali));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='giveAccess'){
    $username = $_POST['parentNumber'];
    $password = $_POST['studentName'];
    $admin = 0;
    $query = "SELECT * FROM username=$username";
    $result = pg_query($db,$query);
    if($result>0){
        $query = "UPDATE login SET username=$1,password=$2,admin$3 where username=$4";
        $result = pg_query_params($db,$query,array($username,$password,$admin,$username));
    }else{
        $query = "INSERT INTO login(username,password,admin) VALUES($1,$2,$3)";
        $result = pg_query_params($db,$query,array($username,$password,$admin));
    }

    header('Content-Type: application/json');
    echo json_encode($admin);
}
if($_POST['work']==='removeAccess'){
    $username = $_POST['parentNumber'];
    $password = $_POST['studentName'];
    $admin = 0;

    $query = "DELETE FROM login WHERE password='$password'";
    $result = pg_query($db,$query);

    header('Content-Type: application/json');
    echo json_encode($admin);
}
if($_POST['work']==='filterEmployee')
    {
        $pageRecord = 9;
        $std = $_POST['employeeID'];
        $query = "select student_name,father_name,mother_name,p.phone,std from student s
        LEFT JOIN 
        parent p
        ON s.student_id=p.student_id where s.std=$1 limit $2";
        $result = pg_query_params($db,$query,array($std,$pageRecord));

        $query = "select distinct(std) from student order by std asc";
        $all_result = pg_query($db,$query);
        $q_count = "select count(*) as counS from student where std =".$_POST['employeeID'];
        $no_rows = pg_query($db,$q_count);
        $pagination_length = pg_fetch_result($no_rows,0,0);
            
        $rows = array();
        $data_all_result = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        while($all_data = pg_fetch_assoc($all_result)){
            $data_all_result[] = $all_data; 
        }
        $data=array(
            "rows"=>$rows,
            "data_all_result"=>$data_all_result,
            "pages"=>$pagination_length,
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
if($_POST['work']==='searchEmployee')
    {
        $text = $_POST['employeeID'];
        $column_name = $_POST['optionSearch'];
        $pageRecord = 9;

        $query = "select student_name,father_name,mother_name,p.phone,std from student s
        LEFT JOIN 
        parent p
        ON s.student_id=p.student_id where s.student_name ILIKE '%' || $1 || '%' limit $2";
        $result = pg_query_params($db,$query,array($text,$pageRecord));

        $query = "select std from student";
        $all_result = pg_query($db,$query);
        $q_count = "select count(*) from student s
        LEFT JOIN 
        parent p
        ON s.student_id=p.student_id where s.student_name ILIKE '%' || $1 || '%' limit $2";
        $no_rows = pg_query_params($db,$q_count,array($text,$pageRecord));
        $pagination_length = pg_fetch_result($no_rows,0,0);

        $checkBoxQuery = "select * from login";
        $checkData = pg_query($db,$checkBoxQuery);
            
        $rows = array();
        $data_all_result = array();
        $checkResult = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        while($all_data = pg_fetch_assoc($all_result)){
            $data_all_result[] = $all_data; 
        }
        while($row = pg_fetch_assoc($checkData)){
            $checkResult[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "data_all_result"=>$data_all_result,
            "pages"=>$pagination_length,
            "checkResult"=>$checkResult
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}
?>