<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
    
        $query = "select image from parent where employee_id=".intval($_GET['emp_no']);
        $rows = pg_query($db,$query);
        $data = pg_fetch_assoc($rows);
        header("Content-type: image/jpeg");
        echo base64_decode($data);
?>