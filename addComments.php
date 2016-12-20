<?php
	require_once('db_fns.php');
	require_once('user_auth_fns.php');
	require_once('output_fns.php');
	session_start();
	try
	{
		if(!check_valid_user())
			throw new Exception('Please log in');
		@$orderid = $_GET['orderid'];
		@$comments = $_POST['tComments'];
		echo $orderid."hello".$comments;
		if($orderid == '')
			throw new Exception('Please select a valid orderid');
		if($comments == '')
			throw new Exception('Please add comments');
		
		$conn = db_connect();
		$query = "insert into comments values(".$orderid.",'".$_SESSION['user']."','".addslashes($comments)."',null);";
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Unable to add comments .. please try at a later');
		else
		{
			do_html_header('Add Comments');?>
		<tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Comment Added</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td>Comment added successfully</td>
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