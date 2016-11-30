<?php
	/*
		Schedule:
		
		Handles execution of Python scheduler
		Writes output of script to text file
		
		No user input required
	*/
  //execute custom Python scheduling script
  $pythonSched = shell_exec('/usr/bin/python2.6 Scheduler.py');
  //store value of the currently generated schedule in a variable
  $f = fopen('currentSchedule.txt','r+');
  //write generated schedule to text file
  fwrite($f, $pythonSched);
  fclose($f);
  //page redirect
  header("Location: admin.php");
  exit();
?>