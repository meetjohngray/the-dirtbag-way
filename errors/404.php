<?php session_start();?>
<!--
Author: John Gray
Last Revision: 04.29.14
File Name: 404.php
Description: Error page for 404 (file not found) 
-->

<?php
require_once('../util/main.php');
include '../view/header.php'; //Connect to header file
?>

<body id='404'>
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
	<div class="row"> <!-- Page Header -->
        <header>
            <h1>The Dirtbag Way</h1>
		</header>
    </div> <!-- End Header -->
	<img class="img-responsive img-rounded pull-left" src='<?php echo $app_path?>images/IMG_0909.jpg' alt="Lonely road on New Zealand's South Island">
	<article class="clearfix">
		<h3>Looking for something?</h3>
		<p>Hey, there's nothing here to see. You've asked to go someplace that doesn't even exist! You might be able to go there, but you can't get there from here so might I suggest you <a href="<?php echo $app_path?>">return home</a>?</p>
	</article>

<?php include('../view/footer.php') ?>