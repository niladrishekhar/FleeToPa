<?php
	require_once('output_fns.php');
	require_once('user_auth_fns.php');
	session_start();
	try
	{
		if(check_valid_user())
		{
			if($_SESSION['type'] == "master")
			{
				do_html_header('Register Admin');
				display_register_form();
				
			}
			else
				throw new Exception('User not allowed to register new admin');
		}
		else
			throw new Exception('Please log in ..');
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	
	display_user_menu();
		
				



?>