<?php
session_start();

include('DBconnect.php');


//Now we check if the data from the login form was submitted, 
//isset() will check if the data exist
if ( !isset( $_POST[ 'username' ], $_POST[ 'password' ] ) ) {
  //Could not get the data that should have been sent.
  exit( 'Please fill both the username and password fields!' );
	
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ( $stmt = $con->prepare( 'SELECT userId, password FROM users WHERE username = ?' ) ) 
{
  // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
  $stmt->bind_param( 's', $_POST[ 'username' ] );
  $stmt->execute();
  // Store the result so we can check if the account exists in the database.
  $stmt->store_result();

  if ( $stmt->num_rows > 0 ) {
    $stmt->bind_result( $userID, $password );
    $stmt->fetch();
    // Account exists, now we verify the password.

    if ( password_verify( $_POST[ 'password' ], $password ) ) {
      // Verification success! User has logged-in!
      // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
      session_regenerate_id();
      $_SESSION[ 'loggedin' ] = TRUE;
      $_SESSION[ 'name' ] = $_POST[ 'username' ];
      $_SESSION[ 'id' ] = $userID;
      echo 'Welcome ' . $_SESSION[ 'name' ] . '!';
	  header( 'Location: home.php' );
    }else {
      // Incorrect Username
	  	$alert = "<srcipt>alert('Username or Password not correct!')</script>";
		echo $alert;
	  header( 'Location: login.php' );
    }
  }else {
      // Incorrect password
	  	$alert = "<srcipt>alert('Username or Password not correct!')</script>";
		echo $alert;
	  header( 'Location: login.php' );
    }
}
  $stmt->close();
?>
