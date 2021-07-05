<!--
Author: John Gray
Last Revision: 04.29.14
File Name: single_activity_admin.php
Description: Displays results of activities search 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body class='admin_activities'>
    <div class="container">
	<?php include('view/admin_nav.php')	// Include navigation specific to authorized users ?>
		
		<header>
            <h1>The Dirtbag Way</h1>
        </header>
        
        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
                <h3>Search Activities</h3>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="activity_search" />
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
            <th>Name</th>
            <th>Description</th>
            <th>Update</th>            
            <th>Delete</th>
        </tr>
        
        <?php foreach ($search_activities as $activity) : ?>
        <tr>
            <td><?php echo $activity['id_atv']; ?></td>
            <td><?php echo $activity['name_atv']?></td>
            <td><?php echo $activity['description_atv']?></td>			
			<td><form action="<?php echo $app_path?>index.php" method="post">
			                    <input type="hidden" name="action" value="update_activity_form" />
			                    <input type="hidden" name="id_atv" value="<?php echo $activity['id_atv']; ?>" />
			                    <input type="hidden" name="name" value="<?php echo $activity['name_atv']; ?>" />
			                    <input type="hidden" name="description" value="<?php echo $activity['description_atv']; ?>" />
			                   	<button class="btn btn-primary" type="submit" name="update_atv">Update</button>
			                </form></td>            
            <td><form action="<?php echo $app_path?>index.php" method="post">
                    <input type="hidden" name="action" value="delete_activity" />
                    <input type="hidden" name="id_atv" value="<?php echo $activity['id_atv']; ?>" />
            		<input class="btn btn-primary" type="submit" name="delete_activity" value="Delete" />
                </form></td>
        </tr><?php endforeach; ?>
    </table>   	

<?php include('view/footer.php') ?>
