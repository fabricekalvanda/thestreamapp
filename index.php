<?php
session_start();

include( 'functions.php' );

$IMG_URL = 'https://image.tmdb.org/t/p/w500';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Streaming App</title>
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
  <nav> 
	<a href="index.php"><img src="#" alt="LOGO"></a>
      <div class="openMenu"><i class="fas fa-bars"></i></div>
      <ul class="nav-links" id="navLinks">
		<li><a href="#">MOVIES</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">LIVE TV</a></li>
		<li style="float: right;"><a href="register.html">Signup</a></li>
		<li style="float: right;"><a href="login.php">Login</a></li>
        <div class="closeMenu"><i class="fas fa-times"></i></div>
      </ul>
    </div>
  </nav>
  <div class="text-box">
    <h1>The World's Streaming Platform</h1>
    <p>The number one platform where you can keep up with your movies!</p>
    <!--<a href="#" class="hero-btn">WATCH</a> </div>-->
</section>

<!---------------- First Content Section ---------------->
<header>
  <form id="form" action="index.php" method="post">
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
			<img src='" . $IMG_URL . $results['results'][$movie ]['poster_path'] . "' alt='Image'>
			<div class='movie-info'>
				<h4>" . $results['results'][$movie]['title'] . "</h4>
				<span class='green'>
					" . $results['results'][$movie]['vote_average'] . "
				</span>
			</div>
			<div class='overview'>
				<h3>Overview</h3>
					<p style='font-size: 12px; padding: 5px;'>" . $results['results'][ $movie ]['overview'] . "</p>
					
					<form action='login.php' method='post'>
					<button class= 'save-btn' type = 'submit' name = 'save'>SAVE </button>
					</form>
			</div>
		</div>";
    $movie++;
  }
  echo '</section>';

} else {
  $API_URL = $BASE_URL . 'discover/movie?sort_by=popularity.desc&' . $API_KEY;
  $results = callAPI( $API_URL );
  echo '<section id="main">';
  for ( $movie = 0; $movie <= 19; ) {
    echo "
		<div style='width: 250px;' class='movie'>
			<img src='" . $IMG_URL . $results['results'][$movie]['poster_path']. "' alt='Image'>
			<div class='movie-info'>
				<h4>" . $results['results'][$movie]['title']. "</h4>
				<span class='green'>
					" . $results['results'][$movie]['vote_average']. "
				</span>
			</div>
			<div class='overview'>
				<h3>Overview</h3>
					<p style='font-size: 12px; padding: 5px;'>" . $results['results'][$movie]['overview']. "</p>
					<form action='login.php' method='post'>
					<button class= 'save-btn' type = 'submit' name = 'save'>SAVE </button>
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
