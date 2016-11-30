<!doctype html>

<!-- Employee Options page that loads once an employee account has successfully logged on. -->

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
  
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
  
<!-- *** Start of dialog boxes
		 PHP will be implemented here to accept user input and handle data exchange between
		 front-end and database 
-->

    <!-- View Current Schedule MDL dialog box
	     This is the dialog box style that will be used throughout the site to offer user-input 
	     in a convenient and uniform container.
	     Corresponding Javascript at bottom of file -->
    <dialog id="currscheddiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  This will display the current, personal schedule for the employee currently logged on. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="currsched_accept" type="button" class="mdl-button">Accept</button>
	    <button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
	<!-- Request shift swap MDL dialog box 
		 Here an employee can request to have a specific shift swapped with another employee.
		 Each dialog given specific ID to handle different events in JS scripts -->
	<dialog id="reqswapdiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Please select a shift you would like to swap. ***PHP and HTML to be implemented here***
	    </p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="reqswap_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
	<!-- Request Day Off MDL dialog box
		 Allows an employee to request a day off that is not included in their normal availability -->
	<dialog id="reqdaydiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Please select a date for which to wish to request off. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="reqday_accept" type="button" class="mdl-button">Accept</button>
	    <button type="button" class="mdl-button close">Cancel</button>
	  </div>
    </dialog>
	
	<!-- Request Availability Change
		 This allows the employee to alter their listed availability.
	     This requires re-entry of employee password to access -->
	<dialog id="reqavaildiag" class="mdl-dialog">
	  <div class="mdl-dialog__content">
	    <p>
		  Here you can request to change your recurring availability. NOTE: This requires re-entry of employee password to access. ***PHP and HTML to be implemented here***
		</p>
	  </div>
	  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
	    <button id="reqavail_accept" type="button" class="mdl-button">Accept</button>
		<button type="button" class="mdl-button close">Cancel</button>
	  </div>
	</dialog>
	
<!-- *** Start of Timekeeping tab dialog boxes -->
	
	<!-- Timeclock MDL dialog box
		 Here an employee can perform various functions related to time management such
		 clocking in/out for a shift, viewing current hours, and changing labor groups. -->
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
		 Here the employee can view the company forum and post important messages or reply to inquiries -->
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
	
	
<!-- *** Start of visible webpage -->
	
	
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout__header-row">
        </div>
        <div class="mdl-layout__header-row">
		
		  <!-- Title of page -->
          <h3>Shift Workforce Management Systems</h3>
		  <img src="images/gear.png" alt="Not png" style="float:right;margin:30px;width:100px;height:100px">
        </div>
        <div class="mdl-layout__header-row">
		  <h4>Employee Menu</h4>
<!-- 		  <a href="index.php" class="logout">Logout</a> -->
		  <a href="Ca_Logged_Out.php" class="logout"><?php echo $_SESSION['firstName']; ?> Logout</a>
        </div>
		
		<!-- Tabbed options visible across top of page -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a href="#schedule" class="mdl-layout__tab is-active">Schedule</a>
          <a href="#timekeeping" class="mdl-layout__tab">Timekeeping</a>
          <a href="#chatroom" class="mdl-layout__tab">Chat Room</a>
          <a href="#faq" class="mdl-layout__tab">FAQ</a>
        </div>
      </header>
	  
      <main class="mdl-layout__content">
	  
	    <!-- Start of Schedule tab section -->
        <div class="mdl-layout__tab-panel is-active" id="schedule">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Schedule</h4>
                Here you can view you current work schedule as well as request a day off or a shift swap.
                <ul class="toc">
				
				  <!-- Buttons for various employee functions in the Schedule subsection -->
				  <button id="currschedbtn" type="button" class="mdl-button show-modal">View Current Schedule</button>
				  
				  <button id="reqswapbtn" type="button" class="mdl-button show-modal">Request Shift Swap</button>
				  
				  <button id="reqdaybtn" type="button" class="mdl-button show-modal">Request Day Off</button>
				  
				  <button id="reqavailbtn" type="button" class="mdl-button show-modal">Request Availability Change</button>
            
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
		<div class="mdl-layout__tab-panel" id="timekeeping">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Timekeeping</h4>
                Here you can clock-in/clock-out of shifts and view personal labor records. Some of this functionality may be limited to on-site use by your employer.
                <ul class="toc">
				
				  <!-- Timeclock button -->
				  <button id="timeclockbtn" type="button" class="mdl-button show-modal">Timeclock (may be disabled for off-site use)</button>
                  
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
		<div class="mdl-layout__tab-panel" id="chatroom">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="mdl-card mdl-cell mdl-cell--12-col">
			  <div class="mdl-card__supporting-text">
                <h4>Chatroom</h4>
                Placeholder for chatroom functionality.
                <ul class="toc">
				
				  <!-- Company Forum button -->
				  <button id="forumbtn" type="button" class="mdl-button show-modal">Company Forum (launches separate instance)</button>
                  
                </ul>
			  </div>
            </div>
          </section>
        </div>
		
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
		
        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Details</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="ext_pages/about.html">About</a></li>
                <li><a href="ext_pages/terms.html">Terms</a></li>
                <li><a href="ext_pages/partners.html">Partners</a></li>
                <li><a href="ext_pages/updates.html">Updates</a></li>
              </ul>
            </div>
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Data</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="ext_pages/tools.html">Tools</a></li>
                <li><a href="ext_pages/resources.html">Resources</a></li>
              </ul>
            </div>
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
	
    <script src="mdl/material.js"></script>
	
	<script src="scripts/empdiag.js"></script>
	
  </body>
</html>
