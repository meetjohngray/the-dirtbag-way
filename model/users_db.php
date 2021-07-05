<?php
/*
Author: John Gray
Last Revision: 05.05.14
File Name: users_db.php
Description: Library of functions for working with users 
*/

/*
Name: get_users
Arguments: none
Return Data: $users
Description: Returns an array of user information from the database
*/ 
function get_users(){
    global $db;
    $query = 'SELECT * FROM users_usr
              ORDER BY id_usr';
    $users = $db->query($query);
    return $users;
}

/*
Name: get_user_id
Arguments: $username
Return Data: $id_usr
Description: Returns the user id based on the username
*/
function get_user_id($username) {
    global $db;
    $query = 'SELECT id_usr FROM users_usr
              WHERE username_usr = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $id_usrs = $statement->fetch();
    $statement->closeCursor();
    $id_usr = $id_usrs['id_usr'];
    return $id_usr;
}

/*
Name: get_users_by_username
Arguments: $username
Return Data: $users
Description: Returns an array of user data based on the username
*/
function get_users_by_username($username){
    global $db;
    $query = 'SELECT * FROM users_usr
              WHERE username_usr = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);              
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

/*
Name: search_users
Arguments: $search
Return Data: $search_users
Description: Returns user data based on a user supplied search term
Based on http://stackoverflow.com/questions/18233204/using-search-firstname-and-last-name-mixed-php-query?rq=1
*/
function search_users($search){
	global $db;
  	$query = "SELECT * FROM users_usr 
    			WHERE CONCAT(fname_usr,' ', lname_usr) 
    			LIKE CONCAT('%',:search,'%') 
    			OR lname_usr LIKE CONCAT('%',:search,'%') 
    			OR username_usr LIKE CONCAT('%',:search,'%')";
    $statement = $db->prepare($query);
    $statement->bindValue(':search', $search);              
    $statement->execute();
    $search_users = $statement->fetchAll();
    $statement->closeCursor();
    return $search_users;
}

/*
Name: generate_hash
Arguments: $password
Return Data: crypt($password, $salt)
Description: Takes a users password and returns an encrypted version
Based on http://www.sitepoint.com/password-hashing-in-php/
*/
function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

/*
Name: is_valid_user_login
Arguments: $username, $password
Return Data: $valid
Description: Checks to see if a valid login is being used to access website. 
Based on http://www.yiiframework.com/wiki/425/use-crypt-for-password-storage/
*/
function is_valid_user_login($username, $password) {
    global $db;
	$query = 'SELECT id_usr, password_usr FROM users_usr
              WHERE username_usr = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $password_usrs = $statement->fetch();
    $statement->closeCursor();
    $password_usr = $password_usrs['password_usr'];	
	if ($password_usr === crypt($password, $password_usr)){
		$valid = true;
	    return $valid;
    }
}

/*
Name: user_privileges
Arguments: $username
Return Data: $privilege
Description: Returns the access level of website users, thereby directing the site what access they have
*/
function user_privileges($username) {
    global $db;
    $query = 'SELECT id_usr, privileges_usr FROM users_usr
              WHERE username_usr = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $privileges = $statement ->fetch();
    $statement->closeCursor();
    $privilege = $privileges['privileges_usr'];
    return $privilege;
}	

/*
Name: create_user
Arguments: $username, $password, $fname, $lname, $visibility, $profile
Return Data: none
Description: Creates a user based on form input
*/
function create_user($username, $password, $fname, $lname, $visibility, $profile) {
	global $db;
    $hashed_password = generateHash($password);
	$query = 'INSERT INTO users_usr
				(username_usr, password_usr, fname_usr, lname_usr, visibility_usr, profile_usr)
			  VALUES
			  	(:username, :password, :fname, :lname, :visibility, :profile)';
	$statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hashed_password);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':visibility', $visibility);
    $statement->bindValue(':profile', $profile);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();    
/* TEST FOR SUCCESS
    $user_id = $db->lastInsertId();    
    if ($success) {
	    echo "<p>$row_count row(s) was inserted with this ID: $user_id</p>";
   } else {
	   echo "<p>No rows were inserted.</p>";
   }
*/
}

/*
Name: delete_user
Arguments: $id_usr
Return Data: none
Description: Deletes a user from the database based on the user id
*/
function delete_user($id_usr){
	global $db;
    $query = 'DELETE FROM users_usr
              WHERE id_usr = :id_usr';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_usr', $id_usr);
    $statement->execute();
    $statement->closeCursor();
}

/*
Name: update_user_admin
Arguments: $id_usr, $password, $fname, $lname, $privileges, $visibility, $profile
Return Data: none
Description: Allows admins to update user information including privileges
*/
function update_user_admin($id_usr, $password, $fname, $lname, $privileges, $visibility, $profile){
	global $db;
    $hashed_password = generateHash($password);	
	$query = "UPDATE users_usr
				SET	password_usr = :hashed_password,
					fname_usr = :fname,
					lname_usr = :lname,
					privileges_usr = :privileges,
					visibility_usr = :visibility,
					profile_usr = :profile
				WHERE id_usr = :id_usr";
	$statement = $db->prepare($query);
    $statement->bindValue(':id_usr', $id_usr);
    $statement->bindValue(':hashed_password', $hashed_password);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
	$statement->bindValue(':privileges', $privileges);
    $statement->bindValue(':visibility', $visibility);
    $statement->bindValue(':profile', $profile);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
	$user_id = $db->lastInsertId();    
/*	For Testing Purposes
    if ($success) {
	    echo "<p>$row_count row(s) were updated with this ID: $user_id</p>";
   } else {
	   echo "<p>No rows were inserted.</p>";
   }
*/		
}			


/*
Name: update_user_user
Arguments: $id_usr, $password, $fname, $lname, $visibility, $profile
Return Data: none
Description: Allows users to update their profile, excluding privileges
*/
function update_user_user($id_usr, $password, $fname, $lname, $visibility, $profile){			
	global $db;
    $hashed_password = generateHash($password);	
	$query = "UPDATE users_usr
				SET password_usr = :hashed_password,
					fname_usr = :fname,
					lname_usr = :lname,
					visibility_usr = :visibility,
					profile_usr = :profile
				WHERE id_usr = :id_usr";
	$statement = $db->prepare($query);
    $statement->bindValue(':id_usr', $id_usr);
    $statement->bindValue(':hashed_password', $hashed_password);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':visibility', $visibility);
    $statement->bindValue(':profile', $profile);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
	$user_id = $db->lastInsertId();    
/*	For Testing Purposes
    if ($success) {
	    echo "<p>$row_count row(s) were updated with this ID: $user_id</p>";
   } else {
	   echo "<p>No rows were inserted.</p>";
   }
		
*/
}
?>
