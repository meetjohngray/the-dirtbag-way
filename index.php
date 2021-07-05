<?php
session_start();
/*
Author: John Gray
Last Revision: 05.05.14
File Name: index.php
Description: This is the controller for the dirtbagway.com. All user actions are routed through here and the appropriate response delievered.
*/

// Connect to utility files that allow for proper path names and user authentication
require_once('util/main.php');
// Connect to db
require_once('model/database_connection.php'); 
// Connect to functions that deal with users
require_once('model/users_db.php');
//	Connect to functions that deal with entries
require_once('model/log_entry_db.php');

// Get the action to perform
if (isset($_POST['action'])) {
    $action = strip_tags(trim($_POST['action']));
} else if (isset($_GET['action'])) {
    $action = strip_tags(trim($_GET['action']));
} else {
    $action = 'show_public_home';
}

// Perform the specified action
		//	Public Site Actions
		switch($action) {
		   
		    case 'show_public_home':
		        // Display public home page
		        include('public_app/home_public.php');
		        break;
		
		    case 'user_login':
		        // Get form info
		        $username = strip_tags(trim($_POST['username']));
		        $password = strip_tags(trim($_POST['password']));
				//	validate inputs for login form
			    if (empty($username) && empty($password)) {
			        $login_message = "Please supply a username and password and try again.";
		            // Display public home page with error message
		            include('public_app/home_public.php');		
				}	elseif (empty($username)) {
			        $login_message = "Please supply a username and try again.";
		            // Display public home page with error message
		            include('public_app/home_public.php');
		 	    } 	elseif (empty($password)) {
			        $login_message = "Please supply a password and try again.";
		            // Display public home page with error message
		            include('public_app/home_public.php');                            
			    } 	else {
			        // Check to see if they are a valid user, create session variables  
			        if (is_valid_user_login($username, $password)) {
			            $_SESSION['is_valid_user'] = true;
			            $_SESSION['username'] = $username;
			            //	Check privilege of user, create session variable
			            $privilege = user_privileges($username);
			            $_SESSION['privilege'] = $privilege;			
			            $user_id = get_user_id($username);
     			        $_SESSION['user_id'] = $user_id;           
			            //	Direct user to correct part of site
			            if ($privilege == 'user'){
			            	// Display users home page
			            	include('users_app/home_users.php');
			            } elseif ($privilege == 'admin'){
			            	$_SESSION['is_valid_admin'] = true;
				            // Display admin home page
				            include('admin_app/home_admin.php');
			            }			                        	
			        } else {
			            $login_message = 'You have not entered a valid login. Please try again.';
			            // Display public home page with error message
			            include('public_app/home_public.php');
			        }
			    }    
		        break;
		        
		    case 'show_create_user';
		    	// Display create user form
		    	include('public_app/create_user_form.php');
		    	break;
		
		    case 'create_user';
		        // Get form info
		        $username = strip_tags(trim($_POST['username']));
		        $password = strip_tags(trim($_POST['password']));
		        $fname = strip_tags(trim($_POST['fname']));
		        $lname = strip_tags(trim($_POST['lname']));
		        $visibility = strip_tags(trim($_POST['visibility']));
		        $profile = htmlentities(trim($_POST['profile']), ENT_NOQUOTES);
		        $captcha = strip_tags(trim($_POST['captcha']));
		        //	Check Captcha 
		        if(isset($_POST["captcha"] )&& $_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]){
					//	Check to see if the user already exists
					if (is_valid_user_login($username, $password)) {
		            $login_message = 'There is already a dirtbag with that username or password. Please choose something else.';
			        // Display public home page with error message
			        include('public_app/home_public.php');
					} else {
							// Create the user
							create_user($username, $password, $fname, $lname, $visibility, $profile); 		   
							//	Log the user in, Get info about them, and direct them to the user section of the site
							if (is_valid_user_login($username, $password)) {
								$_SESSION['is_valid_user'] = true;
								$_SESSION['username'] = $username;
								$privilege = user_privileges($username);
								$_SESSION['privilege'] = $privilege;
								if ($privilege == 'user'){
									$user_id = get_user_id($username);
									$_SESSION['user_id'] = $user_id;           
									// Display users home page
									include('users_app/home_users.php');
								} else {
			            $login_message = 'You have not entered a valid login. Please try again.';
			            // Display public home page with error message
			            include('public_app/home_public.php');
									}
							}
					}	
				} 	else {
					$login_message = "Looks like you're not human. Try again.";
			        // Display public home page with error message
			        include('public_app/home_public.php');
					}
		    	break;
		    	    
		    case 'logout':
		        // Clear all session data from memory
		        $_SESSION = array();
		        // Clean up the session ID
		        session_destroy();
		        //	Delete the sesssion cookie
		        $name = session_name();
		        $expire = strtotime('-1 year');
		        $params = session_get_cookie_params();
		        $path = $params['path'];
		        $domain = $params['domain'];
		        $secure = $params['secure'];
		        $httponly = $params['httponly'];
		        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
		        $login_message = 'You have been logged out.';
		        // 	Display public home page
		        include('public_app/home_public.php');
		        break;
		
		//	User Site Actions	
		    case 'show_user_home':
		        // Display home page for users
		        include('users_app/home_users.php');	
		        break;
		    
		
		    case 'show_log_entry_form':
		    	// Display logbook entry form
		    	include('users_app/log_activity_form.php');
				break;
		
			case 'create_entry':
				// Get form info
		        $id_usr = strip_tags(trim($_POST['user_id']));
		        $id_atv = strip_tags(trim($_POST['activity_id']));
		        $id_rol = strip_tags(trim($_POST['role_id']));
		        $date = strip_tags(trim($_POST['date']));
		        $days = strip_tags(trim($_POST['days']));
		        $location = htmlentities(trim($_POST['location']), ENT_NOQUOTES);
		        $id_sts = strip_tags(trim($_POST['state_id']));
		        $id_cts = strip_tags(trim($_POST['country_id']));
		        $route = htmlentities(trim($_POST['route']), ENT_NOQUOTES);
		        $distance = strip_tags(trim($_POST['distance']));
		        $description = htmlentities(trim($_POST['description']));
				// Update the db
				create_entry($id_usr, $id_atv, $id_rol, $date, $days, $location, $id_sts, $id_cts, $route, $distance, $description); 
		        // Display users logbook entries
		        include('users_app/user_info.php');
				break;
			
			case 'delete_entry':
				//	Get Form Info
			    $id_ent = strip_tags(trim($_POST['entry_id']));
				// Delete entry from db
			    delete_entry($id_ent);
		    	// Display users logbook entries
		    	include('users_app/user_info.php');
				break;
		
		    case 'search_entries':
		    	// Get form info
		    	$search = strip_tags(trim($_POST['search']));
		    	$id_usr = strip_tags(trim($_POST['id_usr']));
				//	search entries by search term and user id
				$search_entries = search_entries($search, $id_usr);
				if(!empty($search_entries)){
					// Display users search results
					include('users_app/search_entries_user.php');
				} else {
					$error_message = 'No matches found.';
					// Display users info
					include('users_app/user_info.php');
				}
				break;				
			
		    case 'show_view_info':
		    	// Get Info
		    	$id_user = $_SESSION['user_id'];
		    	// Display users logbook entries
		    	include('users_app/user_info.php');
				break;

		    
		    case 'show_edit_profile':
		    	// Display users profile
		    	include('users_app/user_profile.php');				
				break;

		    case 'edit_profile':
				// Get form info
				$id_usr = strip_tags(trim($_POST['id_usr']));
				$fname = strip_tags(trim($_POST['fname']));
				$lname = strip_tags(trim($_POST['lname']));
				$visibility = strip_tags(trim($_POST['visibility']));
				$profile = htmlentities(trim($_POST['profile']), ENT_NOQUOTES);
		    	// Display update users form
		    	include('users_app/update_users_users.php');				
				break;
		    
		    case 'update_profile_user':
				$id_usr = strip_tags(trim($_POST['id_usr']));
				$password = strip_tags(trim($_POST['password']));
				$fname = strip_tags(trim($_POST['fname']));
				$lname = strip_tags(trim($_POST['lname']));
				$visibility = strip_tags(trim($_POST['visibility']));
				$profile = htmlentities(trim($_POST['profile']), ENT_NOQUOTES);
				update_user_user($id_usr, $password, $fname, $lname, $visibility, $profile);			
		    	//	Display updated users profile
		    	include('users_app/user_profile.php');				
				break;
		    
		    case 'return_user_home':
		        // Display users home page
		        include('home_users.php');
		        break;
				
		//	Admin Site Actions
			case 'show_admin_home':
				//	Display admin home page
				include('home_admin.php');
				break;
    
		    case 'show_users_admin':
		    	//	Display users
		    	include('admin_app/users_admin.php');
				break;

		    case 'show_activities':
		    	//	Display activities
		    	include('admin_app/activities_admin.php');
				break;

			case 'delete_activity':
				// Get info
				$id_atv = strip_tags(trim($_POST['id_atv']));
				//	Delete the activity
				delete_activity($id_atv);
		    	//	Display activities
		    	include('admin_app/activities_admin.php');
				break;			

			case 'add_activity':
				//Get info
				$name_atv = strip_tags(trim($_POST['name']));
				$description_atv = htmlentities(trim($_POST['description']));
				// Add the activity to the db
				add_activity($name_atv, $description_atv);
		    	//	Display activities
		    	include('admin_app/activities_admin.php');
				break;			

			case 'update_activity_form':
				//Get info
				$id_atv = strip_tags(trim($_POST['id_atv']));
				$name_atv = strip_tags(trim($_POST['name']));
				$description_atv = htmlentities(trim($_POST['description']));
		    	//	Display update activity form
		    	include('admin_app/update_activities_admin.php');
				break;			

			case 'update_activity':
				//Get info
				$id_atv = strip_tags(trim($_POST['id_atv']));
				$name_atv = strip_tags(trim($_POST['name']));
				$description_atv = htmlentities(trim($_POST['description']), ENT_NOQUOTES);
				//	Update the activity in the db
				update_activity($id_atv, $name_atv, $description_atv);
		    	//	Display updated activities
		    	include('admin_app/activities_admin.php');
				break;			

		    case 'activity_search':
		    	//Get info
				$search = strip_tags(trim($_POST['search']));
				// Search the database
				$search_activities = search_activities($search);
				if(!empty($search_activities)){
					//	display search results
					include('admin_app/single_activity_admin.php');
				} else {
					// Display error message and list activities
					$error_message = 'No matches found.';
					include('admin_app/activities_admin.php');
				}
				break;	    	
		    
		    case 'return_admin_home':
		        // Display admin home
		        include('admin_app/home_admin.php');
		        break;

			case 'delete_user':
			    // Get info
			    $id_usr = strip_tags(trim($_POST['user_id']));
			    //	Delete the users entries
				delete_entry_by_user($id_usr);			    
				// Delete the user
			    delete_user($id_usr);
		    	//	Display users
		    	include('admin_app/users_admin.php');
			   	break;

			case 'user_search':
				// Get info
				$search = strip_tags(trim($_POST['search']));
				// Search the database
				$search_users = search_users($search);
				if(!empty($search_users)){
					//	Display search results
					include('admin_app/single_user_admin.php');
				} else {
					//	Display error message with users
					$error_message = 'No matches found.';
					include('admin_app/users_admin.php');
				}
				break;
			
			case 'update_user_form':
			//Get Info
			$id_usr = strip_tags(trim($_POST['user_id']));
			$username = strip_tags(trim($_POST['username']));
			$fname = strip_tags(trim($_POST['fname']));
			$lname = strip_tags(trim($_POST['lname']));
			$privileges = strip_tags(trim($_POST['privileges']));
			$visibility = strip_tags(trim($_POST['visibility']));
			$profile = htmlentities(trim($_POST['profile']), ENT_NOQUOTES);
			//	Display update user form
			include('admin_app/update_users_admin.php');
			break;
			
			case 'update_user_admin':
			//Get Info
			$id_usr = strip_tags(trim($_POST['id_usr']));
			$password = strip_tags(trim($_POST['password']));
			$fname = strip_tags(trim($_POST['fname']));
			$lname = strip_tags(trim($_POST['lname']));
			$privileges = strip_tags(trim($_POST['privileges']));
			$visibility = strip_tags(trim($_POST['visibility']));
			$profile = htmlentities(trim($_POST['profile']), ENT_NOQUOTES);
			//	Update the user
			update_user_admin($id_usr, $password, $fname, $lname, $privileges, $visibility, $profile);			
			//	Display the updated users
			include('admin_app/users_admin.php');
			break;
			}

?>

