<!--
Author: John Gray
Last Revision: 05.07.14
File Name: activities_admin.php
Description: Page provides listing of activities and options to delete or update 
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
            	<?php 
				if(isset($error_message)){
					echo 	"<div class='alert alert-info alert-dismissiable'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button><h4>"
								.$error_message.
							"</h4></div>";
				}	
				?>
                <h3>Activity Search</h3>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="activity_search" />
					<div class='form-group'>					
						<input type="input" name="search" />                
						<button class='btn btn-primary' type="submit" value="search">Search</button>
					</div>	
				</form>

		        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".add_activity-modal-lg">Add Activity</button>
		        <div class="modal fade add_activity-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
							       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							       <h4 class="modal-title">Add Activity</h4>
							</div>	<!-- End Modal Header -->						
							<div class="modal-body">      						
								<form class="form" action="<?php echo $app_path?>/index.php" method="post" id="add_activity" role="form" accept-charset="UTF-8">
									<input type="hidden" name="action" value="add_activity"> 
										<div class='form-group'>
											<label>Name</label>
											<input id="activity_name" class='form-control' type="text" name="name" required="" placeholder="Name">
										</div>
										<div class='form-group'>				 	
											<label>Description</label>
											<textarea id="activity_desctription" class='form-control' rows="5" name="description" required="" placeholder="Define the activity"></textarea>
										</div>	
					                 <button class="btn btn-primary btn-lg center_btn" type="submit" name="submit">Submit</button>
								</form>
							</div> <!-- End Modal-body -->
						</div> <!-- End Modal-content -->
					</div> <!-- End modal-dialog -->
				</div>	<!-- End Modal-fade -->
                         
            </div>
			<?php include('view/admin_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->
        
		<h3>Activities</h3>
		<div class="table-responsive">
		    <table class="table table-striped table-hover">
				<thead>
			        <tr>
			            <th>ID</th>		
			            <th>Name</th>		
			            <th>Description</th>				            
			            <th>Update</th>		            
			            <th>Delete</th>
			         </tr>
				<thead>
				<tbody>	
					<?php $activities = get_activities(); ?>    	        
		        	<?php foreach ($activities as $activity) : ?>		
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
			            		<button class="btn btn-primary" type="submit" name="delete_atv">Delete</button>
			                </form></td>    
			        </tr><?php endforeach; ?>
				</tbody>		    
			</table>   	
		</div> <!-- End Table Responsive -->

<?php include('view/footer.php') ?>
