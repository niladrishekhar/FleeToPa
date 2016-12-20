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
		$conn = db_connect();
		$query = "update orders set status = 'close' where order_id = ".$orderid.";";
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Unable to close .. please try at a later point of time');
		do_htm_header('Close Order');
		display_close_status($orderid);	
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
	


?>