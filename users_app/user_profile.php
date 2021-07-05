<!--
Author: John Gray
Last Revision: 05.07.14
File Name: user_profile.php
Description: Provides information about the users profile and ability to update or delete. 
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
        <?php include('view/users_nav.php') // Include navigation specific to authorized users ?>
		
        <header>
            <h1>The Dirtbag Way</h1>
        </header>
        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
            	<h2>Welcome <?php echo ucfirst($_SESSION['username'])?></h2>
            	<h3>Want to make some changes?</h3>
				<p> Here is the place where you can edit your profile.</p>
            </div>
			<?php include('view/users_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->
        <div class="table-responsive">
			<table class="table table-striped">
		        <tr>
		            <th>Username</th>		
		            <th>First Name</th>		
		            <th>Last Name</th>		
		            <th>Visibility</th>		
		            <th>Profile</th>		            
		            <th>Update Profile</th>		
<!-- 		            <th>Delete Profile</th> -->
		        <?php $username = $_SESSION['username'];
		        $users = get_users_by_username($username); ?>
		        </tr><?php foreach ($users as $user) : ?>		
		        <tr>	
		            <td><?php echo $user['username_usr']?></td>		
		            <td><?php echo $user['fname_usr']?></td>		
		            <td><?php echo $user['lname_usr']?></td>		
		            <td><?php echo $user['visibility_usr']?></td>		            
		            <td><?php echo $user['profile_usr']?></td>		            
		            <td><form action="<?php echo $app_path?>index.php" method="post">
		                    <input type="hidden" name="action" value="edit_profile" />
		                    <input type="hidden" name="id_usr" value="<?php echo $user['id_usr']; ?>" />
<!-- 		                    <input type="hidden" name="username" value="<?php echo $user['username_usr']; ?>" /> -->
		                    <input type="hidden" name="fname" value="<?php echo $user['fname_usr']; ?>" />
		                    <input type="hidden" name="lname" value="<?php echo $user['lname_usr']; ?>" />
		                    <input type="hidden" name="visibility" value="<?php echo $user['visibility_usr']; ?>" />
		                    <input type="hidden" name="profile" value="<?php echo $user['profile_usr']; ?>" />
		                   	<button class="btn btn-primary" type="submit" name="update_usr">Update</button>
		                </form>
		            </td>		            
<!--				Needs Fixing!!
		            <td><form action="<?php echo $app_path?>index.php" method="post">
		                    <input type="hidden" name="action" value="delete_user" />
		                    <input type="hidden" name="user_id" value="<?php echo $user['id_usr']; ?>" />
		            		<button class="btn btn-primary" type="submit" name="delete_usr" value="Delete">Delete</button>
		                </form></td>
-->
		        </tr><?php endforeach; ?>
			</table>
		</div> <!-- End Table Responsive -->

        <?php require('view/footer.php') ?>