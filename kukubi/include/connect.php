<?php 

$host 		= 'localhost';
$username 	= 'root';
$password	= '';
$database 	= 'tfs_app';
$conn 		= mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL Database : ". mysqli_connect_errir();
}

?>