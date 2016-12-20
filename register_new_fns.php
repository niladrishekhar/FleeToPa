<?php
	require_once('output_fns.php');
	require_once('db_fns.php');
	require_once('data_valid_fns.php');
	session_start();
	@$email = $_POST['tEmailID'];
	@$name = $_POST['tUserName'];
	@$password = $_POST['tPassword2'];
	@$confPassword = $_POST['tConfPassword'];
	try
	{
		if(!($email=='') && !($name=='') &&!($password=='') &&!($confPassword==''))
		{
			if(!valid_email($email))
				throw new Exception('Not a valid email ...');
			$db = db_connect();
			$query = "select 1 from login where userid = '".$name."';";
			$result = $db->query($query);
			if(($result->fetch_row()) == 1)
				throw new Exception('User already exists ..');
			if($password != $confPassword)
				throw new Exception('Password and Confirm Password do not match');
			$query = "insert into login values('".$name."','".sha1($password)."','admin','".$email."')";
			$result = $db->query($query);
			if(!$result)
				throw new Exception('Unable to register user .. please try again');
			do_html_header('Register User');	
			echo "<p>".$name." has been given admin rights</p><br/>";			
		}
		else throw new Exception('Please enter user details for registration ..');
		
		
		
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
	exit;



?>