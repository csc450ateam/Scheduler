<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Ca_Logged_In.php
Purpose: This is the page that the login page redirects to when proper login credentials
		are passed. 
Description & Functionality:  Establishes a secure connection vio https first, then checks the session id's
		to ensure that the user is still logged in.  Echo's a message to congratulate the user
		for having successfully logged in.  


 -->

//Ensures secure connection
<?php require_once ('secure_conn.php');
  // Access the existing session variables.
session_start();
//runs header php page.
require 'includes/Ca_Header.php';


?>
<html>
<body>
	<main>
	<?php //check for session variable
		if(isset($_SESSION['firstName'])){
		 	$firstname= $_SESSION['firstName'];
			$message = "Welcome back, $firstname";
			$message2 = "You are now logged in...!";
		} else {
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';
		}
		// Print the message:
		echo '<h2>'.$message.'</h2>';
		echo '<h3>'.$message2.'</h3>';
		?>

	</main>
	<?php // Include the footer and quit the script:
			include ('./includes/Ca_Footer.php');
			?>
			
			</body>
</html>