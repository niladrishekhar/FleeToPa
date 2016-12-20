<?php
	require_once('db_fns.php');
	require_once('user_auth_fns.php');
	require_once('output_fns.php');
	session_start();
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in');
		if($_SESSION['type'] != 'master')
			throw new Exception('User not allowed to add new place');
		@$place = $_POST['sPlace'];
		if($place == '')
			throw new Exception('Please enter a valid place');
		@$travel_type = $_POST['tTravelType'];
		@$price = $_POST['tPrice'];
		if($stay_type == '' && $price == '')
			throw new Exception('Please enter a valid stay type and price');
		$conn = db_connect();
		
		$query = "select traveltype from travel_type where place='".$place."' and traveltype='".$travel_type."';";
		
		$result = $conn->query($query);
		if($result->num_rows >0)
			throw new Exception('Stay Type already exists');
		$query = "insert into travel_type values('".$travel_type."',".$price.",'".$place."');";
		
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Unable to add travel type .. please try later');
		else
		{
			do_html_header('Add Travel Type');
			?>
			<tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Add Travel Type</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td>Record successfully added to the database</td>
                                        </tr>
                                        </table>
									</td>
								</tr>
								<tr>
									<td height="50">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
        <p>&nbsp; </p>
		<?php			
		}
		
	}
	catch(Exception $e)
	{
		display_error($e->getMessage());
	}
	display_user_menu();
?>