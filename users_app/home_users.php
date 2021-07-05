<!--
Author: John Gray
Last Revision: 05.05.14
File Name: home_users.php
Description: Home page for registered users. 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body id='home_user'>
    <div class="container">
        <?php include('view/users_nav.php') // Include navigation specific to authorized users ?>

        <header>
            <h1>The Dirtbag Way</h1>
        </header>

        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
<!--             	<h2 class='center'>Welcome <?php echo $_SESSION['username']?></h2> -->
            	<h3 class='center'>What Did You Do Today?</h3>
				<ul id='home_user_list'>
					<li><h5>Bomb That Killer Downhill?</h5></li>
					<li><h5>PR Your Favorite Trail Run?</h5></li>
					<li><h5>Finish That Rapid Still Right Side Up?</h5></li>
				</ul>				
				<p>Here is your place to record all of your adventures and accomplishments. Use this space to write down as much or as little as you want about what you have been up to out there. If you are a public user, your entries will be shared with the dirtbag community. So what are you waiting for? If you&#8217;re not logging what you&#8217;ve been up to you better be out the door or planning your next trip.</p>
				<form action="<?php echo $app_path?>index.php" method="post" id="show_log_entry_form" accept-charset="UTF-8">
                	<input type="hidden" name="action" value="show_log_entry_form"> 
                	<button class="btn btn-primary btn-lg center_btn" type="submit">Log Entry Now</button>
				</form>
            </div>
			<?php include('view/users_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->
		<?php $days = days_by_role($_SESSION['user_id']);
				foreach ($days as $day):
				endforeach; 
				if ($day['Total Days'] > 0): ?>
		<h3 class="center">How You Have Been Spending Your Time</h3> 
		 <div class="table-responsive">
		 	<table class="table table-striped table-hover">
			 	<tr>
                    <th>Playing</th>
                    <th>Training</th>
                    <th>Working</th>
                    <th>Total</th>
			 	</tr>    
			 	<?php foreach ($days as $day) : ?>
			 	<tr>
                    <td><?php echo $day['Playing']?></td>
                    <td><?php echo $day['Training']?></td>
                    <td><?php echo $day['Working']?></td>
                    <td><?php echo $day['Total Days']?></td>
            </tr><?php endforeach; ?>
		 	</table>
        </div> <!-- End table-responsive -->
	       <?php if ($day['Playing'] > $day['Working']){
		        echo '<h4 class="center">Way to go dirtbag! You are playing more than working!</h4>';
				} else {
					echo '<h4 class="center">You are working too hard. Get out and play some more!</h4>';
				}
	        ?>
        <?php  endif; ?>
        
        <?php require('view/footer.php') ?>


<!--
            <form action="<?php echo $app_path?>index.php" method="post" id="show_log_entry_form" accept-charset="UTF-8">
                <input type="hidden" name="action" value="show_log_entry_form"> <input class="btn btn-primary" style="clear: right; width: 25%; height: 32px; font-size: 13px;" type="submit" name="commit" value="What did you do today?">
            </form>
-->
