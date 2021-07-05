<!--
Author: John Gray
Last Revision: 05.02.14
File Name: create_user_form
Description: Form used to create a user profile, currently not in use as this is displayed via a modal. 
-->
<?php
require_once('util/main.php'); // Gets the application path
include('view/header.php'); //Connect to header file
?>

<body>
    <section class="container">
		<?php
		if(isset($_SESSION['is_valid_user']) & ($_SESSION['privilege'] == 'user')) {
			include('view/users_nav.php');
		} elseif(isset($_SESSION['is_valid_user']) & ($_SESSION['privilege'] == 'admin')) {
			include('view/admin_nav.php');
		}	else{
			include('view/public_nav.php');
		}	
		 ?>
	<div class="row"> <!-- Page Header -->
        <header>
            <h1>The Dirtbag Way</h1>
		</header>
    </div> <!-- End Header -->
    
			<form class="form user_form" action="<?php echo $app_path?>/index.php" method="post" id="create_user" role="form" accept-charset="UTF-8">
             	<input type="hidden" name="action" value="create_user"> 
				 <div class='form-group'>
				 	<label>Username</label>
				 	<input id="user_username" class='form-control' type="text" name="username" required="" placeholder="username">
				 </div>
				 <div class='form-group'>				 	
   				 	<label>Password</label>
   				 	<input id="user_password" class='form-control' type="password" name="password" required="" placeholder="password"> 
   				 </div>	
				 <div class='form-group'>				 	
   				 	<label>First Name</label>
   				 	<input id="user_fname" class='form-control' type="text" name="fname" required="" placeholder="First Name"> 
   				 </div>	
				 <div class='form-group'>				 	
   				 	<label>Last Name</label>
   				 	<input id="user_lname" class='form-control' type="text" name="lname" required="" placeholder="Last Name"> 
   				 </div>	
				 <select multiple class='form-control' name="visibility" required="">				 	
	 				<option name="public" value="public">I want to share my profile and stats.</option>
 					<option name="private" value="private">I want my information to remain private.</option>
   				 </select>
   				 <div class='form-group'>				 	
   				 	<label>Profile</label>
   				 	<textarea class='form-control' id="user_profile" rows="5" name="profile" placeholder="Tell us about yourself.."></textarea> 
   				 </div>
   				 <div class='form-group'>				 	
	   				 <label>Are you human?</label>
	   				 <input class='form-control' type="text" name="captcha" required="" placeholder="Enter the text you see below..">
	   				 <br />
					<img src="<?php echo $app_path?>/util/captcha.php" />
				</div>						   				 
                 <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">
            </form>    
<?php include('view/footer.php') ?>
