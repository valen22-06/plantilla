<?php

$host = "localhost";
$port = "5432";
$dbname = "Geovisor";
$user = "postgres";
$password = "";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

pg_close($conn);
?>