<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Remove_Employee.php
Purpose: 
Description & Functionality:


 -->



<?php
	require_once('../pdo_config.php');
	require './includes/Ca_Header.php';

	$sql = 'SELECT * from s_employee';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
	?>
	
        <?php foreach ($conn->query($sql) as $row) { ?>
        <?php $email = $row['email']; ?>

    <?php } //endforeach loop ?>
	

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
<!--             <th>Phone Number</th> -->
            <th>E-mail</th>

        </tr>
		<!-- $conn is the db connection string from the pdo_config file required above -->
        <?php foreach ($conn->query($sql) as $row) { ?>
        <?php $email = $row['email']; ?>

        <tr>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
<!-- 			<td><?php echo $row['phone']; ?></td> -->
			<td><?php echo $row['email']; ?></td>
			<?php
			echo '<td><a href="Delete_Employee.php?id=' . $row['email'] . '">Delete</a></td>'
			?>
<!-- 
			<td><input type="button" value="Remove " onclick="window.location.href='Ca_New_Quote.php'" /></td><form method="POST" action="Remove_Employee.php">
			<td> <input type="hidden" name="delete_id" value="<?php echo $row['email']; ?>">			
			<input name="send" type="submit" value="Remove Employee"></td></form>
            </tr>
 -->

    <?php } //endforeach loop ?>
    </table>
<?php } //end else ?>
</body>
</html>
