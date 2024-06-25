<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    
if($_POST['work']==='view_event')
    {
        $no_of_data = $_POST['no_of_data'];
        $query = "select * from events LIMIT $no_of_data";
        $result = pg_query($db,$query);
        $query_total = "select count(*) from events";
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

if($_POST['work']==='addNew_event')
    {
        $e_date = $_POST['e_date'];
        $e_description = $_POST['e_description'];
        try{
            $query_c = "SELECT * FROM events where event_date=$1";
            $result_c = pg_query_params($db,$query_c,array($e_date));
            
        if(pg_num_rows($result_c) > 0){
            $query = "UPDATE events SET description=$1 where event_date=$2";
            $result = pg_query_params($db,$query,array($e_description,$e_date));
            
        }else{
            $query = "INSERT INTO events VALUES ($1,$2)";
            $result = pg_query_params($db,$query,array($e_date,$e_description));
        }
        }catch(Exception $e){
            $data='fail';
        }
        
        $query_total = "select count(*) from events";
        $pagination = pg_query($db,$query_total);
        $data = pg_fetch_result($pagination,0,0);
        
        echo json_encode($data);
}