<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
	<ul id="nav">
        <li><a href="Ca_Index.php" <?php if ($currentPage == 'Ca_Index.php') {echo 'id="here"'; } ?>>Home</a></li>
<!--         <li><a href="Ca_Rentals.php" <?php if ($currentPage == 'Ca_Rentals.php') {echo 'id="here"'; } ?>>Rentals</a></li> -->
        <li><a href="Ca_Search.php" <?php if ($currentPage == 'Ca_Rentals.php') {echo 'id="here"'; } ?>>View Catalog</a></li>

	<?php
				if(isset($_SESSION['email'])){ ?>
				<li><a href="Ca_Search.php" <?php if($currentPage== 'Ca_Search.php') {echo 'id="here"';} ?>>Search</a></li>
				<li><a href="Ca_Employees.php" <?php if($currentPage== 'Ca_Employees.php') {echo 'id="here"';} ?>>Employees</a></li>
				<li><a href="Ca_Customers.php" <?php if($currentPage== 'Ca_Customers.php') {echo 'id="here"';} ?>>Customers</a></li>
				<li><a href="Ca_Create_Acct.php" <?php if($currentPage== 'Ca_Create_Acct.php') {echo 'id="here"';} ?>>Add Customer</a></li>
				<li><a href="Ca_Quotes.php" <?php if($currentPage== 'Ca_Quotes.php') {echo 'id="here"';} ?>>Quotes</a></li>
				<li><a href="Ca_View_Quotes.php" <?php if($currentPage== 'Ca_View_Quotes.php') {echo 'id="here"';} ?>>View Quotes</a></li>
								
			<?php if($_SESSION['manager']){ ?>
				<li><a href="Ca_Add_Emp.php" <?php if($currentPage== 'Ca_Add_Emp.php') {echo 'id="here"';} ?>>Add New Employee</a></li>
						
				<?php } ?>
								<li><a href="Ca_Logged_Out.php" >Logout</a></li>
			<?php }  else {?>
				<li><a href="Ca_Login.php" <?php if($currentPage== 'Ca_Login.php') {echo 'id="here"';} ?>>Login</a></li>
			<?php } ?>
    </ul>
