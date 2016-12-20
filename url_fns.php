<?php
	require_once('db_fns.php');
	function get_stay_places()
	{
		$conn = db_connect();
		$result = $conn->query("select place from stay_type group by(place)");
		if(!$result)
			return false;
			
		$places_array = array();
		
		for($count =1; $row=$result->fetch_row();++$count)
		{
			$places_array[$count] = $row[0];
		}

		return $places_array;		
	}
	

	

?>