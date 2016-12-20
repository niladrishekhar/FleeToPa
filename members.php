<?php
require_once('output_fns.php');
require_once('db_fns.php');
require_once('user_auth_fns.php');
session_start();
@$user = $_POST['tLoginID'];
@$password = $_POST['tPassword'];

try
{
	if(!check_valid_user())
	{
		if(!$user && !$password)
			throw new Exception('Please enter a user ID and Password');
		$db = db_connect();	
		$query = "select user_type from login where userid = '".$user."' and password = '".sha1($password)."';";
		$result = $db->query($query);
		if($result->num_rows>0)
		{
			$row = $result->fetch_row();
			
			if($row[0] == 'admin'|| $row[0] == 'master')
			{
				if($row[0] == "admin")
					$_SESSION['type'] = "admin";
				else if ($row[0] == "master")
					$_SESSION['type'] = "master";
				else 
					throw new Exception("User ID and Password do not match .. ");
			}
		}
		else
		{
			throw new Exception('User ID and Password do not match ..');
		}
		$_SESSION['user'] = $user;
	}
	do_html_header('Fresh Orders');
	display_order_id('fresh');
	
}

catch(Exception $e)
{
	display_error($e->getMessage());
}
display_user_menu();





?>