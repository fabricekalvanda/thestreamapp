<?php
session_start();
include('DBconnect.php');
include( 'functions.php' );

$IMG_URL = 'https://image.tmdb.org/t/p/w500';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>My Saved Movies</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>
	
	<section class="header">
  <nav> <a href="home.php"><img src="#" alt="LOGO"></a>
    <div class="openMenu"><i class="fas fa-bars"></i></div>
    <ul class="nav-links" id="navLinks">
      <li><a href="userList.php">MY LIST</a></li>
      <li><a href="#">SHOWS</a></li>
      <li><a href="#">LIVE TV</a></li>
      <li style="float: right;"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>
        <?=$_SESSION['name']?>
        , Welcome back! Logout</a></li>
      <div class="closeMenu"><i class="fas fa-times"></i></div>
    </ul>
    </div>
  </nav>
  <div class="text-box">
    <h1>The World's Streaming Platform</h1>
    <p>The number one platform where you can keep up with your favorite movies</p>
    <!--<a href="#" class="hero-btn">WATCH</a> </div>-->
</section>
	
<!---------------- Search Section ---------------->
<header>
  <form id="form" action="userList.php" method="post">
    <input type="text" name="search" placeholder="search" id="search"
		class="search" >
  </form>
</header>

<?php
if ( isset( $_POST[ 'search' ] ) && $_POST[ 'search' ] != '' ) {
  $terms = urlencode( $_POST[ 'search' ] );
  $API_URL = $BASE_URL . 'search/movie?' . $API_KEY . '&query=' . $terms . '&page=1&include_adult=false';
  $results = callAPI( $API_URL );
  echo '<section id="main">';
  for ( $movie = 0; $movie <= 19; ) {
    echo "
		<div style='width: 250px;' class='movie'>
			<img src='" . $IMG_URL . $results[ 'results' ][ $movie ][ 'poster_path' ] . "' alt='Image'>
			<div class='movie-info'>
				<h4>" . $results[ 'results' ][ $movie ][ 'title' ] . "</h4>
				<span class='green'>
					" . $results[ 'results' ][ $movie ][ 'vote_average' ] . "
				</span>
			</div>
			<div class='overview'>
				<h3>Overview</h3>
					<p style='font-size: 12px; padding: 5px;'>" . $results[ 'results' ][ $movie ][ 'overview' ] . "</p>
					<form action='jsonToMysql.php' method='post'>
					
					<input type='hidden' name='userID' 
					value='" . $_SESSION[ 'id' ] . "'>
					<input type='hidden' name='movie_poster_path' 
					value='" . $results[ 'results' ][ $movie ][ 'poster_path' ] . "'>
					<input type='hidden' name='movie_title' 
					value='" . $results[ 'results' ][ $movie ][ 'title' ] . "'>
					<input type='hidden' name='movie_vote_average' 
					value='" . $results[ 'results' ][ $movie ][ 'vote_average' ] . "'>
					<input type='hidden' name='movie_overview' 
					value='" . $results[ 'results' ][ $movie ][ 'overview' ] . "'>
					
					<button class='save-btn' type='submit' name='save'> SAVE </button>
					</form> 
			</div>
		</div>";
    $movie++;
  }
  echo '</section>';
}

$userName = $_SESSION['name'];

$query = "SELECT * FROM userlist JOIN users ON users.userID = userlist.userID WHERE users.username='$userName';";

$result = mysqli_query($con, $query);
$resultCheck = mysqli_num_rows($result);

echo '<section id="main">';
		  
if ($resultCheck > 0){
	foreach($result as $movieDB){
		echo "
		<div style='width: 250px;' class='movie'>
			<img src='" . $IMG_URL . $movieDB[ 'movie_poster_path' ] . "' alt='Image'>
			<div class='movie-info'>
				<h4>" . $movieDB[ 'movie_title' ] . "</h4>
				<span class='green'>
					" . $movieDB[ 'movie_vote_average' ] . "
				</span>
			</div>
			<div class='overview'>
				<h3>Overview</h3>
					<p style='font-size: 12px; padding: 5px;'>" . $movieDB[ 'movie_overview' ] . "</p>
					<form action='unsaveMovie.php' method='post'>
					
					<input type='hidden' name='userID' 
					value='" . $_SESSION[ 'id' ] . "'>
					<input type='hidden' name='movie_poster_path' 
					value='" . $movieDB[ 'movie_poster_path' ] . "'>
					<input type='hidden' name='movie_title' 
					value='" . $movieDB[ 'movie_title' ] . "'>
					<input type='hidden' name='movie_vote_average' 
					value='" . $movieDB[ 'movie_vote_average' ] . "'>
					<input type='hidden' name='movie_overview' 
					value='" . $movieDB[ 'movie_overview' ] . "'>
					
					<button class='save-btn' type='submit' name='unsave'> UNSAVE </button>
					</form> 
					
					
			</div>
		</div>";
	}
}else{
	echo'<h3>You have no Saved Movie!<h3>';
}

echo '</section>';

	  
?>
	
</body>
<script src="script.js"></script>
</html>
