<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Ca_Logged_Out.php
Purpose: This is the page you are redirected to after logging out from any page.  
Description & Functionality: The purpose of this page is to clear out the session id's,
		clear cookies, and destroy the session information.  It also echo's 


 -->

<!-- Opens a new session -->
<?php session_start();

//redirects to home page upon logging out
	header("Location: index.php");
	
	//destoys session if session id is present
		if (isset($_SESSION['firstName'])){
			$firstname = $_SESSION['firstName'];
			$_SESSION = array();
			
// 			Destroys session data and all connections.  
			session_destroy();
			
// 			times out all active cookies.  
			setcookie('PHPSESSID', '', time()-3600, '/');
			$message = "You are now logged out, $firstname";
			$message2 = "See you next time";
		} else {
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';
		}
		
		//HTML below structures the messages for diplay within the browser.  
		?>
		<main>
		<?php
		echo '<h2>'.$message.'</h2>';
		echo '<h3>'.$message2.'</h3>';
		?>

	</main>

