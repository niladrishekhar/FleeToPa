<?php
	session_start();
	require_once('user_auth_fns.php');
	require_once('output_fns.php');
	try
	{
		if(check_valid_user())
		{
			$old_user=$_SESSION['user'];
			unset($_SESSION['user']);
			
			$result_dest = session_destroy();
			if(!empty($old_user))
			{
				if($result_dest)
					header("Location:http://".$_SERVER['HTTP_HOST']."/login.php");
				else
					throw new Exception('Could not log you out ..');
			}
			else
				throw new Exception('You were not logged in so couldnt be logged out');		
		}
		else
			throw new Exception('You were not logged in so couldnt be logged out');
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
	
?>