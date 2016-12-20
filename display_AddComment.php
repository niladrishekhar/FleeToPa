<?php
	require_once('db_fns.php');
	require_once('user_auth_fns.php');
	require_once('output_fns.php');
	session_start();
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in');
		@$orderid = $_GET['orderid'];
		if($orderid == '')
			throw new Exception('Please select a valid orderid');
		do_html_header('Add Comment');
		display_add_comment($orderid);		
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();



?>