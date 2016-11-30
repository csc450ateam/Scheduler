<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: admin.php
Purpose: PHP call to implement administrative functions in admin.html
Description & Functionality: PHP wrapper for main admin html page


 -->

<?php session_start() ?>


<!doctype html>
<!-- Anthony Parker
	 Christian Adams		Date Last Modified: 11/11/16
	 Rachel Jackson
	 
	 Filename: admin.html -> Program: ShiftWFM
	 Administrator Options page that loads once an admin account has successfully logged on. -->

<html lang="en">
  <head>
	<!-- Meta tag to fit page to window for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/gear.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/gear.png">

    <!-- Tile icon for Win8/10 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/gear.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/gear.png">

	<!-- Collection of open-source material design stylesheets and fonts from Google to keep formatting consistent and mobile-friendly -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- This references a material design color-scheme, can be changed to other color combinations-->
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.teal-cyan.min.css">
	
	<!-- Link to local style sheet with more detailed design attributes -->
    <link rel="stylesheet" href="styles.css">
	
	<!-- Polyfill to fix issues with displaying dialog boxes on browsers other than Chrome/Safari -->
	<script src="scripts/dialog-polyfill.js"></script>
	<link rel="stylesheet" type="text/css" href="dialog-polyfill.css">
	
  </head>
  
  <!-- Body of webpage. Class names chosen to conform to foreign-hosted Javascript and font files -->
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
  
  
  
<!-- *** Start of dialog boxes
		 PHP will be implemented here to accept user input and handle data exchange between
		 front-end and database 
-->

    <!-- Add Employee MDL dialog box
	     This is the dialog box style that will be used throughout the site to offer user-input 
	     in a convenient and uniform container.
	     Corresponding Javascript at bottom of file -->
    <dialog id="addemployeediag" class="mdl-dialog_full-screen mdl-dialog" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
<!-- <?php include './Add_Employee.php';?> -->

	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="addemployee_accept" type="button" class="mdl-button" style="display:none;">Accept</button>
	    <button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
	<!-- Remove employee MDL dialog box 
		 Each dialog given specific ID to handle different events in JS scripts -->
	<dialog id="removeemployeediag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<?php include './Remove_Employee.php'; ?>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="removeemployee_accept" type="button" class="mdl-button" style="display:none;">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
	<!-- View All Employee MDL dialog box
		 Look for corresponding ID in admindiag.js script -->
	<dialog id="viewempdiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<?php include './View_Employees.php'; ?> 
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button type="button" class="mdl-button close">Close</button>
	  </div>
    </dialog>
	
	<!-- Edit Employee Information (Admin only)
		 This allows for the administrator to edit multiple employee attributes.
	     This requires re-entry of admin password to access -->
	<dialog id="editempdiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
	    <p>
	    <?php include "Edit_Employee.php" ?> 
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="editemp_accept" type="button" class="mdl-button" style="display:none">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
				  
<!-- *** Start of Schedule tab section -->
	
    <!-- View current schedule MDL dialog box 
		 Gives currently generated schedule if available -->
	<dialog id="viewcurrscheddiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<p>
		  <h4>Current Weekly Schedule</h4>
		  <?php include "displaysched.php";?>
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="viewcurrsched_accept" type="button" class="mdl-button" style="display:none"></button>
		<button type="button" class="mdl-button close">Close</button>
	  </div>
	</dialog>
				  
	<!-- Edit hour requirements MDL dialog box 
		 Allows admin to edit needed hours for a given week -->
	<dialog id="editreqhoursdiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<p>

		  <h4>Edit Currently required labor hours</h4>
		  All times in 24-hour format {ex. 1430 = 2:30pm}<br>
		  Colon delimited {8:14 reads 8 to 2 shift needed}
		  <?php include "editlabor.php";?>
		  <form action="" method="post">
			<textarea id="labor" name="labor" style="min-height:250px; min-width:80%;"><?php echo htmlspecialchars($text) ?></textarea>
			<br></br>
			<input type="submit" value="Confirm" name="submit"/>
		  </form>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="editreqhours_accept" type="button" class="mdl-button">Edit</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
				  
    <!-- Employee Availability MDL dialog box 
		 Allows admin to view a list-view of each employees's availability -->
	<dialog id="viewavaildiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<p>
		  <h4>Current Employee Availability</h4>
		  <?php include "displayavail.php";?>
		  <form action="" method="post">
			<textarea id="text_avail" name="text_avail" style="min-height:250px; min-width:80%;"><?php echo htmlspecialchars($text) ?></textarea>
			<br></br>
			<input type="submit" value="Confirm" name="submit"/>
		  </form>
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="viewavail_accept" type="button" class="mdl-button" style="display:none"></button>
		<button type="button" class="mdl-button close">Close</button>
	  </div>
	</dialog>
                  
				  
	<!-- Generate Schedule MDL dialog box 
		 Allows admin to generate a weekly schedule based on required hours and employee availability -->
	<dialog id="genscheddiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">

	  <div class="mdl-dialog__content">
		<p>
		  <h4>Current Weekly Schedule</h4>
		  Are you sure you want to create a new schedule based on current employee availability and required labor hours?
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="gensched_accept" type="button" class="mdl-button" onclick="location.href='schedule.php';">Yes</button>
		<button type="button" class="mdl-button close">No</button>
	  </div>
	</dialog>
				  
				  
	<!-- Edit Current Schedule MDL dialog box 
		 Allows admin to edit the current schedule in case of automated scheduling errors or late changes -->
	<dialog id="editscheddiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<p>
		  <h4>Edit Previously generated schedule</h4>
		  <?php include "editsched.php";?>
		  <form action="" method="post">
			<textarea id="text" name="text" style="min-height:250px; min-width:80%;"><?php echo htmlspecialchars($text) ?></textarea>
			<br></br>
			<input type="submit" value="submit" name="submit"/>
		  </form>
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="editsched_accept" type="button" class="mdl-button" style="display:none;">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
<!-- *** Start of Timekeeping tab dialog boxes -->
	
	<!-- Timeclock MDL dialog box
		 Here an admin can perform various functions related to time management such
		 clocking in/out for a shift, viewing current labor hours, and editing
		 or managing hours of a selected employee -->
	<dialog id="timeclockdiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content" style="overflow:auto; max-height:auto; min-height:auto;">
	    <p>

		  <h3>Time Management</h3>
		  <!-- Call to timeclock PHP script, implements a form to handle employee login information -->
			<?php require 'timeclock.php';?>
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="timeclock_accept" type="button" class="mdl-button" style="display:none;">Accept</button>
	  </div>
	</dialog>
	
<!-- *** Start of Chat tab section -->
	
	<!-- Forum MDL dialog box/HTML
		 Here the admin can view the company forum and post important messages or reply to employee inquiries -->
	<dialog id="forumdiag" class="mdl-dialog_full-screen" style="overflow:auto; max-height: 90%; max-width:90%; position:absolute;">
	  <div class="mdl-dialog__content">
		<p>
		  This is where the company forum will launch. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="forum_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
	<!-- Snackbar (toast notification) for alerting user when changes to schedule have been applied
		 Uses built-in Javascript to show/hide
	-->
	<div id="gensched_toast" class="mdl-js-snackbar mdl-snackbar">
      <div class="mdl-snackbar__text"></div>
      <button class="mdl-snackbar__action" type="button" action="<?php include "displaysched.php";?>" style="display:none">View</button>
    </div>
    <script>
	  //shows/hides Google MDL Toast Notification
      (function() {
        'use strict';
        window['counter'] = 0;
		//create container
        var snackbarContainer = document.querySelector('#gensched_toast');
		//select accept button as trigger
        var showToastButton = document.querySelector('#gensched_accept');
		//event listener for buttonclick
        showToastButton.addEventListener('click', function() {
          'use strict';
          var data = {message: 'Schedule Generated! '};
          snackbarContainer.MaterialSnackbar.showSnackbar(data);
        });
		var gen_diag = document.getElementbyID('genscheddiag');
		function closediag(){
			gen_diag.close();
		}
		closediag();
      }());
    </script>
	
	
	
	
  <!-- *** Start of Visible page -->
  
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__header-row" style="position:absolute; top: 25px; left: 0px;">
		
	<!-- Title at top of page 
		 Adapted for Mobile format by CSS
	-->
          <h3>Shift</h3>
        </div>
		<div class="mdl-layout__header-row">
		  <h3>Workforce Management Systems</h3>
		  <!-- ShiftWFM Gear Icon (Open Source) -->
		  <img src="images/gear.png" alt="Not png" style="float:right;margin:30px;width:100px;height:100px">
		</div>
        <div class="mdl-layout__header-row">
		  <h4>Administrative Menu</h4>
		  <!-- Reference to Ca_Logged_Out php file, implements authentication procedures-->
		  <a href="Ca_Logged_Out.php" class="logout"><?php echo $_SESSION['firstName']; ?> Logout</a>
        </div>
		
		<!-- Tab bar across top of page that allows for selection of sub-menus -->
		<!-- Employee tab is initially set to active -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a href="#employee" class="mdl-layout__tab is-active">Employees</a>
          <a href="#schedule" class="mdl-layout__tab">Schedule</a>
          <a href="#timekeeping" class="mdl-layout__tab">Timekeeping</a>
          <a href="#chatroom" class="mdl-layout__tab">Message Board</a>
          <a href="#faq" class="mdl-layout__tab">FAQ</a>
        </div>
      </header>
      <main class="mdl-layout__content">
	  
		<!-- Expanded employee menu
			 Options are specific to administrative priveleges 
		-->
        <div class="mdl-layout__tab-panel is-active" id="employee">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Employee Options</h4>
                Here you can edit some common employee attributes as well as add/drop employees from database.
                <ul class="toc">
				
				  <!-- Buttons to launch different option menus under the Employee subsection -->
				  <button id="addemployeebtn" type="button" class="mdl-button show-modal">Add Employee</button>
				  
				  <button id="removeemployeebtn" type="button" class="mdl-button show-modal">Remove Employee</button>
				  
				  <button id="viewempbtn" type="button" class="mdl-button show-modal">View All Employees</button>
	
                  <button id="editempbtn" type="button" class="mdl-button show-modal">Edit Employee Information</button>
				 
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
		
		<!-- Expanded schedule menu -->
        <div class="mdl-layout__tab-panel" id="schedule">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Scheduling Options</h4>
                Here you can view and edit current and upcoming schedules, view availabilities, and designate work hour requirements.
                <ul class="toc">
				
				  <!-- Schedule subsection option menus -->
				  <button id="genschedbtn" type="button" class="mdl-button show-modal">Generate Schedule</button>
				  
                  <button id="viewcurrschedbtn" type="button" class="mdl-button show-modal">View Current Schedule</button>
				 
                  <button id="editreqhoursbtn" type="button" class="mdl-button show-modal">Edit Work Hour Requirements</button>
				 
                  <button id="viewavailbtn" type="button" class="mdl-button show-modal">Edit Employee Availability</button>
					  
                  <button id="editschedbtn" type="button" class="mdl-button show-modal">Edit Schedule</button>
				  
                </ul>
			  </div>
            </div>
          </section>
        </div>
		<!-- Expanded timekeeping menu -->
		<div class="mdl-layout__tab-panel" id="timekeeping">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Timekeeping</h4>
                Here you can manage required hours, perform clock-in/clock-out functions, and adjust hours.
                <ul class="toc">
                  
				<!-- Timeclock button to launch separate PHP timekeeping program -->
				<button id="timeclockbtn" type="button" class="mdl-button show-modal">Timeclock (launches separate instance)</button>
				
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
		<!-- Expanded chatroom menu -->
		<div class="mdl-layout__tab-panel" id="chatroom">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Message Board</h4>
                Here you can post messages to the company message board to keep employees informed about important events or deadlines.
                <ul class="toc">
				
				<!-- Forum button to launch chat instance -->
				<button id="forumbtn" type="button" class="mdl-button show-modal">Company Message Board</button>
				
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
		<!-- Expanded FAQ list 
		     Frequently asked questions and answers will appear here for both employees and administrators -->
		<div class="mdl-layout__tab-panel" id="faq">
		  <section class="section--center mdl-grid mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
              <div class="mdl-card__supporting-text">
                <h4>Frequently Asked Questions</h4>
                <p><b>1) How do I edit my needed shifts?</b></p>
				<p>Just click on the Schedule tab and select "Edit Work Hour Requirements".</p>
				<p><b>2) How do I remove all information about an employee?</b></p>
				<p>Selecting to remove an employee through the "Remove Employee" option of the Employee tab will delete all associated information.</p>
				<p><b>3) How can I be sure my account is safe?</b></p>
				<p>Be sure to create a strong password with a combination of upper/lower-case letters and numbers/symbols and change your password often.</p>
				<p><b>4) Can employees edit their own availability?</b></p>
				<p>Currently, no. This is a feature exclusive to administrators.</p>
              </div>
		  </section>
		</div>
		
		<!-- Contains all links in the mega footer of the webpage -->
        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Details</h1>
              <ul class="mdl-mega-footer--link-list">
			  
				<!-- Each footer link directs to a separate HTML file -->
                <li><a href="ext_pages/about.html">About</a></li>
                <li><a href="ext_pages/terms.html">Terms</a></li>
                <li><a href="ext_pages/partners.html">Partners</a></li>
                <li><a href="ext_pages/updates.html">Updates</a></li>
              </ul>
            </div>
			
			<!-- Footer is subdivided into categorical sections -->
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Data</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="ext_pages/tools.html">Tools</a></li>
                <li><a href="ext_pages/resources.html">Resources</a></li>
              </ul>
            </div>
			
			<!-- Drop-down section of mega footer, allows user to select from list of additional info -->
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Technology</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="ext_pages/howitworks.html">How it works</a></li>
                <li><a href="ext_pages/patterns.html">Patterns</a></li>
                <li><a href="ext_pages/usage.html">Usage</a></li>
                <li><a href="ext_pages/products.html">Products</a></li>
                <li><a href="ext_pages/contracts.html">Contracts</a></li>
              </ul>
            </div>
			
			<!-- Contact section of mega footer -->
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Contact Us</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="mailto:acparker18@gmail.com?Subject=Shift%20WFM" target="_top">Email</a></li>
                <li><a href="#">Phone: 336-906-0000</a></li>
                <li><a href="#">Facebook</a></li>
              </ul>
            </div>
          </div>
		  
		  <!-- Bottom section of mega footer containing additional info as well as user-manual -->
          <div class="mdl-mega-footer--bottom-section">
            <div class="mdl-logo">
              More Information
            </div>
            <ul class="mdl-mega-footer--link-list">
              <li><a href="ext_pages/help.html">Help</a></li>
              <li><a href="ext_pages/privacy.html">Privacy and Terms</a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
	
	<!-- Open-sourced Material Design Lite click animation by Google -->
    <script src="mdl/material.js"></script>
	
	<!-- Custom JS script to handle dialog boxes -->
	<script src="scripts/admindiag.js"></script>
	
	<!-- Include JQuery for use in form handling -->
	<script src="scripts/jquery-3.1.1.min"></script>
	
  </body>
</html>
