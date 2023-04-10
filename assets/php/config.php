<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('servername', 'localhost');
define('username', 'root');
define('password', 'ab3135c2@');
define('dbname', 'discogram');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(servername, username, password, dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>