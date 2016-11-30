<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name:  pdo_config.php
Purpose:   Connect to database in order to pass queries.  
Description & Functionality:  Connects to webdev mysql server through 
		the local host (127.0.0.1) and password credentials hardcoded 
		for each student.  


 -->


<?php
define(DBCONNSTRING,'mysql:host=127.0.0.1;dbname=cma9162');
define(DBUSER, 'cma9162');
define(DBPASS,'jeleke@8');
try {
$conn= new PDO(DBCONNSTRING, DBUSER, DBPASS);
} catch (PDOException $e) {
echo $e->getMessage();
}