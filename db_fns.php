<?php

	function db_connect()
	{
		$result = new MySQLi('localhost','fleetopa_nil','infy@123','fleetopa_travel');
		if(!$result)
			throw new Exception('Could not connect to database');
		else return $result;		
	}
?>