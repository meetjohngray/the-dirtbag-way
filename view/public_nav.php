<!--
Author: John Gray
Last Revision: 05.07.14
File Name: public_nav.php
Description: Creates top navigation for the public pages 
-->

<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                	<span class="sr-only">Toggle navigation</span>
                	<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
                </button>
            </div><!-- Collect the nav links, forms, and other content for toggling -->                     
			
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $app_path?>">Home</a></li>
                    <li><a href="<?php echo $app_path?>/public_app/about.php">About</a></li>
                    <li><a href="<?php echo $app_path?>/public_app/resources.php">Resources</a></li>
                </ul>
			
                <ul class="nav navbar-nav navbar-right">
<!--                     <li><a href="<?php echo $app_path?>index.php?action=show_create_user">Sign Up</a></li> -->
                	<li><a role="button" data-toggle="modal" data-target=".bs-example-modal-lg">Sign Up</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In</a>

                        <div class="dropdown-menu">
                                <form action="<?php echo $app_path?>index.php" method="post" id="login_form" class='form' accept-charset="UTF-8" >
                                    <input type="hidden" name="action" value="user_login"> 
									<div class="form-group">                                    
										<input id="user_username" class='form-control' type="text" name="username" required="" pattern="[a-zA-Z0-9_]+" title='The username can only consist of alphabetical, number and underscore' value="<?php if(isset($_POST['username'])){echo $_POST['username'];} else {echo '';}?>" placeholder="username"> 
									</div>                                    
									<div class="form-group">
										<input id="user_password" class='form-control' type="password" name="password" required="" placeholder="password"> 
									</div>
                                    <button class="btn btn-primary"  type="submit" name="commit" value="Sign In">Sign In</button>							
                                </form>
                        </div>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div><!-- end nav row -->
 