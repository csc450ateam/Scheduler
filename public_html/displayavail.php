<?php
/*
	Display Availability: 
	
	Accesses availability text file to check currently generated matrix of employee availability
	
*/
// configuration
$url = 'http://webdev.cislabs.uncw.edu/~acp1323/admin.php?';
$file = 'avail.txt';
$text = file_get_contents($file);
// check if form has been submitted
if (isset($_POST['text_avail']))
  {
    // save the text contents
    file_put_contents($file, $_POST["text_avail"]);

  }


?>