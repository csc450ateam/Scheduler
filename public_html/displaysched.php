<?php
	/* 
		Display Schedule:
		
		Display the current schedule from the currentSchedule text file
	    Requires no user input
	*/
	//get currently generated schedule
    $file = "currentSchedule.txt";
    if(file_exists($file)){
	  echo "<pre>";
	  // print file contents to screen with proper formatting
      echo file_get_contents($file);
	  echo "<pre>";
    }
?>