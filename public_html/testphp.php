<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: testphp.php

Purpose: This PHP page is a redirect from Login which further categorizes the session-holder as a manager
		or an employee based on the manager boolean value.  It then redirects the user the the appropriate page
		
Description & Functionality:  This php file splits up the php action code from the forms it acts upon.  
		When the corresponding form is submitted, the login credentials and manager boolean
		are inserted into the s_login_employee table.  It was necessary to split these files up because otherwise 
		there would be premature header initiation errors.  


 -->



<?php //This is the login page for registered users

if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']=='')|| (!$valid_email))  //Either empty or invalid email will be considered missing
		$missing[] = 'email';
	else
		$email = $valid_email;

	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

	// Check for a password:
	if (empty($password))
		$missing[]='password';

	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		// Make the query:
		$sql = "SELECT firstName, emailAddr, pw, manager FROM s_login_employee WHERE emailAddr = :email";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])){
			echo $errorInfo[2];
			exit;
		}
		else {
			$rows = $stmt->rowCount();
			if ($rows==0) { //email not found
				$errors[] = 'email';
			}
			else { // email found, validate password
			
				$result = $stmt->fetch();

				if ($password == password_verify($password, $result['pw'])) { //passwords match
					$firstName = $result['firstName'];
					$manager = $result['manager'];
						
						//STORES SESSION ID'S
						session_start();
						$_SESSION['firstName']=$firstName;
						$_SESSION['email']= $email;
						$_SESSION['manager']= $manager;
						
						if ($manager == true) {
						//REDIRECTS TO ADMIN
						header("Location: https://webdev.cislabs.uncw.edu/~cma9162/admin.php");
						}
						else {
						//REDIRECTS TO EMPLOYEE
						header("Location: https://webdev.cislabs.uncw.edu/~cma9162/employee.php");
						}
						exit;
						
				}
				else {
					$errors[]='password';
				}
			}
		} // End of else errors

	}
} ?>