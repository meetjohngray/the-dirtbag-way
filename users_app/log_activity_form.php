<!--
Author: John Gray
Last Revision: 05.07.14
File Name: log_activity_form.php
Description: Page contains form for recording logbook entries 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file

$activities = get_activities();
$roles = get_roles();
$states = get_states();
$countries = get_countries();
$username = $_SESSION['username'];
$id_usr = get_user_id($username);
?>

<body id="log_entry">
    <section class="container">
        <?php include('view/users_nav.php') // Include navigation specific to authorized users ?>
        <div class="row">
            <header>   <!-- Page Header -->
                <h1>The Dirtbag Way</h1>
            </header>
        </div><!-- End Header -->

        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
                <form class="form create_entry" action="<?php echo $app_path?>index.php" method="post" id="create_entry" role="form" accept-charset="UTF-8">
                    <input type="hidden" name="action" value="create_entry"> <input type="hidden" name="user_id" value="<?php echo $id_usr?>">

                    <div class='form-group'>
                        <label>What were you doing?</label> <select name="activity_id" class='form-control'>
                            <?php foreach ($activities as $activity) : ?>

                            <option value="<?php echo $activity['id_atv']; ?>">
                                <?php echo $activity['name_atv']; ?>
                            </option><?php endforeach; ?>
                        </select>
                    </div>

                    <div class='form-group'>
                        <label>For what reason?</label> <select name="role_id" class='form-control'>
                            <?php foreach ($roles as $role) : ?>

                            <option value="<?php echo $role['id_rol']; ?>">
                                <?php echo $role['name_rol']; ?>
                            </option><?php endforeach; ?>
                        </select>
                    </div>

                    <div class='form-group'>
	                    <label>What was the date?</label>
	                    <div class="input-group date">
							<input type="text" class="form-control" name="date" required=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>						
					</div>	
                   					<!--<div class='form-group'>
                    <label>What was the date?</label>
                    <input id="date" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="date" required="" placeholder="Date in YYYY-DD-MM">
					</div>-->
                    
                    <div class='form-group'>
                        <label>How many days did you do it?</label> <input type="number" min="1" id="days" class='form-control' name="days" placeholder="Number of Days">
                    </div>

                    <div class='form-group'>
                        <label>Where were you?</label> <input id="location" class='form-control' type="text" name="location" required="" placeholder="Location">
                    </div>

                    <div class='form-group'>
                        <label>What state?</label> <select name="state_id" class='form-control'>
                            <?php foreach ($states as $state) : ?>

                            <option value="<?php echo $state['id_sts']; ?>">
                                <?php echo $state['name_sts']; ?>
                            </option><?php endforeach; ?>
                        </select>
                    </div>

                    <div class='form-group'>
                        <label>Country?</label> <select id='countries_list' name="country_id" class='form-control'>
                            <?php foreach ($countries as $country) : ?>

                            <option value="<?php echo $country['id_cts'] ;?>">
                                <?php echo $country['name_cts']; ?>
                            </option><?php endforeach; ?>
                        </select>
                    </div>

                    <div class='form-group'>
                        <label>What route did you take?</label> <input id="route" class='form-control' type="text" name="route" required="" placeholder="Route">
                    </div>

                    <div class='form-group'>
                        <label>How far did you travel? Use miles and leave this blank if it doesn't apply to your activity.</label> <input type="number" min="1" id="distance" class='form-control' name="distance" placeholder="Distance">
                    </div>

                    <div class='form-group'>
                        <label>Describe it!</label> 
                        <textarea class='form-control' id="description" rows="5" name="description" placeholder="Record the details about your activity..."></textarea>
                    </div>
                    <button class="btn btn-primary btn-lg center_btn" type="submit" name="submit" value="Submit">Submit</button>
                </form>
            </div> <!-- End Form Column -->
            <?php include('view/users_sidebar.php') // Include navigation specific to authorized users ?>
        </section><!-- End Row -->
        <?php include('view/footer.php') ?>
   
