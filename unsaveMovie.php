<?php

session_start();
include( 'functions.php' );
include('DBconnect.php');

$IMG_URL = 'https://image.tmdb.org/t/p/w500';




$userID = $_POST['userID'];
$userMoviePoster = $_POST['movie_poster_path'];
$userMovieTitle = $_POST['movie_title'];
$userMovieVoteAverage = $_POST['movie_vote_average'];
$userMovieOverview = $_POST['movie_overview'];

$sql = "DELETE FROM userlist 
	WHERE userID = '$userID' AND 
	movie_poster_path= '$userMoviePoster' AND 
	movie_title = '$userMovieTitle' AND 
	movie_vote_average = '$userMovieVoteAverage' AND 
	movie_overview = '$userMovieOverview'";

mysqli_query($con, $sql);
	header( 'Location: userList.php' );





?>