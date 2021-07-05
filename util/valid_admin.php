<!--
Author: John Gray
Last Revision: 04.30.14
File Name: valid_admin.php
Description: Utility to redirect users who are not valid adminstrators and creates an error message 
-->

<?php
	if (!isset ($_SESSION['is_valid_admin'])) {
		header("Location: ..");
		$login_message = 'You are not authorized.';
	}

?>