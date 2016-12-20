<?php
	require_once('output_fns.php');
	require_once('db_fns.php');
	require_once('user_auth_fns.php');
	session_start();
	
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in');
		if($_SESSION['type'] != 'master')
			throw new Exception('User not allowed to enter new place');
		do_html_header('Add Place');
		display_add_stay_type_form();	
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
?>