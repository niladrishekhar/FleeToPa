<?php
require_once('output_fns.php');
require_once('user_auth_fns.php');
session_start();
try{
	if(check_valid_user())
	{
		do_html_header('Change Password');
		display_change_password_form();
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