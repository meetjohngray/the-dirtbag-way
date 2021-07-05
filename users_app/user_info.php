<!--
Author: John Gray
Last Revision: 05.06.14
File Name: user_info.php
Description: Page provides a table for users logbook entries 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body class='user_info'>
    <div class="container">
        <?php include('view/users_nav.php') // Include navigation specific to authorized users ?>

        <header>
            <h1>The Dirtbag Way</h1>
        </header>

        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
            	<h2>Welcome <?php echo ucfirst($_SESSION['username'])?></h2>
				<?php if(isset($error_message)){
					echo 	"<div class='alert alert-info alert-dismissiable'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button><h4>"
								.$error_message. 
							"</h4></div>";
				}	
				?>
                <h3>Search</h3>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="search_entries" />
					<input type="hidden" name="id_usr" value= "<?php echo $_SESSION['user_id']?>" />
					<div class='form-group'>					
						<input type="input" name="search" />                
						<button class='btn btn-primary' type="submit" value="Search">Search</button>
					</div>	
				</form>
            </div>
            <?php include('view/users_sidebar.php'); // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->
		
        <h3>Your Latest Adventures</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>What</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Days</th>
                            <th>Location</th>
                            <th>Route</th>
                            <th>Distance</th>
                            <th>Description</th>
                            <th>Delete Entry</th><?php $entries = get_entries_by_user($_SESSION['user_id']); ?>
                        </tr><?php foreach ($entries as $entry) : ?>
                        <tr>
                            <td><?php echo $entry['name_atv']?></td>

                            <td><?php echo $entry['name_rol']?></td>

                            <td><?php echo date('m/d/y', strtotime($entry['date_ent']))?></td>

                            <td><?php echo $entry['num_days_ent']?></td>

                            <td><?php echo $entry['location_ent'] . ', ' . $entry['abbr_sts'] . ', ' . $entry['code_cts']?></td>

                            <td><?php echo $entry['route_ent']?></td>

                            <td><?php echo $entry['distance_ent']?></td>

                            <td><?php echo $entry['description_ent']?></td>

                            <td>
                                <form action="<?php echo $app_path?>index.php" method="post">
                                    <input type="hidden" name="action" value="delete_entry"> <input type="hidden" name="entry_id" value="<?php echo $entry['id_ent']; ?>"> <button type="submit" class="btn btn-primary" name="delete_ent" value="Delete">Delete Entry</button>
                                </form>
                            </td>
                        </tr><?php endforeach; ?>
                    </table>
                </div> 
        <?php require('view/footer.php') ?>
    </div>


<!--
            <form action="<?php echo $app_path?>index.php" method="post" id="show_log_entry_form" accept-charset="UTF-8">
                <input type="hidden" name="action" value="show_log_entry_form"> <input class="btn btn-primary" style="clear: right; width: 25%; height: 32px; font-size: 13px;" type="submit" name="commit" value="What did you do today?">
            </form>
-->
