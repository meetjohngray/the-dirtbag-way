<!--
Author: John Gray
Last Revision: 05.02.14
File Name: update_users_admin.php
Description: Provides a form for updating users 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body class='admin_user'>
    <div class="container">
	<?php include('view/admin_nav.php')	// Include navigation specific to authorized users ?>
		
		<header>
            <h1>The Dirtbag Way</h1>
        </header>
        
        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
            	<?php 
				if(isset($error_message)){
					echo 	"<div class='alert alert-info alert-dismissiable'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button><h4>"
								.$error_message.
							"</h4></div>";
				}	
				?>
                <h3>User Search</h3>
                <p>Find users via their username, first, or last name.</p>                
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="user_search" />
					<div class='form-group'>					
						<input type="input" name="search" />                
						<button class='btn btn-primary' type="submit" value="Search">Search</button>
					</div>	
				</form>
            </div>
			<?php include('view/admin_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->

	<h3>Update A User</h3>
	<form class='form user_form' action="<?php echo $app_path?>index.php" method="post" id='update_user' role='form'>
		<input type="hidden" name="action" value="update_user_admin" />
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
            <input type="password" class='form-control' name="password" required="" />                
		</div>
                
		<div class="form-group">            
            <label>Privileges</label>
            <select class="form-control" name="privileges" />
				<option<?php if ($privileges == "user"): ?> selected="selected"<?php endif; ?>>user</option>
				<option<?php if ($privileges == "admin"): ?> selected="selected"<?php endif; ?>>admin</option>
			</select>	
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
