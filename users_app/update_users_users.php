<!--
Author: John Gray
Last Revision: 04.29.14
File Name: update_users_users.php
Description: Page provides a form for users to update their profile 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body class='user_profile'>
    <div class="container">
<?php include('view/users_nav.php')	// Include navigation specific to authorized users ?>
		
		<header>
            <h1>The Dirtbag Way</h1>
        </header>
        
        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
            </div>
			<?php include('view/users_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->

		<h3>Update Your Profile</h3>
		<form class='form user_form' action="<?php echo $app_path?>index.php" method="post" id='update_user' role='form'>
			<input type="hidden" name="action" value="update_profile_user" />
			<input type="hidden" name="id_usr" value="<?php echo $id_usr; ?>" />
			
			<div class="form-group">		
	            <label>First Name</label>
	            <input type="input" class='form-control' name="fname" value="<?php echo $fname; ?>" />           
			</div>
	
			<div class="form-group">
	            <label>Last Name</label>
	            <input type="input" class='form-control' name="lname" value="<?php echo $lname; ?>"/>
	        </div>
	
			<div class="form-group">
	            <label>Password</label>
	            <input type="password" class='form-control' name="password" required=""/>                
			</div>
	                            
			<div class="form-group">         
	            <label>Visibility</label>
	            <select class='form-control' name="visibility" />
					<option<?php if ($visibility == "public"): ?> selected="selected"<?php endif; ?>>public</option>
					<option<?php if ($visibility == "private"): ?> selected="selected"<?php endif; ?>>private</option>			
				</select>
			</div>
	
			<div class="form-group">
	            <label>Profile</label>
	            <textarea class="form-control" name="profile" value="<?php echo $profile; ?>"/><?php echo $profile; ?></textarea>
			</div>            
	            <button class="btn btn-primary btn-lg" type="submit" value="Update User" />Submit</button>
	     </form>

<?php include('view/footer.php') ?>
