<?php
/*
Author: John Gray
Last Revision: 05.06.14
File Name: log_entry_db.php
Description: Functions that work with logbook entries 
*/

/*
Name: get_entries
Arguments: none
Return Data: $entries
Description: Gets all logbook entries from the database 
*/
function get_entries(){
    global $db;
	$query = 'SELECT id_ent, users_usr.username_usr, activity_atv.name_atv, role_rol.name_rol, date_ent, num_days_ent, location_ent, states_sts.abbr_sts, countries_cts.code_cts, route_ent, distance_ent, description_ent  
				FROM entry_ent
				INNER JOIN users_usr on users_usr.id_usr = entry_ent.id_usr_ent
				INNER JOIN activity_atv on activity_atv.id_atv = entry_ent.id_atv_ent
				INNER JOIN role_rol on role_rol.id_rol = entry_ent.id_rol_ent
				INNER JOIN states_sts on states_sts.id_sts = entry_ent.id_sts_ent
				INNER JOIN countries_cts on countries_cts.id_cts = entry_ent.id_cts_ent
				ORDER by date_ent DESC';
	$statement = $db->prepare($query);
    $statement->execute();
    $entries = $statement->fetchAll();
    $statement->closeCursor();
    return $entries;
}

/*
Name: get_entries_by_user
Arguments: $id_usr
Return Data: $entries
Description: Returns logbook entries based on a user id
*/
function get_entries_by_user($id_usr){
    global $db;
	$query = 	"SELECT id_ent, users_usr.username_usr, activity_atv.name_atv, role_rol.name_rol, date_ent, num_days_ent, location_ent, states_sts.abbr_sts, countries_cts.code_cts, route_ent, distance_ent, description_ent  
				FROM entry_ent
				INNER JOIN users_usr on users_usr.id_usr = entry_ent.id_usr_ent
				INNER JOIN activity_atv on activity_atv.id_atv = entry_ent.id_atv_ent
				INNER JOIN role_rol on role_rol.id_rol = entry_ent.id_rol_ent
				INNER JOIN states_sts on states_sts.id_sts = entry_ent.id_sts_ent
				INNER JOIN countries_cts on countries_cts.id_cts = entry_ent.id_cts_ent
              WHERE id_usr_ent = '$id_usr'
              ORDER by date_ent DESC";
	$statement = $db->prepare($query);
    $statement->execute();
    $entries = $statement->fetchAll();
    $statement->closeCursor();
	return $entries;
}

/*
Name: get_entries_public
Arguments: none
Return Data: $public_entries
Description: Gets public logbook entries from the database 
*/
function get_entries_public(){
    global $db;
	$query = "SELECT id_ent, users_usr.username_usr, activity_atv.name_atv, role_rol.name_rol, date_ent, num_days_ent, location_ent, states_sts.abbr_sts, countries_cts.code_cts, route_ent, distance_ent, description_ent  
				FROM entry_ent
				INNER JOIN users_usr on users_usr.id_usr = entry_ent.id_usr_ent
				INNER JOIN activity_atv on activity_atv.id_atv = entry_ent.id_atv_ent
				INNER JOIN role_rol on role_rol.id_rol = entry_ent.id_rol_ent
				INNER JOIN states_sts on states_sts.id_sts = entry_ent.id_sts_ent
				INNER JOIN countries_cts on countries_cts.id_cts = entry_ent.id_cts_ent
			WHERE users_usr.visibility_usr = 'public'
			ORDER by date_ent DESC
			LIMIT 3";
	$statement = $db->prepare($query);
    $statement->execute();
    $public_entries = $statement->fetchAll();
    $statement->closeCursor();
    return $public_entries;
}

/*
Name: search_entries
Arguments: $search, $id_usr
Return Data: $search_entries
Description: Returns logbook entries based on search terms and user id
*/
function search_entries($search, $id_usr){
	global $db;
  	$query = "SELECT  
  				id_ent, users_usr.username_usr, activity_atv.name_atv, role_rol.name_rol, date_ent, num_days_ent, location_ent, states_sts.abbr_sts, countries_cts.code_cts, route_ent, distance_ent, description_ent  
  				FROM entry_ent
  					INNER JOIN users_usr on users_usr.id_usr = entry_ent.id_usr_ent
  					INNER JOIN activity_atv on activity_atv.id_atv = entry_ent.id_atv_ent
  					INNER JOIN role_rol on role_rol.id_rol = entry_ent.id_rol_ent
  					INNER JOIN states_sts on states_sts.id_sts = entry_ent.id_sts_ent
  					INNER JOIN countries_cts on countries_cts.id_cts = entry_ent.id_cts_ent
  				WHERE (
					activity_atv.name_atv LIKE CONCAT('%',:search,'%')
					OR role_rol.name_rol LIKE CONCAT('%',:search,'%')
					OR location_ent LIKE CONCAT('%',:search,'%') 
					OR route_ent LIKE CONCAT('%',:search,'%')
					OR states_sts.abbr_sts LIKE CONCAT('%',:search,'%')
					OR states_sts.name_sts LIKE CONCAT('%',:search,'%')
					OR countries_cts.code_cts LIKE CONCAT('%',:search,'%')
					OR countries_cts.name_cts LIKE CONCAT('%',:search,'%')
					OR description_ent LIKE CONCAT('%',:search,'%'))
					AND users_usr.id_usr = :id_usr
					ORDER by date_ent DESC";    
	$statement = $db->prepare($query);
    $statement->bindValue(':search', $search);
	$statement->bindValue(':id_usr', $id_usr);                            
    $statement->execute();
    $search_entries = $statement->fetchAll();
    $statement->closeCursor();
    return $search_entries;
}

/*
Name: get_activities
Arguments: none
Return Data: $activities
Description: Returns all activities data from the database
*/
function get_activities(){
	global $db;
	$query = 'SELECT *
          FROM activity_atv
          ORDER BY id_atv';
	$activities = $db->query($query);
	return $activities;
}


/*
Name: get_activity_by_id
Arguments: $id_atv
Return Data: $activities
Description: Returns activities based on the activity id
*/
function get_activity_by_id($id_atv){
	global $db;
	$query = 'SELECT *
          FROM activity_atv
          ORDER BY id_atv
          WHERE id_atv = :id_atv';
	$activities = $db->query($query);
    $statement = $db->prepare($query);
    $statement->bindValue(':id_atv', $id_atv);
    $statement->execute();
    $activities = $statement->fetchAll();
    $statement->closeCursor();	
	return $activities;
}

/*
Name: delete_activity
Arguments: $id_atv
Return Data: none
Description: Deletes activity from database based on activity id
*/
function delete_activity($id_atv){
	global $db;
    $query = 'DELETE FROM activity_atv
              WHERE id_atv = :id_atv';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_atv', $id_atv);
    $statement->execute();
    $statement->closeCursor();	
}

/*
Name: add_activity
Arguments: $name_atv, $description_atv
Return Data: none
Description: Adds an activity to the database
*/
function add_activity($name_atv, $description_atv){
	global $db;
	$query = 'INSERT INTO activity_atv
				(name_atv, description_atv)
			  VALUES
			  	(:name_atv, :description_atv)';
	$statement = $db->prepare($query);
    $statement->bindValue(':name_atv', $name_atv);
    $statement->bindValue(':description_atv', $description_atv);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
    $entry_id = $db->lastInsertId();    
}

/*
Name: update_activity
Arguments: $id_atv, $name_atv, $description_atv
Return Data: none
Description: Updates an activity in the database
*/
function update_activity($id_atv, $name_atv, $description_atv){
	global $db;
	$query = 'UPDATE activity_atv
				SET name_atv = :name_atv,
					description_atv = :description_atv
				WHERE id_atv = :id_atv';
	$statement = $db->prepare($query);
    $statement->bindValue(':id_atv', $id_atv);
    $statement->bindValue(':name_atv', $name_atv);
    $statement->bindValue(':description_atv', $description_atv);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
	$activity_id = $db->lastInsertId();    
}

/*
Name: search_activities
Arguments: $search
Return Data: $search_activities
Description: Returns a list of activities based on user supplied search term
Based on http://stackoverflow.com/questions/18233204/using-search-firstname-and-last-name-mixed-php-query?rq=1
*/
function search_activities($search){
	global $db;
  	$query = "SELECT * FROM activity_atv 
    			WHERE name_atv 
    			LIKE CONCAT('%',:search,'%') 
    			OR description_atv LIKE CONCAT('%',:search,'%')"; 
    $statement = $db->prepare($query);
    $statement->bindValue(':search', $search);              
    $statement->execute();
    $search_activities = $statement->fetchAll();
    $statement->closeCursor();
    return $search_activities;
}

/*
Name: get_roles
Arguments: none
Return Data: $roles
Description: Returns information about roles from the database
*/
function get_roles(){
	global $db;
	$query = 'SELECT *
          FROM role_rol
          ORDER BY id_rol';
	$roles = $db->query($query);
	return $roles;
}

/*
Name: get_states
Arguments: none
Return Data: $states
Description: Returns a list of the 50 United States
*/
function get_states(){
	global $db;
	$query = 'SELECT *
          FROM states_sts
          ORDER BY id_sts';
	$states = $db->query($query);
	return $states;
}

/*
Name: get_countries
Arguments: none
Return Data: $countries
Description: Returns a listing of countries from the database
*/
function get_countries(){
	global $db;
	$query = 'SELECT *
          FROM countries_cts
          ORDER BY id_cts';
	$countries = $db->query($query);
	return $countries;
}

/*
Name: create_entry
Arguments: $id_usr, $id_atv, $id_rol, $date, $days, $location, $id_sts, $id_cts, $route, $distance, $description
Return Data: none
Description: Creates a logbook entry based on user input
*/
function create_entry($id_usr, $id_atv, $id_rol, $date, $days, $location, $id_sts, $id_cts, $route, $distance, $description){
	global $db;
	$query = 'INSERT INTO entry_ent
				(id_usr_ent, id_atv_ent, id_rol_ent, date_ent, num_days_ent, location_ent, id_sts_ent, id_cts_ent, route_ent, distance_ent, description_ent)
			  VALUES
			  	(:id_usr, :id_atv, :id_rol, :date, :days, :location, :id_sts, :id_cts, :route, :distance, :description)';
	$statement = $db->prepare($query);
    $statement->bindValue(':id_usr', $id_usr);
    $statement->bindValue(':id_atv', $id_atv);
    $statement->bindValue(':id_rol', $id_rol);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':days', $days);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':id_sts', $id_sts);
    $statement->bindValue(':id_cts', $id_cts);
    $statement->bindValue(':route', $route);
    $statement->bindValue(':distance', $distance);
    $statement->bindValue(':description', $description);
    $success = $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();    
    $entry_id = $db->lastInsertId();    
/*
    if ($success) {
	    echo "<p>$row_count row(s) was inserted with this ID: $entry_id</p>";
   } else {
	   echo "<p>No rows were inserted.</p>";
   }
*/    	
}

/*
Name: delete_entry
Arguments: $id_ent
Return Data: none
Description: Deletes a logbook entry from the database based on the entry id
*/
function delete_entry($id_ent){
	global $db;
    $query = 'DELETE FROM entry_ent
              WHERE id_ent = :id_ent';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_ent', $id_ent);
    $statement->execute();
    $statement->closeCursor();	
}

/*
Name: delete_entry_by_user
Arguments: $id_usr
Return Data: none
Description: Deletes logbook entries based on a user id
*/
function delete_entry_by_user($id_usr){
	global $db;
    $query = 'DELETE FROM entry_ent
              WHERE id_usr_ent = :id_usr_ent';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_usr_ent', $id_usr);
    $statement->execute();
    $statement->closeCursor();	
}

/*
Name: days_by_role
Arguments: $id_usr
Return Data: $days
Description: Returns an array of data displaying the number of days a user spent in a specific role.
*/
function days_by_role($id_usr){
	global $db;
	$query = 	"SELECT
					users_usr.username_usr AS 'Username',
					SUM(IF(id_rol_ent= '1', num_days_ent, 0)) AS 'Playing', 
					SUM(IF(id_rol_ent= '2', num_days_ent, 0)) AS 'Training',
					SUM(IF(id_rol_ent= '3', num_days_ent, 0)) AS 'Working', 
					SUM(num_days_ent) AS 'Total Days'
				FROM entry_ent
				INNER JOIN users_usr on users_usr.id_usr = entry_ent.id_usr_ent
				WHERE id_usr_ent = '$id_usr'";
	$statement = $db->prepare($query);
    $statement->bindValue(':id_usr_ent', $id_usr);
    $statement->execute();
    $days = $statement->fetchAll();
    $statement->closeCursor();
    return $days;
}
?>