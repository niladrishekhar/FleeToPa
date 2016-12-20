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
		@$place = $_POST['tPlace'];
		if($place == '')
			throw new Exception('Please enter a valid place');
		$conn = db_connect();
		
		$query = "select place from places where place='".$place."';";
		
		$result = $conn->query($query);
		if($result->num_rows >0)
			throw new Exception('Place already exists');
		$query = "insert into places values('".$place."');";
		
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Unable to add place .. please try later');
		else
		{
			do_html_header('Add Place');
			?>
			<tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Add Places</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td><? echo $place; ?> has been successfully added to the database</td>
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