<!--
Author: John Gray
Last Revision: 05.02.14
File Name: single_user_admin.php
Description: Displays results of user search 
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
                <h3>User Search</h3>
                <p>Find users via their username, first, or last name.</p>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="user_search" />
					<div class='form-group'>					
<!-- 						<label>Name or </label> -->
						<input type="input" name="search" />                
						<button class='btn btn-primary' type="submit" value="Search">Search</button>
					</div>	
				</form>
            </div>
			<?php include('view/admin_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Privileges</th>
            <th>Profile</th>            
            <th>Update</th>
            <th>Delete</th>
        </tr><?php foreach ($search_users as $user) : ?>
        <tr>
            <td><?php echo $user['id_usr']; ?></td>
            <td><?php echo $user['username_usr']?></td>
            <td><?php echo $user['fname_usr']?></td>
            <td><?php echo $user['lname_usr']?></td>
            <td><?php echo $user['privileges_usr']?></td>            
            <td><?php echo $user['profile_usr']?></td>            
            <td><form action="<?php echo $app_path?>index.php" method="post">
                    <input type="hidden" name="action" value="update_user_form" />
                    <input type="hidden" name="user_id" value="<?php echo $user['id_usr']; ?>" />
                    <input type="hidden" name="username" value="<?php echo $user['username_usr']; ?>" />
                    <input type="hidden" name="fname" value="<?php echo $user['fname_usr']; ?>" />
                    <input type="hidden" name="lname" value="<?php echo $user['lname_usr']; ?>" />
                    <input type="hidden" name="privileges" value="<?php echo $user['privileges_usr']; ?>" />
                    <input type="hidden" name="visibility" value="<?php echo $user['visibility_usr']; ?>" />
                    <input type="hidden" name="profile" value="<?php echo $user['profile_usr']; ?>" />
                   	<button class="btn btn-primary" type="submit" name="update_usr">Update</button>
                </form></td>                        
            <td><form action="<?php echo $app_path?>index.php" method="post">
                    <input type="hidden" name="action" value="delete_user" />
                    <input type="hidden" name="user_id" value="<?php echo $user['id_usr']; ?>" />
            		<button class="btn btn-primary" type="submit" />Delete</button>
                </form></td>
        </tr><?php endforeach; ?>
    </table>  
<?php include('view/footer.php') ?>
