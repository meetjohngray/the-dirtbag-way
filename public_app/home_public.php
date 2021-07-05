<!--
Author: John Gray
Last Revision: 05.07.14
File Name: home_public.php
Description: This is the first page displayed when dirtbagway.com loads.
-->

<?php
include('view/header.php'); //Connect to header file
?>
<body id='home_public'>
    <div class="container">
		<?php
			error_reporting(E_ALL & ~E_NOTICE);
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
			<?php 
				if(isset($login_message)){
					echo 	"<div class='alert alert-info alert-dismissiable'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button><h4>"
								.$login_message.
							"</h4></div>";
				}	
			?>
            <h1>The Dirtbag Way</h1>
		</header>
    </div> <!-- End Header -->
		<section class="jumbotron">
			<img class="img-responsive img-rounded" src='<?php echo $app_path?>images/nzroad1170.png' alt="Lonely road on New Zealand's South Island">
		</section> 
				<h3>Welcome</h3>
				<p>The Dirtbag Way is a community of people dedicated to the idea of living a maximum lifestyle with a minimal income. We hope this site will provide helpful information and tools as well as stories of inspiration to the community. In time we hope to provide information on how to manage finances, gain employment, and travel inexpensively. We have tools available to make it fun for members of the community track the number of days they work and play.</p>
			<h3>What's Happening?</h3>
			<?php $public_entries = get_entries_public(); ?>
			<?php foreach ($public_entries as $public_entry) : ?>
			<h5><?php echo ucfirst($public_entry['username_usr'])?> has been <?php echo $public_entry['name_atv']?> at <?php echo $public_entry['location_ent']?>!</h5>
			<?php endforeach; ?>
		<section>
			<h3>What About You?</h3>
			<p>By joining the dirtbag community, you can keep track of your own adventures as well as others. You will be able to follow the exploits of other dirtbags who choose to share their information and choose whether or not you would like to display your glory to the world or keep your information private.</p>
			<button class="btn btn-primary btn-lg center_btn" data-toggle="modal" data-target=".bs-example-modal-lg">Join Us!</button>
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
							       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							       <h4 id="sigupLabel"class="modal-title">Sign Up Here</h4>
							</div>	<!-- End Modal Header -->						
							<div class="modal-body">      						
								<form class="form" action="<?php echo $app_path?>/index.php" method="post" id="create_user" role="form" accept-charset="UTF-8">
									<input type="hidden" name="action" value="create_user"> 
										<div class='form-group'>
											<label>Username</label>
											<input id="user_username" class='form-control' type="text" name="username" required="" pattern="[a-zA-Z0-9_]+" title='The username can only consist of alphabetical, number and underscore' placeholder="username">
										</div>
										<div class='form-group'>				 	
											<label>Password</label>
											<input id="user_password" class='form-control' type="password" name="password" required="" pattern=".{8,16}" required title="8 to 16 characters" placeholder="password"> 
										</div>	
										 <div class='form-group'>				 	
						   				 	<label>First Name</label>
						   				 	<input id="user_fname" class='form-control' type="text" name="fname" required="" pattern="[a-zA-Z0-9_]+" title='The name can only consist of alphabetical, number and underscore' placeholder="First Name"> 
						   				 </div>	
										 <div class='form-group'>				 	
						   				 	<label>Last Name</label>
						   				 	<input id="user_lname" class='form-control' type="text" name="lname" required="" pattern="[a-zA-Z0-9_]+" title='The name can only consist of alphabetical, number and underscore' placeholder="Last Name"> 
						   				 </div>
						   				 
						   				 <div class='form-group'>
						   				 	<label>Would you like to share your exploits with other users?</label>						   				 	
											 <select multiple class='form-control' name="visibility" required="">				 	
								 				<option value="public">I want to share my profile and stats.</option>
							 					<option value="private">I want my information to remain private.</option>
							   				 </select>
						   				 </div>							   				 
						   				 <div class='form-group'>				 	
						   				 	<label>Profile</label>
						   				 	<textarea class='form-control' id="user_profile" rows="5" name="profile" required="" placeholder="Tell us about yourself.."></textarea> 
						   				 </div>
						   				 <div class='form-group'>				 	
						   				 	<label>Are you human?</label>
						   				 	<input class='form-control' type="text" name="captcha" alt="Captcha Image"required="" placeholder="Enter the text you see below..">
						   				 	<br />
						   				 	<img src="<?php echo $app_path?>/util/captcha.php" />
						   				 </div>						   				 
					                 <button class="btn btn-primary btn-lg center_btn" type="submit" name="submit">Submit</button>
								</form>
							</div> <!-- End Modal-body -->
						</div> <!-- End Modal-content -->
					</div> <!-- End modal-dialog -->
				</div>	<!-- End Modal-fade -->
		</section>	<!-- End Join us section -->		
<?php include('view/footer.php') ?>