<?php
	/*
		Edit Labor Requirements:
		
		Obtains current labor hour requirements from text file and allows user to edit the
		matrix to suit changing labor needs.
		
		User input taken inside of dialog box
	*/
// configuration
//$url = 'http://webdev.cislabs.uncw.edu/~acp1323/admin.php?';
$file = 'shifts.txt';
$text = file_get_contents($file);
// check if form has been submitted
if (isset($_POST['labor']))
  {
    // save the text contents
    file_put_contents($file, $_POST["labor"]);

  }
?>