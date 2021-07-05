<?php session_start();?>
<!--
Author: John Gray
Last Revision: 05.07.14
File Name: about.php
Description: Information about the purpose of the dirtbag way 
-->

<?php
require_once('../util/main.php'); // Gets the application path
include('view/header.php'); //Connect to header file
error_reporting(E_ALL & ~E_NOTICE);
?>

<body id='about'>
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
        
       <h1>Welcome to The Dirtbag Way</h1>
        
        <article>
			<blockquote ><a href="http://www.urbandictionary.com/define.php?term=dirtbag">dirtbag</a> is <em>a person who is committed to a given (usually extreme) lifestyle to the point of abandoning employment and other societal norms in order to pursue said lifestyle</em>. </blockquote>			
			<p>While we may not completely agree with the definition above, I think it&#8217;s fair to say we live on our own terms in order to pursue our passions.</p>			
			<p>Many of us work seasonally in the outdoor adventure field as instructors, guides, rangers, and ski patrollers, but this isn&#8217;t what we say when people ask, &#8220;What do you do?&#8221; Instead, we answer based on our chosen pursuits. </p>			
			<p>As dirtbags, we want to spend our time climbing mountains, paddling whitewater, or biking across the country. And we are willing to sacrifice having the comforts of steady employment and a stable home life to do so. </p>			
			<p>This choice does not come easily, though. Many of us have to navigate relationships with family and friends who don&#8217;t understand our lifestyle. We have to find meaningful employment that not only provides an income — meager though it may be — but also allows us to continue to do the things we love. We have to work out systems for living out of our trucks or finding safe places to sleep. We have to manage finances and think about where we can get mail sent.</p>			
			<p>In figuring out these challenges, dirtbags are creative, passionate, clever, and determined.</p>			
			<p>My partner Justinn and I are a part of this community that has taught us so much. So we are creating The Dirtbag Way to support and build a community of people dedicated to the idea of living a life of adventure.</p>			
			<p>Information on finances, employment, and travel will be featured on this site, along with the stories this community has to tell. </p>			
			<p>What might this look like? For starters, we are working on establishing a &#8220;permanent address,&#8221; where community members can have their mail sent, then sorted and forwarded either physically or virtually to wherever our adventures take us. In time, we hope to create interactive outdoor logs that are easy and fun for the dirtbag community to use to keep track of all our outdoor adventures. These logs will be useful for creating outdoor resumes to give to perspective employers.</p>			
			<p>We have lots of other ideas rattling around, but we also want to hear from you. </p>			
			<p><strong>What information, tools, and services would help you to live The Dirtbag Way?</strong></p>			
			<p>Here&#8217;s what to do next:
			<ol>
				<li>Let your friends know about this site, and keep an eye out for more content coming soon.</li>
				<li>Find us on twitter at @dirtbagway and on our facebook page.</li>
				<li>And share photos from your latest adventures by adding #thedirtbagway to your best instagram shots.
			</li></ol>						
			<p>Thanks for checking us out and we hope to hear from you soon.</p>			
			<p>John</p>    
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
