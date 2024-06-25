<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    if($_POST['work']==='load_pagi')
    {
        $query = "select * from teacher limit ".intval($_POST['records']);
        $result = pg_query($db,$query);
        $query = "select employee_id from teacher";
        $all_result = pg_query($db,$query);
        $q_count = "select count(*) as counS from teacher";
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
if($_POST['work']==='filterEmployee')
    {
        $query = "SELECT * from teacher where employee_id =".$_POST['employeeID'];
        $result = pg_query($db,$query);

        $query = "select employee_id from teacher";
        $all_result = pg_query($db,$query);
        $q_count = "select count(*) as counS from teacher where employee_id =".$_POST['employeeID'];
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
        $query = "SELECT * from teacher where $column_name ILIKE '%' || $1 || '%'";
        $stmt1 = pg_prepare($db,'myQuery',$query);
        $result = pg_execute($db,'myQuery',array($text));

        $query = "select employee_id from teacher";
        $all_result = pg_query($db,$query);
        $q_count = "SELECT count(*) from teacher where $column_name ILIKE '%' || $1 || '%'";
        $stmt2 = pg_prepare($db,'myQuery2',$q_count);
        $no_rows = pg_execute($db,'myQuery2',array($text));
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

if($_POST['work']==='view_emp')
    {
        $query = "select * from teacher where employee_id=".intval($_POST['emp_id']);
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
        $query = "delete from teacher where employee_id=".intval($_POST['emp_id']);
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
        $query = "UPDATE teacher SET teacher_name=$1,class10=$2,class12=$3,graduation=$4,pg=$5,experience=$6, address=$7,dob=$8,gender=$9,blood_group=$10,phone=$11,quali=$12,image=$13 WHERE employee_id=".intval($_POST['emp_id']);
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
        $max_value=$_POST['employee_id'];
        $image='';
        $query = "INSERT INTO teacher VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14)";
        $result = pg_query_params($db,$query,array($max_value,$t_name,$dob,$gender,$blood,$phone,$address,$class_10,$class_12,$grad,$pg,$ex,$image,$quali));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}

?>