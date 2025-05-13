<?php

include('DBconnect.php');
include( 'functions.php' );


$userID = $_POST['userID'];
$userMoviePoster = $_POST['movie_poster_path'];
$userMovieTitle = $_POST['movie_title'];
$userMovieVoteAverage = $_POST['movie_vote_average'];
$userMovieOverview = $_POST['movie_overview'];

$sql = "INSERT INTO userlist VALUES('','$userID','$userMoviePoster','$userMovieTitle','$userMovieVoteAverage','$userMovieOverview');";

	
if(mysqli_query($con, $sql)){
	echo "<script>alert('Succefully Saved!');</script>";
	header( 'Location: home.php' );
}else{
	echo"Fail To Save!";
}
/*mysqli_close($con);
	header( 'Location: home.php' );*/





?>