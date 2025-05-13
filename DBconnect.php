<?php
/*action='https://classdemo.amerabyte.net/Student_Tools/process.php'*/


$dbhost = "localhost";
$dbuser = "u690560968_fabricekalvand";
$dbpass = "2UY9E8v!";
$dbname = "u690560968_moviestreaming";

$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if ( mysqli_connect_errno() ) {
  // If there is an error with the connection, stop the script and display the error.
  exit( 'Failed to connect to MySQL: ' . mysqli_connect_error() );
}

