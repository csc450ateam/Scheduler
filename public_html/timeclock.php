


<?php

if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

		$e_id = trim(filter_input(INPUT_POST, 'e_id', FILTER_SANITIZE_STRING));



	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		// Make the query:
		$sql = "SELECT * FROM s_employee WHERE e_id = :e_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':e_id', $e_id);
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

					$Name = $result['fname'] . " " . $result['lname'];
					$manager = $result['manager'];
					
					

// 
// 					session_start();
// 					$_SESSION['firstName']=$firstName;
// 					$_SESSION['email']= $email;
// 					$_SESSION['manager']= $manager;
// 					header("Location: https://webdev.cislabs.uncw.edu/~cma9162/admin.php");
// 					exit;

			}
		} // End of else errors

	}
}
?>



<main>
       
        <p>Enter the Employee's ID Number below.</p>
        <?php echo $Name; ?>
        <form method="post" action="">
			<fieldset>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="e_id">Employee Number:

				<?php if ($missing && in_array('e_id', $missing)) { ?>
                        <span class="warning">An email address is required</span>
                    <?php } ?>
				<?php if ($errors && in_array('e_id', $errors)) { ?>
                        <span class="warning">The email address you provided is not associated with an account</span>
                    <?php } ?>
				</label>
                <input name="e_id" id="e_id" type="text"
				<?php if (isset($e_id) && !$errors['e_id']) {
                    echo 'value="' . htmlspecialchars($e_id) . '"';
                } ?>>
            </p>


            <p>
            <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
            <button id="clockin" name="send" type="submit" class="mdl-button" value="clockin">CLOCK IN</button>
                        <button id="clockout" name="send" type="submit" class="mdl-button" value="clockout">CLOCK OUT</button>
		<button type="button" class="mdl-button close">Cancel</button>
<!--                 <input name="send" type="submit" value="Enter"> -->
			</div>
            </p>
		</fieldset>
        </form>
	</main>





<?php
// Function to test input data, clean and filter it.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
