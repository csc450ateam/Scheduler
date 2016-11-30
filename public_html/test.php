<?php include './testphp.php' ?>


<!doctype html>

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

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
      <div class="mdl-layout--large-screen-only mdl-layout__header-row">
      </div>
      <div class="mdl-layout__header-row" style="position:absolute; top: 25px; left: 0px;">
		<!-- Title at top of page -->
        <h3>Shift</h3>
      </div>
	  <div class="mdl-layout__header-row">
		<h3>Workforce Management Systems</h3>
		<img src="images/gear.png" alt="Not png" style="float:right;margin:30px;width:100px;height:100px">
	  </div>
      <div class="mdl-layout__header-row">
        <h4>Welcome</h4>
      </div>
	
	</header>
	
	
		<main class="mdl-layout__content">
	  <div class="mdl-layout__tab-panel is-active" id="login_area" style="margin-bottom: 50px;">
        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
          <div class="mdl-card mdl-cell mdl-cell--12-col">
			<div class="mdl-card__supporting-text" style="margin-bottom: 50px; margin-top: 50px;">
			  <h4 style="text-align: center">Already have an account? Enter your login info or signup below.</h4>
	
	
	
	
<main>
        <p>Login if you are an employee. Please enter your worker Email address and password.</p>
        <form method="post" action="">
			<fieldset>
				<legend>Registered Users Login</legend>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="email">Please enter your email address:
				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">An email address is required</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not associated with an account</span>
                    <?php } ?>
				</label>
                <input class="mdl-textfield__input" name="email" id="email" type="text">

			    </div>
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>
            </p>
			<p>
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The password supplied does not match the password for this email address. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw">Password:
				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password" id="pw" type="password">
            </p>

            <p>
                <input name="send" type="submit" value="Login">
            </p>
		</fieldset>
        </form>
	</main>



			  <!-- Username Textfield -->
			  <form action="#" style="text-align: center;">
			    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			      <input class="mdl-textfield__input" type="text" id="uname">
				  <label class="mdl-textfield__label" for="uname">Username...</label>
			    </div>
			  </form>
	
			  <!-- Password Textfield -->
			  <form action="Ca_Login.php" style="text-align: center;">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				  <!--<input class="mdl-textfield__input" type="password" pattern="-?[0-9]*(\.[0-9]+)?[A-Za-z]{0,20}" id="passwd">-->
				  <input class="mdl-textfield__input" type="password" id="passwd" 
				    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
				  <label class="mdl-textfield__label" for="passwd">Password...</label>
				  <span class="mdl-textfield__error">At least one number and upper/lower case letter!</span>
				</div>
			  </form>
			  <div style="text-align:center;">
				<a href="forgotpass.html" style="color: blue;"><b>Forgot password?</b></a>
				<br></br>
				<a href="newaccount.html" style="color: blue"><b>Need a new account?</b></a>
			  </div>
			</div>
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
  
<!-- Open-sourced Material Design Lite click animation by Google -->
<script src="mdl/material.js"></script>

</body>
</html>