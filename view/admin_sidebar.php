<!--
Author: John Gray
Last Revision: 04.30.14
File Name: admin_sidebar.php
Description: Creates sidebar navigation for admin pages 
-->

<aside id="sidebar" class="col-lg-3 col-sm-4 col-lg-pull-9 col-sm-pull-8">
    <ul id="sidebar" class="nav nav-pills nav-stacked">
<!--         <li><a href="<?php echo $app_path?>index.php?action=show_log_entry_form">Create Entry</a></li> -->
        <li><a href="<?php echo $app_path?>index.php?action=show_users_admin">Edit Users</a></li>
        <li><a href="<?php echo $app_path?>index.php?action=show_activities">Edit Activities</a></li>
    </ul>
</aside>

