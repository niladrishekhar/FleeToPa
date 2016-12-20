<?php
	function check_valid_user()
	{
		if(isset($_SESSION['user']))
		{
			return true;
		}
		else
			return false;
	}



?>