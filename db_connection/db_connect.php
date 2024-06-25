<?php 
            $host        = "host = localhost";
            $port        = "port = 5432";
            $dbname      = "dbname = school";
            $user        = "user = postgres";
            $password    = "password = Bitan"; // Provide your PostgreSQL password here
         
            $db = pg_connect( "$host $port $dbname $user $password" );
            
?>