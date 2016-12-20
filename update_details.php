<?php
	require_once('db_fns.php');
	require_once('output_fns.php');
	require_once('user_auth_fns.php');
	require_once('data_valid_fns.php');
	session_start();
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in');
		@$orderid = $_GET['orderid'];
		if($orderid == '')
			throw new Exception('Please select a valid orderid');
		@$noOfPeople = $_POST['tNoOfPeople'];
		@$noOfDays = $_POST['tNoOfDays'];
		@$date = $_POST['tDate'];
		@$place = $_POST['tPlace'];
		@$traveltype = $_POST['sTravelType'];
		@$staytype = $_POST['sStayType'];
		
		if($noOfPeople == '' && $noOfDays == '' && $date == '' && $place=='' && $traveltype == '' && $staytype == '')
			throw new Exception('Please fill up the form');
		if(!preg_match('/^[0-9]+$/',$noOfPeople))
			throw new Exception('Please enter the number of peoples');
		if(!preg_match('/^[0-9]+$/',$noOfDays))
			throw new Exception('Please enter the number of days');
		if(check_valid_date($date))
		{
			$date = get_date($date);			
		}
		else
			throw new Exception('Invalid Date');
		$conn = db_connect();
		$query = "update orders set persons =".$noOfPeople.",no_days = ".$noOfDays.", travel_date = '".$date."',travel_to = '".$place."',stay_type = '".$staytype."', travel_type = '".$traveltype."',status = 'open' where order_id = ".$orderid."; ";
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Unable to update .. please try at a later point of time');
		else
		{
			do_html_header('Update Order');
			display_update_status($orderid);
		}
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();


?>