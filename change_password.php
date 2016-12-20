<?php
	require_once('output_fns.php');
	require_once('db_fns.php');
	require_once('user_auth_fns.php');
	session_start();
	@$oldpwd= $_POST['tOldPassword'];
	@$newpwd = $_POST['tNewPassword'];
	@$confnewpwd = $_POST['tConfNewPassword'];
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in ..');
		if(isset($oldpwd)&&isset($newpwd)&&isset($confnewpwd))
		{
			$conn = db_connect();
			$user = $_SESSION['user'];
			$query = "select userid from login where userid = '".$user."' and password = '".sha1($oldpwd)."';";
			$result = $conn->query($query);
			$row= $result->fetch_row();
			if($row[0]!=$_SESSION['user'])
				throw new Exception('Invalid Old Password');
			if($newpwd !=$confnewpwd)
				throw new Exception('New Password and Confirm Password do not match');
			$query = "update login set password = '".sha1($newpwd)."' where userid = '".$user."' and password = '".sha1($oldpwd)."';";
			$result= $conn->query($query);
			if($result)
			{
				do_html_header('Change Password');
				echo "<br/><p>Password changed successfully</p><br/>";
			}
			else
				throw new Exception('Unable to change password');	
		
		}
		else
			throw new Exception('Please fill in the old and new pasword');
	}
	catch (Exception $e)
	{
		display_error($e->getMessage());		
	}
	display_user_menu();

?>