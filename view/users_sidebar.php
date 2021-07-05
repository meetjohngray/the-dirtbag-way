<!--
Author: John Gray
Last Revision: 04.30.14
File Name: users_sidebar.php
Description: Creates sidebar navigation for registered users pages 
-->

<aside id="sidebar" class="col-lg-3 col-sm-4 col-lg-pull-9 col-sm-pull-8">
    <ul id="sidebar" class="nav nav-pills nav-stacked">
        <li><a href="<?php echo $app_path?>index.php?action=show_log_entry_form">Log Entry</a></li>
        <li><a href="<?php echo $app_path?>index.php?action=show_view_info">Logbook</a></li>
        <li><a href="<?php echo $app_path?>index.php?action=show_edit_profile">Your Profile</a></li>
    </ul>
</aside>

