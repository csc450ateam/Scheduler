<?php
	/*
		Test of schedule submission
	*/
  $file = 'currentSchedule.txt';
  echo "SubmitScheduleTest";
  // check if form has been submitted
  if (isset($_POST['text']))
  {
    // save the text contents
    file_put_contents($file, $_POST['text']);

    exit();
  }
?>