<!--
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: View_Employees.php
Purpose: Displays All Current Employees
Description & Functionality:  Display:
		1. Connects to db
		2. Prepares and sends query to db
		3. Returns and displays tuples in forms.


 -->



<?php
//connets to db
	require_once('../pdo_config.php');
	require './includes/Ca_Header.php';

//stores query in variable
	$sql = 'SELECT * from s_login_employee';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
?>

//----------------------------END OF LOGIC SECTION-----------------------------------//

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Employees</title>
</head>

<body>
	<?php
	if (isset($error)) {
		echo "<p>$error</p>";
	} else {
		echo "<p>A total of $numRows records were found.</p>";
	?>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>

        </tr>
		<!-- $conn is the db connection string from the pdo_config file required above -->
        <?php foreach ($conn->query($sql) as $row) { ?>
        <tr>
			<td><?php echo $row['firstName']; ?></td>
			<td><?php echo $row['lastName']; ?></td> 
			<td><?php echo $row['emailAddr']; ?></td>

            </tr>
    <?php } //endforeach loop ?>
    </table>
<?php } //end else ?>
</body>
</html>
