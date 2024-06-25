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
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pagination"=>$pagination
        );
        header('Content-Type: application/json');
    echo json_encode($data);
}

if($_POST['work']==='addNew_notify')
    {
        $e_date = $_POST['e_date'];
        $e_description = $_POST['e_description'];
        try{
            $query_c = "SELECT * FROM notifys where notify_date=$1";
            $result_c = pg_query_params($db,$query_c,array($e_date));
            
        if(pg_num_rows($result_c) > 0){
            $query = "UPDATE notifys SET description=$1 where notify_date=$2";
            $result = pg_query_params($db,$query,array($e_description,$e_date));
            
        }else{
            $query = "INSERT INTO notifys VALUES ($1,$2)";
            $result = pg_query_params($db,$query,array($e_date,$e_description));
        }
        }catch(Exception $e){
            $data='fail';
        }
        
        $no_of_data = $_POST['no_of_data'];
        $query = "select * from notifys LIMIT $no_of_data";
        $result = pg_query($db,$query);
        $query_total = "select count(*) from notifys";
        $pagination = pg_query($db,$query_total);
        $pagination = pg_fetch_result($pagination,0,0);
            
        $rows = array();
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row; 
        }
        $data=array(
            "rows"=>$rows,
            "pagination"=>$pagination
        );
        header('Content-Type: application/json');
        echo json_encode($data);
}