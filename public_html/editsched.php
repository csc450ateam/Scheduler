<?php
	/*
		Edit Schedule:
		
		Obtains currently generated schedule and allows Administrators the ability to alter
		the schedule with any necessary shift changes or notes.
		
		User input taken within dialog box
	*/
// configuration
$url = 'http://webdev.cislabs.uncw.edu/~acp1323/admin.php?';
$file = 'currentSchedule.txt';
$text = file_get_contents($file);
// check if form has been submitted
if (isset($_POST['text']))
  {
    // save the text contents
    file_put_contents($file, $_POST["text"]);
  }
?>