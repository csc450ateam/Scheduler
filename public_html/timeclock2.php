<?php
	require_once('../pdo_config.php'); //Connects to Database


	$search = $_POST['search_string']; //Assigns input to variable


$e_id = 1;

		$sql = 'SELECT * FROM s_employee where e_id = :e_id';
		
// 					$stmt=$conn->prepare($sql);
// 					$stmt->bindValue(':e_id', $e_id]);
// 					$result = $stmt ->execute()
// 					or die(mysql_error());


	$result = $conn->query($sql);
	foreach ($result as $row) { 
		$name = $row['fname'] . $row['lname'];
		$email = $row['email'];
		}
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
	
echo $name;
echo $email;
	
	echo 'Number of results: ' . $numRows;
	
					
			if (isset($_POST['eidSend'])) {
				//Code for submit query goes here.
					$missing = array();
					$errors = array(); 
					 
					$e_id = trim(filter_input(INPUT_POST, 'e_id', FILTER_SANITIZE_STRING)); //returns a string
						if (empty($e_id))
						$missing[]='e_id';						
				}

?>

		  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            Employee ID#: <input type="text" name="e_id" value="">
            <span class="error">* <?php echo $idErr;?></span>
			<br></br>
			<input type="submit" name="eidSend" value="Submit">
          </form>




    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
<!--             <th>Phone Number</th> -->
            <th>E-mail</th>

        </tr>
		<!-- $conn is the db connection string from the pdo_config file required above -->
        <?php foreach ($conn->query($sql) as $row) { ?>
        <tr>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
<!-- 			<td><?php echo $row['phone']; ?></td> -->
			<td><?php echo $row['email']; ?></td>

            </tr>
    <?php } //endforeach loop ?>
    </table>





<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
