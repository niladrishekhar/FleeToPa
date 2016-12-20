<?php
	require_once('db_fns.php');
	
	function filled_out($form_vars)
	{
		foreach($form_vars as $key=>$value)
		{
	
			if((!isset($key))||($value == ''))
			{
				return false;
			}
		}
	
		return true;
	}
	
	function valid_email($email)
	{
		if(preg_match("/^[a-z A-Z 0-9_\.\-]+@[a-z A-Z 0-9\-]+\.[a-z A-Z 0-9\-\.]+$/",$email))
			return true;
		else
			return false;
	}
	
	function valid_phone_number($no)
	{
		if(preg_match("/^[0-9]+$/",$no) && (strlen($no) == 10))
			return true;
		else return false;
	}
		
		
	function check_valid_date($date)
	{
		$date_array = array();
		$date_array = explode('/',$date);
		if(checkdate((int)$date_array[1],(int)$date_array[0],(int)$date_array[2]))
			return true;
		else return false;
	}
	
	function get_date($date)
	{
		$date_array = array();
		$date_array = explode('/',$date);
		return ($date_array[2]."-".$date_array[1]."-".$date_array[0]);		
	}

?>