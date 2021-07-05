<?php session_start();?>
<!--
Author: John Gray
Last Revision: 05.07.14
File Name: index.php
Description: index of site assets 
-->

<?php
require_once('../util/main.php');
include '../view/header.php'; //Connect to header file
error_reporting(E_ALL & ~E_NOTICE);
?>

<body id='assets'>
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
	<article>
		<h3>Assets</h3>
				<ul>
					<li><a href="http://dirtbagway.com/web289/assets/Unedited_artwork/" target="_blank">Unedited Artwork</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/codeDocumentation.pdf" target="_blank">codeDocumentation.pdf</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/database_final.sql" target="_blank">database_final.sql</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/directoryWireframe.txt" target="_blank">directoryWireframe.txt</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/erd.jpg" target="_blank">erd.jpg</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/mediaSources.pdf" target="_blank">mediaSources.pdf</a></li>
					<li><a href="http://dirtbagway.com/web289/assets/styleGuide.pdf" target="_blank">styleGuide.pdf</a></li>
					<li><a href="<?php echo $app_path?>">Home</a></li>
				</ul>
				
	</article>

<?php include('../view/footer.php') ?>