<?php session_start(); ?>
<!--
Author: John Gray
Last Revision: 04.29.14
File Name: resources.php
Description: Useful links for site users. 
-->
<?php
require_once('../util/main.php'); // Gets the application path
include('view/header.php'); //Connect to header file
error_reporting(E_ALL & ~E_NOTICE);
?>

<body id='resources'>
    <div class="container">
		<?php
		if(isset($_SESSION['is_valid_user']) & ($_SESSION['privilege'] == 'user')) {
			include('view/users_nav.php');
		} elseif(isset($_SESSION['is_valid_user']) & ($_SESSION['privilege'] == 'admin')) {
			include('view/admin_nav.php');
		}	else{
			include('view/public_nav.php');
		}	
		 ?>

        <header>
            <h1>The Dirtbag Way</h1>
        </header>
        
       <h1>Inspiration and Information</h1>
	   <img class="img-responsive img-rounded pull-left" src='<?php echo $app_path?>images/kayakers.jpg' alt="Sea kayakers returning from a long trip">
        
        <article class="clearfix">
			<h4>Dirtbag Stories</h4>
			<ul id='resources'>
				<li><a href="http://www.dirtbagdiaries.com">The Dirtbag Diaries Podcast</a></li>
				<li><a href="http://climbinghouse.com/2012/03/dirtbag-explained.html">The Dirtbag Explained</a></li>
			</ul>
			
			<h4>Travel</h4>			
			<ul>
				<li><a href="http://www.gonomad.com/1550-gonomad-transports-page">Go Nomad</a></li>
				<li><a href="http://www.vagabonding.net">Vagabonding</a></li>
				<li><a href="http://www.microadventures.org">Micro Adventures</a></li>
			</ul>
						
			<h4>Employment</h4>			
			<ul>
				<li><a href="http://www.coolworks.com">Cool Works</a></li>
				<li><a href="http://outdoored.com/jobs/oe/default.aspx">Outdoor Ed&#8217;s Jobs</a></li>
				<li><a href="http://www.nols.edu/alumni/employment/jobsnetwork.shtml">NOLS Jobnet</a></li>
			</ul>        
		</article>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					       <h4 class="modal-title">Sign Up Here</h4>
					</div>	<!-- End Modal Header -->						
					<div class="modal-body">      						
						<form class="form" action="<?php echo $app_path?>/index.php" method="post" id="create_user" role="form" accept-charset="UTF-8">
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
				   				 	<input name="captcha" type="text">
				   				 	<img src="<?php echo $app_path?>/util/captcha.php" />
				   				 </div>	
			                 <button class="btn btn-primary btn-lg center_btn" type="submit" name="submit">Submit</button>
						</form>
					</div> <!-- End Modal-body -->
				</div> <!-- End Modal-content -->
			</div> <!-- End modal-dialog -->
		</div>	<!-- End Modal-fade -->    
<?php include('view/footer.php') ?>
