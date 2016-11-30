<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Ca_Login.php
Purpose: To provide a playform with which the system can verify the identity of 
		the client and either grant or restrict access to the website.  
Description & Functionality:  Takes in and email and unhashed password
		1. Filters and checks input strings, saves them to PHP local variables
		2. Check input email against the database to see if it belongs to a registered
			user.  
		3. If yes, it then hashes the password and sends it to the server to verify that the password is correct.  
		4. If the password hash matches, the user is redirected to index.php
				Otherwise the user is given an error message and direted back to the login screen
		


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
		// Make the query to check e-mail against db.
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

				//If the password is correct, session
				if ($password == password_verify($password, $result['pw'])) { //passwords match
					$firstName = $result['firstName'];
					$manager = $result['manager'];


				//If the password is correct, session variables for name,email and manager are stored.  
					session_start();
					$_SESSION['firstName']=$firstName;
					$_SESSION['email']= $email;
					$_SESSION['manager']= $manager;
// 					User is redirected to the Administrative menu
					header("Location: https://webdev.cislabs.uncw.edu/~cma9162/admin.php");
					exit;

				}
				else {
					$errors[]='password';
				}
			}
		} // End of else errors

	}
}
?><main>
       //
       // -In the forms below, the <form> tags open the form and denote the type of form as 'post'
       //
       // -The label tags are used to label the forms, placeholder class is occasionally used 
       // 	to hint at the type of value required.
       //
       // -The input tags are used to contain and modify the appearance of the input boxes.
       //
       
       
        <p>Login if you are an employee. Please enter your worker Email address and password.</p>
        <form method="post" action="">
			<fieldset>
				<legend>Registered Users Login</legend>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="email">Please enter your email address:

				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">An email address is required</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not associated with an account</span>
                    <?php } ?>
				</label>
                <input name="email" id="email" type="text"
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>
            </p>
			<p>
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The password supplied does not match the password for this email address. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw">Password:

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password" id="pw" type="password">
            </p>

            <p>
                <input name="send" type="submit" value="Login">
            </p>
		</fieldset>
        </form>
	</main>

