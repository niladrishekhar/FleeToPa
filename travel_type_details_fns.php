<?php
	require_once('output_fns.php');
	require_once('user_auth_fns.php');
	require_once('url_fns.php');
	session_start();
	try{
		if(check_valid_user())
		{
			do_html_header('Travel Type Details');
			if($stay_places = get_stay_places());
			display_travel_rates($_GET['place']);		
		}
		else 
			throw new Exception('Please login ...');
					
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
?>