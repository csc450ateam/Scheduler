<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: Delete_Employee.php
Purpose: To perform delete query on db and redirect the user.  
Description & Functionality:  Takes in chosen employee email address from previous form, 
		and uses it to delete that user from both the s_login_employee and s_employee 
		tables.  


 -->



<?php

/*
DELETE.PHP
Deletes a specific entry from the 's_employee' and 's_login_employee' tables
*/


// connect to the database
// include('../pdo_config.php');


// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']))
{
// get id value
$email = $_GET['id'];


			require_once('../pdo_config.php');
			
			
		$sql2 = 'DELETE from s_login_employee WHERE emailAddr = :email; DELETE FROM s_employee where email = :email';
					$stmt=$conn->prepare($sql2);
					$stmt->bindValue(':email', $email);
					$stmt->bindValue(':email', $email);
					$result = $stmt ->execute()
					or die(mysql_error());


// redirect back to the view page
header("Location: admin.php");
}

else

// if id isn't set, or isn't valid, redirect back to view page
{
header("Location: index.php");
}

?>