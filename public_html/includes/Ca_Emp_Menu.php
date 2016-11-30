<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
	<ul id="nav">
        <li><a href="Ca_Index.php" <?php if ($currentPage == 'Ca_Index.php') {echo 'id="here"'; } ?>>Home</a></li>
        <li><a href="Ca_Rentals.php" <?php if ($currentPage == 'Ca_Rentals.php') {echo 'id="here"'; } ?>>Rentals</a></li>
		<li><a href="Ca_Create_Acct.php" <?php if($currentPage== 'Ca_Create_Acct.php') {echo 'id="here"';} ?>>Register</a></li>
		<li><a href="Ca_Search.php" <?php if($currentPage== 'Ca_Create_Acct.php') {echo 'id="here"';} ?>>Search</a></li>
		<li><a href="Ca_Logged_Out.php" <?php if($currentPage== 'Ca_Create_Acct.php') {echo 'id="here"';} ?>>Log Out</a></li>





	<?php
				if(isset($_SESSION['email'])){ ?>
				<li><a href="Ca_Search.php" <?php if($currentPage== 'Ca_Search.php') {echo 'id="here"';} ?>>Search</a></li>
				 <li><a href="Ca_Logged_Out.php" >Logout</a></li>
			

			<?php }else {?>
				<li><a href="Ca_Login.php" <?php if($currentPage== 'Ca_Login.php') {echo 'id="here"';} ?>>Login</a></li>
			<?php
		}
				?>
    </ul>
