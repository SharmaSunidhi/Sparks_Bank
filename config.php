<?php
$user = 'root';
$password = '';
$database = 'bank';
$servername='localhost';
$mysqli = mysqli_connect($servername, $user,
                $password, $database);
if(!$mysqli){
		die("Could Not Connect to the database".mysqli_connect_error());
}
?>
