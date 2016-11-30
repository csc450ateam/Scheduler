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
    <dialog id="addemployeediag" class="mdl-dialog_full-screen" >
    <div class="mdl-dialog__content" style="overflow:scroll; max-height:auto; min-height:auto;">

      <?php echo "Starts Here" ?>
//       <?php include './Add_Employee.php'; ?>
	    <p>
		  Please enter the required information to add an employee. **PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="addemployee_accept" type="button" class="mdl-button">Accept</button>
	    <button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

	<!-- Remove employee MDL dialog box
		 Each dialog given specific ID to handle different events in JS scripts -->
	<dialog id="removeemployeediag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Please select an employee to remove. ***PHP and HTML to be implemented here***
	    </p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="removeemployee_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

	<!-- View All Employee MDL dialog box
		 Look for corresponding ID in admindiag.js script -->
	<dialog id="viewempdiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Here is a list-view of all current employees with some basic non-sensitive info. ***PHP and HTML to be implemented here***
		</p>
		<?php include './View_Employees.php'; ?> 
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button type="button" class="mdl-button close">Close</button>
	  </div>
    </dialog>

	<!-- Edit Employee Information (Admin only)
		 This allows for the administrator to edit multiple employee attributes.
	     This requires re-entry of admin password to access -->
	<dialog id="editempdiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Here you can edit sensitive employee information. NOTE: This requires re-entry of admin password to access. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="editemp_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

<!-- *** Start of Schedule tab section -->

    <!-- View current schedule MDL dialog box
		 Gives currently generated schedule if available -->
	<dialog id="viewcurrscheddiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  Here you can view the most recently generated schedule if available. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="viewcurrsched_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

	<!-- Edit hour requirements MDL dialog box
		 Allows admin to edit needed hours for a given week -->
	<dialog id="editreqhoursdiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  Here an admin can edit how many work-hours are needed before a schedule is generated. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="editreqhours_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

    <!-- Employee Availability MDL dialog box
		 Allows admin to view a list-view of each employees's availability -->
	<dialog id="viewavaildiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  Here an admin can view a list of employee availability hours. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="viewavail_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

	<!-- Generate Schedule MDL dialog box
		 Allows admin to generate a weekly schedule based on required hours and employee availability -->
	<dialog id="genscheddiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  Here an admin can generate a weekly schedule based on necessary hours and employee availability. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="gensched_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

	<!-- Edit Current Schedule MDL dialog box
		 Allows admin to edit the current schedule in case of automated scheduling errors or late changes -->
	<dialog id="editscheddiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  Here an admin can edit a previously generated schedule to accommodate necessary last-minute changes. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="editsched_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

<!-- *** Start of Timekeeping tab dialog boxes -->

	<!-- Timeclock MDL dialog box
		 Here an admin can perform various functions related to time management such
		 clocking in/out for a shift, viewing current labor hours, and editing
		 or managing hours of a selected employee -->
	<dialog id="timeclockdiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
		<p>
		  This is where the timekeeping functions will reside. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
		<button id="timeclock_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>

<!-- *** Start of Chat tab section -->

	<!-- Forum MDL dialog box/HTML
		 Here the admin can view the company forum and post important messages or reply to employee inquiries -->
	<dialog id="forumdiag" class="mdl-dialog">
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


  <!-- *** Start of Visible page -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__header-row">

		<!-- Title at top of page -->
          <h3>Shift Workforce Management Systems</h3>
		  <img src="images/gear.png" alt="Not png" style="float:right;margin:30px;width:100px;height:100px">
        </div>
        <div class="mdl-layout__header-row">
		  <h4>Administrative Menu</h4>
		  <a href="index.php" class="logout">Logout</a>
        </div>

		<!-- Tab bar across top of page that allows for selection of sub-menus -->
		<!-- Employee tab is initially set to active -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a href="#employee" class="mdl-layout__tab is-active">Employees</a>
          <a href="#schedule" class="mdl-layout__tab">Schedule</a>
          <a href="#timekeeping" class="mdl-layout__tab">Timekeeping</a>
          <a href="#chatroom" class="mdl-layout__tab">Chat Room</a>
          <a href="#faq" class="mdl-layout__tab">FAQ</a>
        </div>
      </header>
      <main class="mdl-layout__content">

		<!-- Expanded employee menu
			 Options are specific to administrative priveleges -->
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
                  <button id="viewcurrschedbtn" type="button" class="mdl-button show-modal">View Current Schedule</button>

                  <button id="editreqhoursbtn" type="button" class="mdl-button show-modal">Edit Work Hour Requirements</button>

                  <button id="viewavailbtn" type="button" class="mdl-button show-modal">View Employee Availability</button>

                  <button id="genschedbtn" type="button" class="mdl-button show-modal">Generate Schedule</button>

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
                <h4>Chatroom</h4>
                Placeholder for chatroom functionality.
                <ul class="toc">

				<!-- Forum button to launch chat instance -->
				<button id="forumbtn" type="button" class="mdl-button show-modal">Company Forum (launches separate instance)</button>

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
                <p><b>1) What am I doing with my life?</b></p>
				<p>Who knows, we only specialize in small business workforce solutions, ask your therapist.</p>
				<p><b>2) Will this website every function?</b></p>
				<p>Yes, or no, you decide.</p>
				<p><b>3) Are you my father?</b></p>
				<p>That is a distinct possibility, yes.</p>
				<p><b>4) Is this a filler until actual questions can be formed?</b></p>
				<p>We pride ourselves in taking seriously all of our statements and opinions here at Shift. That being said, yes it is.</p>
              </div>
		  </section>
		</div>

		<!-- Contains all links in the mega footer of the webpage -->
        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Details</h1>
              <ul class="mdl-mega-footer--link-list

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

  </body>
</html>
