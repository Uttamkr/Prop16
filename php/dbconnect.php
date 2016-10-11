<?php
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'u527760157_db');
// define('DB_USER','u527760157_db');
// define('DB_PASSWORD','Prop.Team123');

define('DB_HOST', 'localhost');
define('DB_NAME', 'u527760157_db');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(mysqli_connect_errno()){
	echo "Failed to connect to database. Please try again";
	mysqli_connect_error();
}
?>