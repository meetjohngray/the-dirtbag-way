<!--
Author: John Gray
Last Revision: 04.30.14
File Name: admin_nav.php
Description: Creates top navigation for admin pages 
-->

<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
                </button>
            </div><!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $app_path?>index.php?action=return_admin_home">Home</a></li>
                    <li><a href="<?php echo $app_path?>/public_app/about.php">About</a></li>
                    <li><a href="<?php echo $app_path?>/public_app/resources.php">Resources</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text navbar-right">Welcome <?php echo $_SESSION['username']?>. You are signed in as an Administrator</p>
                    </li>
                    <li><a href="<?php echo $app_path?>index.php?action=logout">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

