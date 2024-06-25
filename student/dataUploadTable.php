<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    if($_POST['work']==='load_pagi')
    {
        $query = "select * from student limit ".intval($_POST['records']);
        $result = pg_query($db,$query);
        $query = "select distinct(std) from student order by std asc";
        $all_result = pg_query($db,$query);
        $q_count = "select count(*) as counS from student";
        $no_rows = pg_query($db,$q_count);
        $pagination_length = pg_fetch_result($no_rows,0,0);
            
        $rows = array();
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
        $query = "SELECT * from student where std =".$_POST['employeeID'];
        $result = pg_query($db,$query);

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
        $query = "SELECT * from student where $column_name ILIKE '%' || $1 || '%'";
        $stmt1 = pg_prepare($db,'myQuery',$query);
        $result = pg_execute($db,'myQuery',array($text));

        $query = "select student_id from student";
        $all_result = pg_query($db,$query);
        $q_count = "SELECT count(*) from student where $column_name ILIKE '%' || $1 || '%'";
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
        $query = "select s.student_id,s.student_name,s.std,s.dob,s.blood_group,s.gender,s.address,p.father_name,p.mother_name,p.phone from student s
        LEFT JOIN
        parent p
        ON s.student_id=p.student_id
        where s.student_id=".intval($_POST['emp_id']);
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
        $query = "delete from student where student_id=".intval($_POST['emp_id']);
        $result = pg_query($db,$query);
        $query = "delete from parent where student_id=".intval($_POST['emp_id']);
        $result = pg_query($db,$query);
            
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='update')
    {
        $t_name = $_POST['name'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $phone = $_POST['phone'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $phone_no = $_POST['mobile_no'];
        
        $query = "UPDATE student SET student_name=$1, address=$2,dob=$3,gender=$4,blood_group=$5,phone=$6 WHERE student_id=".intval($_POST['emp_id']);
        $result = pg_query_params($db,$query,array($t_name,$address,$dob,$gender,$blood,$phone));

        $query = "UPDATE parent SET father_name=$1, mother_name=$2,phone=$3 WHERE student_id=".intval($_POST['emp_id']);
        $result = pg_query_params($db,$query,array($father_name,$mother_name,$phone_no));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}
if($_POST['work']==='addNew')
    {
        $t_name = $_POST['name'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $phone = $_POST['phone'];
        $std=$_POST['std'];
        $student_id = $_POST['emp_id'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $phone_no = $_POST['mobile_no'];

        $query_findmax = "SELECT MAX(student_id) FROM student";
        $result = pg_query($db,$query_findmax);
        $max_value=pg_fetch_result($result,0,0);
        $query = "INSERT INTO student(student_id,student_name,std,dob,gender,blood_group,phone,address,image)
         VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)";
        $result = pg_query_params($db,$query,array($student_id,$t_name,$std,$dob,$gender,$blood,$phone,$address,''));

        $query = "INSERT INTO parent(student_id,father_name,mother_name,phone,image)
         VALUES ($1,$2,$3,$4,$5)";
        $result = pg_query_params($db,$query,array($student_id,$father_name,$mother_name,$phone_no,''));
        
        header('Content-Type: application/json');
        echo json_encode(1);
}
?>