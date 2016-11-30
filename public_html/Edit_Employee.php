<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Edit_Employee.php
Purpose: Allows the user to edit their person employee information using an autofilled form
		nearly identical to the add_employee tag.  This familiarity improves useability.
Description & Functionality: The process is as follows
		1. Connects to db.
		2. Queries db for current session employees tuple from s_employee table. 
		3. Fetches and assigns local variables.  
		4. Autofills variables in forms.  
		5. Users are given the option to edit these autofilled values and resubmit
		6. Upon clicking the submit button, the old employee row is deleted from s_employee
			and s_login_employee and the new entry is inserted into both. This is a 
			transactional process.  


 -->


<?php //This page checks for required content, errors, and provides sticky output
// 	require 'includes/Ca_Header.php';

//reads in current User's employee row based on session email
	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		// Make the query:
		$sql = "SELECT * FROM s_employee WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':email', $_SESSION['email']);
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
					$fn = $result['fname'];
					$ln = $result['lname'];
					$ad = $result['address'];
					$ci = $result['city'];
					$st = $result['state'];
					$zi = $result['zip'];
					$ph = $result['phone'];
					$em = $result['email'];
					$man = $result['manager'];
					
				}
			}
		}



//Submits modified data into database.  Deletes old employee row and makes an update to all but the e_id attribute


       //
       // -In the forms below, the <form> tags open the form and denote the type of form as 'post'
       //
       // -The label tags are used to label the forms, placeholder class is occasionally used 
       // 	to hint at the type of value required.
       //
       // -The input tags are used to contain and modify the appearance of the input boxes.
       //
       
       
	if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

	$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($firstname))
		$missing[]='firstname';

	$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($lastname))
		$missing[]='lastname';

	$address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($address))
		$missing[]='address';
		
	$city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($city))
		$missing[]='city';
		
	$state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($state))
		$missing[]='state';
		
	$zipcode = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($zipcode))
		$missing[]='zipcode';
		
	$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($phone))
		$missing[]='phone';

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']==''))
		$missing[] = 'email';
	elseif (!$valid_email)
		$errors[] = 'email';
	else
		$email = $valid_email;
		
	$manager = filter_input(INPUT_POST, 'manager');
	if (empty($manager))
		$manager = '0';
	else
		$manager = '1';

	$password1 = trim(filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING));
	$password2 = trim(filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING));
	
	// Check for a password:
	if (empty($password1) || empty($password2))
		$missing[]='password';
	elseif ($password1 !== $password2)
			$errors[] = 'password';
	else $password = $password1;

	$accepted = filter_input(INPUT_POST, 'terms');
	if (empty($accepted) || $accepted !='accepted')
		$missing[] = 'accepted';



	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		$sql = 'INSERT into s_login_employee (firstName, lastName, emailAddr, pw, manager) VALUES (:fname, :lname, :email, :pw, :manager); INSERT into s_employee (fname, lname, address, city, state, zip, phone, email, manager) VALUES (:fname, :lname, :address, :city, :state, :zipcode, :phone, :email, :manager)';

		
// 	It is necessary to bind a new variable for every single variable passed to the db
//	Or an error would be thrown.  The first grouping is for the s_login_employee insert.  

	//Must prepare sql statement for security purposes (protects against injection attacks
	$stmt= $conn->prepare($sql);
	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':lname', $lastname);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':pw', password_hash($password1, PASSWORD_DEFAULT));
	$stmt->bindValue(':manager', $manager);
	
	$stmt->bindValue(':e_id', $e_id);
	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':lname', $lastname);
	$stmt->bindValue(':address', $address);
	$stmt->bindValue(':city', $city);
	$stmt->bindValue(':state', $state);
	$stmt->bindValue(':zipcode', $zipcode);
	$stmt->bindValue(':phone', $phone);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':manager', $manager);


	$success = $stmt->execute();
	$errorInfo = $stmt->errorInfo(); 
// 	header("Location: admin.php");
	if (isset($errorInfo[2]))
		echo $errorInfo[2];
	else
		echo '<main><h2>Thank you for registering</h2><h3>We have saved your information</h3></main>';

// 	header("Location: admin.php");
// 	exit;
	}
}?>

<!--               <label class="mdl-textfield__label" for="pw">Password... -->










//DISPLAYS FORM
       // -In the forms below, the <form> tags open the form and denote the type of form as 'post'
       //
       // -The label tags are used to label the forms, placeholder class is occasionally used 
       // 	to hint at the type of value required.
       //
       // -The input tags are used to contain and modify the appearance of the input boxes.
       //
	<main>
        <h2>Shift</h2>
        

    
        <h4>Hello <?php echo $_SESSION['firstName']; ?>,</h4>

        <p>Make changes as necessary to your Employee information below.</p>
        <form method="post" action="">
			<fieldset>
				<legend>Please Register:</legend>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="fn">First Name:
				<?php if ($missing && in_array('firstname', $missing)) { ?>
                        <span class="warning">Please enter your first name</span>
                    <?php } ?> </label>
                <input name="firstname" id="fn" type="text" value=<?php echo $fn ?>
				 <?php if (isset($firstname)) {
                    echo 'value="' . htmlspecialchars($firstname) . '"';
                } ?>
            </p>
			<p>
                <label for="ln">Last Name:
				<?php if ($missing && in_array('lastname', $missing)) { ?>
                        <span class="warning">Please enter your last name</span>
                    <?php } ?> </label>
                <input name="lastname" id="ln" type="text" value=<?php echo $ln ?>
				 <?php if (isset($lastname)) {
                    echo 'value="' . htmlspecialchars($lastname) . '"';
                } ?>
            </p>
            
            <p>
            	<label for="ln">Address: 
            	<?php if ($missing && in_array('address', $missing)) { ?>
            			<span class="warning">Please enter your Address</span>
            		<?php } ?> </label>
            	<input name="address" id="ln" type="text" value=<?php echo $ad ?>
            	<?php if (isset($address)) {
            		echo 'value="' . htmlspecialchars($address) . '"';
            	} ?>
            </p>
            
            <p>
            	<label for="ln">City: 
            	<?php if ($missing && in_array('city', $missing)) { ?>
            			<span class="warning">Please enter your City</span>
            		<?php } ?> </label>
            	<input name="city" id="ln" type="text" value=<?php echo $ci ?>
            	<?php if (isset($city)) {
            		echo 'value="' . htmlspecialchars($city) . '"';
            	} ?>
            </p>
            
            <p>
            	<label for="ln">State: 
            	<?php if ($missing && in_array('state', $missing)) { ?>
            			<span class="warning">Please enter your State</span>
            		<?php } ?> </label>
            	<input name="state" id="ln" type="text" value=<?php echo $st ?>
            	<?php if (isset($state)) {
            		echo 'value="' . htmlspecialchars($state) . '"';
            	} ?>
            </p>
            
            <p>
            	<label for="ln">Zipcode: 
            	<?php if ($missing && in_array('zipcode', $missing)) { ?>
            			<span class="warning">Please enter your Zipcode</span>
            		<?php } ?> </label>
            	<input name="zipcode" id="ln" type="text" value=<?php echo $zi ?>
            	<?php if (isset($zipcode)) {
            		echo 'value="' . htmlspecialchars($zipcode) . '"';
            	} ?>
            </p>
            
            <p>
            	<label for="ln">Phone: 
            	<?php if ($missing && in_array('phone', $missing)) { ?>
            			<span class="warning">Please enter your Phone number</span>
            		<?php } ?> </label>
            	<input name="phone" id="ln" type="text" value=<?php echo $ph ?>
            	<?php if (isset($phone)) {
            		echo 'value="' . htmlspecialchars($phone) . '"';
            	} ?>
            </p>
            
 
            
            <p>
                <label for="email">Email:
				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not valid</span>
                    <?php } ?>
				</label>
                <input name="email" id="email" type="text" value=<?php echo $em ?>
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>
            </p>
            <p>
            <?php if ($missing && in_array('manager', $missing)) { ?>
<!--                         <span class="warning">You must agree to the terms</span><br> -->
                    <?php } ?>
                <input type="checkbox" name="manager" value=<?php echo $man ?> id="manager"
				     <?php if ($accepted) {
                                echo 'checked';
                            } ?>
				>
                <label for="terms">Is this Employee a Manager?</label>
            </p>
			<p>
			
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The entered passwords do not match. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw1">Password:

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password1" id="pw1" type="password">
            </p>
			<p>
                <label for="pw2">Confirm Password:
				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please confirm the password</span>
                    <?php } ?> </label>
                <input name="password2" id="pw2" type="password">
            </p>

 
            <p>
                <button id="send" name="send" type="submit" class="mdl-button" value="clockin">Submit Edits</button>
<!--                 <input name="send" type="submit" value="Register"> -->
            </p>
		</fieldset>
        </form>
	</main>
