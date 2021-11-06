<?php
session_start();
include('DBconnect.php');
include( 'functions.php' );

//This is the Movie poster URL 
$IMG_URL = 'https://image.tmdb.org/t/p/w500';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	
<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
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
    <p>The number one platform where you can keep up with your movies</p>
    <!--<a href="#" class="hero-btn">WATCH</a> </div>-->
</section>

<!---------------- Bigining of Content Section ---------------->

<!---------------- Search Section ---------------->
<header>
  <form id="form" action="home.php" method="post">
    <input type="text" name="search" placeholder="search" id="search"
		class="search" >
  </form>
</header>


<!------------------This Dynamically populate the movie cards to the page------------------>
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
					
					<input type='hidden' id='userID' name='userID' 
					value='" . $_SESSION[ 'id' ] . "'>
					<input type='hidden' id='movie_poster_path' name='movie_poster_path' 
					value='" . $results[ 'results' ][ $movie ][ 'poster_path' ] . "'>
					<input type='hidden' id='movie_title' name='movie_title' 
					value='" . $results[ 'results' ][ $movie ][ 'title' ] . "'>
					<input type='hidden' id='movie_vote_average' name='movie_vote_average' 
					value='" . $results[ 'results' ][ $movie ][ 'vote_average' ] . "'>
					<input type='hidden' id='movie_overview' name='movie_overview' 
					value='" . $results[ 'results' ][ $movie ][ 'overview' ] . "'>
					
					<button class='save-btn' type='submit' name='save'> SAVE </button>
					<br/>
					
					<span id='response'><span>
					</form> 
			</div>
		</div>";
    $movie++;
  }
  echo '</section>';

/*<!-------------------------------- End of Search Section -------------------------------->*/

/*<!---------------- This populate dynamically the the movie cards ------------------------->*/
} else {
  $API_URL = $BASE_URL . 'discover/movie?sort_by=popularity.desc&' . $API_KEY;
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
					
					<input type='hidden' id='userID' name='userID' 
					value='" . $_SESSION[ 'id' ] . "'>
					<input type='hidden' id='movie_poster_path' name='movie_poster_path' 
					value='" . $results[ 'results' ][ $movie ][ 'poster_path' ] . "'>
					<input type='hidden' id='movie_title' name='movie_title' 
					value='" . $results[ 'results' ][ $movie ][ 'title' ] . "'>
					<input type='hidden' id='movie_vote_average' name='movie_vote_average' 
					value='" . $results[ 'results' ][ $movie ][ 'vote_average' ] . "'>
					<input type='hidden' id='movie_overview' name='movie_overview' 
					value='" . $results[ 'results' ][ $movie ][ 'overview' ] . "'>
					
					<button id='save-btn' class= 'save-btn' type = 'submit' name ='save'>SAVE </button>
					<br/>
					
					<span id='success'><span>
					</form> 
					
					
			</div>
		</div>";
    $movie++;
  }
  echo '</section>';
}
?>
</body>
<script src="script.js"></script>
</html>
