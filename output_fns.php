<?php

	function display_error($message)
	{
		do_html_header('Problem');
		?>
        <tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Error</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td><?php echo $message; ?></td>
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
	function do_html_header($title)
	{
		?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title;?></title>
        <script type="text/javascript" src="js/check.js"></script>
		<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
        <script type="text/javascript" src="js/enableField.js"></script>
        <!--............... calendar script starts................-->
<!-- firebug lite -->
		<script type="text/javascript" src="datepicker/firebug.js"></script>

        <!-- jQuery -->
		<script type="text/javascript" src="datepicker/jquery.min.js"></script>
        
        <!-- required plugins -->
		<script type="text/javascript" src="datepicker/date.js"></script>
		<!--[if lt IE 7]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
        
        <!-- jquery.datePicker.js -->
		<script type="text/javascript" src="datepicker/jquery.datePicker.js"></script>
        
        <!-- datePicker required styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="datepicker/datePicker.css">
		
        <!-- page specific styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="datepicker/demo.css">
        
        <!-- page specific scripts -->
		<script type="text/javascript" charset="utf-8">
            $(function()
            {
				$('.date-pick').datePicker({autoFocusNextInput: true});
            });
		</script>
<!--............... calendar script ends................-->
		<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
		<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
       <link href="css/body_styles2.css" rel="stylesheet" type="text/css" />
       
</head>
<body onload="MM_preloadImages('images/webmaster_active.png')">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td id="header">
	<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
  		<tr>
    		<td id="header">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="400" height="160" valign="top" id="logo_holder"><a href="home.htm"> <img src="images/logoo.jpg" width="158" height="148" border="0"/></a> </td>
						<td align="right" valign="right"><!-- .............. menu starts ....... -->
						<div id="menu" >
						<ul>
						<?php
						require_once('user_auth_fns.php');
						if(isset($_SESSION['type']))
						{
							?>
							<li><a href="logout.php">Log Out</a></li>
							<?php
						}
						else
						{
						?>
							<li> <a href="login.php" class="active">Log In</a></li>
						 <? } ?>
						</ul>
						</div>
						</td>
						<!-- .............. menu ends  ....... -->      
					 </tr>
					 <tr>
                     <td></td>
					 <td align="right" valign="bottom">
					 <?php
					 	if(check_valid_user())
						echo "<p>Logged in as ".$_SESSION['user']."</p><br/>";				
					 ?>
                     </td>
                     </tr>
				</table>
			</td>
		</tr>
	</table>
	</td>
    </tr>
    </table>
		  <?php	
		  
	}
	
	function do_html_heading($title)
	{
		echo "<h2>".$title."</h2>";
	}
	
	function display_login_form()
	{
		
		?>
		<form id="form1" name="form1" method="post" action="members.php">
			<tr>
				<td height="400">
				 <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr> 
                            	<td height="30" align="left" valign="middle" class="heading">Admin Login</td>
                            </tr>                         
                            <tr>
								<td height="150" valign="middle" class="home_gallery_data">
									<table width="100%" border="0" cellpadding="0" cellspacing="4">
										<tr>
											<td width="75">Login ID</td>
											<td width="70%">
											<input type="text" name="tLoginID" id="tLoginID" class="admin_txt_box" autocomplete="on"/></td>
										</tr>
										<tr>
											<td width="75">Password</td>
											<td>
											<input type="password" name="tPassword" id="tPassword" class="admin_txt_box" /></td>
										</tr>
										<tr>									  <td><input type="submit" name="bLogin" id="bLogin" value="Login" class="button_admin" onclick="return checkLogin() "/></td>
										  <td><input type="button" name="tForgotPassword" id="tForgotPassword" value="Forgot Password" onclick="reset_password.php" class="button_admin"/></td>
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
		</form>
                        
		<p>&nbsp; </p>
		
		  <?php
		  
		  
	}
	
	
	function do_html_url($url,$link)
	{
		?>
		  <a href="<?php echo $url;?>"><?php echo $link;?></a>       
		 <?php
	}
	
	function display_user_menu()
	{
		?>
        <tr>
			<td id="footer">
			<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="footer">
				<tr>
					<td>
					<a href="members.php" style="color:#FFF">Fresh Orders</a>&nbsp;&nbsp;
					<a href="openorders.php" style="color:#FFF">Open Orders</a>&nbsp;&nbsp;
					<a href="closeorders.php" style="color:#FFF">Closed Orders</a>&nbsp;&nbsp;
					<a href="stay_type_fns.php" style="color:#FFF">Stay Type</a>&nbsp;&nbsp;&nbsp;
					<a href="travel_type_fns.php" style="color:#FFF">Travel Type</a>&nbsp;&nbsp;
					<a href="change_password_form.php" style="color:#FFF">Change Password</a>&nbsp;&nbsp;         
					<?php
					echo "</td></tr>";
					echo "<tr><td>&nbsp;&nbsp;</td></tr>";
					echo "<tr><td>";
						@$type = $_SESSION['type'];
						if($type == 'master')
						{
							?>
							<a href="register_new_form.php" style="color:#FFF">Register</a>&nbsp;&nbsp;&nbsp;
                            <a href="add_places_form.php" style="color:#FFF">Add Place</a>&nbsp;&nbsp;&nbsp;
                            <a href="add_stay_type_form.php" style="color:#FFF">Add Stay Type</a>&nbsp;&nbsp;&nbsp;
                            <a href="add_travel_type_form.php" style="color:#FFF">Add Travel type</a>&nbsp;&nbsp;&nbsp;
                            
							<?php
						}	
						
						echo "</td></tr></body></html>";
	}
	
	
	function display_register_form()
	{
		?>
		<tr>
			<td height = "400">	
				<form id="form2" name="form2" method="post" action="register_new_fns.php">
					<table width="300" align="center" cellpadding="0" border="0" cellspacing="0" >
						<tr>
							<td class = "box">
								<table width = "100%" border="0" cellpadding="0" cellspacing="0" align="center">
									<tr>
										<td height="30" align="left" valing="middle" class="heading">Register Admin</td>
									</tr>
									<tr>
										<td height="200" valing="middle" class="home_gallery_data">
											<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
											<tr>				
												<td width="75">Email</td>
												<td width="70%"><input name="tEmailID" type="text" id="tEmailID" maxlength="30" class="admin_txt_box" autocomplete="on"/></td>
											</tr>
											<tr>
												<td width="75">User Name</td>
												<td><input type="text" name="tUserName" id="tUserName" class="admin_txt_box" autocomplete="on" /></td>
											</tr>
											<tr>
												<td width="75">Password</td>
												<td><input type="password" name="tPassword2" id="tPassword2" class="admin_txt_box" /></td>
											</tr>
											<tr>
												<td width="75">Confirm</td>
												<td><input type="password" name="tConfPassword" id="tConfPassword" class="admin_txt_box" /></td>
											</tr>
											<tr>
												<td><input type="submit" name="bSubmit" id="bSubmit" value="Register" class="button_admin" onclick="return checkRegister()" /></td>
												<td>&nbsp;</td>
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
				</form>
			</td>
		</tr>
        <p>&nbsp; </p>
<?php
	}
	
	function display_change_password_form()
	{
		?>
		<tr>
			<td height = "400">	
				<form action="change_password.php" method="post">
					<table width="300" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "100%" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Change Password</td>
								</tr>
								<tr>
									<td height="200" valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
										<tr>	
											<td width="37%">Old Password</td>
											<td width="63%"><input name="tOldPassword" type="password" id="tOldPassword" maxlength="100" class="admin_txt_box" /></td>
										</tr>
										<tr>
											<td>New Password</td>
											<td><input name="tNewPassword" type="password" id="tNewPassword" maxlength="100" class="admin_txt_box" /></td>
										</tr>
										<tr>
											<td>Repeat New Password</td>
											<td><input type="password" name="tConfNewPassword" id="tConfNewPassword" class="admin_txt_box" /></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td><input type="submit" name="bSubmit2" id="bSubmit2" value="Change Password" class="button_admin" onclick="return checkPassword()" /></td>
											<td>&nbsp;</td>
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
			</form>
		</td>
	</tr>  
    <p>&nbsp; </p>
        <?php
	}
	function display_stay_type($stay_places)
	{
		?><tr>
			<td>	
			<table width="300" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "100%" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Stay Type</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
										<?php
										if(is_array($stay_places) && count($stay_places)>0)
										{
											foreach($stay_places as $places)
											{
												?><tr><td><a href="stay_type_details_fns.php?place=<?php echo $places; ?>"><?php echo $places; ?></a></td></tr>
												<?php
											}
										}
										
										else
										{
											echo "<tr><td>";
											echo "<p>Sorry no places have been added</p>";
											echo "</td></tr>";
										}
										?>
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
	
	function display_rates($place)
	{
	?><tr>
			<td >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Stay Type</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
	
										<?php
											$conn = db_connect();
											$query= "select * from stay_type where place ='".$place."';";
											$result = $conn->query($query);
											if(!$result)
												echo "<tr><td>No records exist .. </td></tr>";
											else 
											{
												?>
												  <tr>
													<td width="75"><strong>No</strong></td>
													<td width="75"><strong>Place</strong></td>
													<td width="75"><strong>Stay Type</strong></td>
													<td width="75"><strong>Price</strong></td>
												  </tr>
												  <?php
												for($count = 0;$row = $result->fetch_object();$count++)
												{   
												?>          
													
												  <tr>
													<td width="75"><?php echo ($count+1);?></td>
													<td width="75"><?php echo $row->place; ?></td>
													<td width="75"><?php echo $row->staytype;?></td>
													<td width="75"><?php echo $row->price; ?></td>
												  </tr>
												  <?php
												}			
											}
											?>
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
	
		function display_travel_type($stay_places)
	{
		?>
        <tr>
			<td >	
				<table width="300" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "100%" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Travel Type</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
											<?php
											if(is_array($stay_places) && count($stay_places)>0)
											{
												foreach($stay_places as $places)
												{
													?><tr><td><a href="travel_type_details_fns.php?place=<?php echo $places; ?>"><?php echo $places; ?></a></td></tr>
													<?php
												}
											}
											
											else
											{
												echo "<tr><td>";
												echo "Sorry no places have been added";
												echo "</td></tr>";
											}
											?>
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
	
	
	function display_travel_rates($place)
	{
		?>
        <tr>
			<td >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Stay Type</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                        <?php
											$conn = db_connect();
											$query= "select * from travel_type where place ='".$place."';";
											$result = $conn->query($query);
											if($result->num_rows >0) 
											{
									/*			$places_array = array();
												for($count =1; $row=$result->fetch_row();++$count)
												{
													$places_array[$count] = $row[0];
												}*/
												?>
											
												<table width="100%" border="0" cellspacing="4" cellpadding="0">
												  <tr>
													<td width="75"><strong>Serial Number</strong></td>
													<td width="75"><strong>Place</strong></td>
													<td width="75"><strong>Travel Type</strong></td>
													<td width="75"><strong>Price</strong></td>
												  </tr>
												  <?php
												for($count = 0;$row = $result->fetch_object();$count++)
												{   
												?>          
													
												  <tr>
													<td width="75"><?php echo ($count+1);?></td>
													<td width="75"><?php echo $row->place; ?></td>
													<td width="75"><?php echo $row->traveltype;?></td>
													<td width="75"><?php echo $row->price; ?></td>
												  </tr>
												  <?php
												}
											}
											else
												echo "<tr><td>No records exists.. </td></tr>";
											echo "</table>";
											
										?>
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
                </table>
			</td>
		</tr>
        <p>&nbsp; </p>
        <?php
			
			
	}
	
	
	function display_order_id($status)
	{
		?>
         <tr>
			<td >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading"><?php echo $status; ?> orders</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                        <?php
											$conn = db_connect();
											$query = "select order_id,name,travel_to from orders where status = '".$status."';";
											$result = $conn->query($query);
											if($result)
											{
												if($result->num_rows >0)
												{
													?>
                                                    <table width="100%" border="0" cellspacing="4" cellpadding="0">
												  <tr>
													<td width="33%"><strong>Order ID</strong></td>
													<td width="33%"><strong>Name</strong></td>
													<td width="33%"><strong>Place</strong></td>
                                                    <td width="25%"><strong>Comment</strong></td>
												  </tr>
                                                    <?php
													for($count = 0;$row = $result->fetch_object();$count++)
													{
														?>
                                                        <tr>
                                                            <td width="33%"><a href="show_details_fns.php?orderid=<? echo $row->order_id; ?>" ><?php echo $row->order_id; ?></a></td>
                                                            <td width="33%"><?php echo $row->name;?></td>
                                                            <td width="33%"><?php echo $row->travel_to; ?></td>
                                                            <td width="25%"><href="show_comments.php?orderid=<?php echo $row->order_id; ?>" >Comments</a></td>
                                                        </tr>
                                                        <?php
													}													
												}
												else
												echo "<tr><td>No ".$status." orders exists</td></tr>";
												
											}
											else throw new Exception('Please try at a later time');
											?>
                                            </table>
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
	
	function display_update_status($orderid)
	{
		?>
		<tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Order Updated</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td>Order ID <?php echo $orderid; ?> has been updated successfully</td>
                                            </br>
                                            </br>
                                            <td>Please check in the open orders to view the changes</td>
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
	
	function display_close_status($orderid)
	{
		?>
		<tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Order Closed</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td>Order ID <?php echo $orderid; ?> has been closed successfully</td>
                                            </br>
                                            </br>
                                            <td>Please check in the closed orders to view the changes</td>
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
	function display_add_comment($orderid)
	{
		?>
		<form id="form1" name="form9" method="post" action="addComments.php?orderid=<?php echo $orderid; ?>">
			<tr>
				<td height="400">
				 <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr> 
                            	<td height="30" align="left" valign="middle" class="heading">Add Comment</td>
                            </tr>                         
                            <tr>
								<td height="150" valign="middle" class="home_gallery_data">
									<table width="100%" border="0" cellpadding="0" cellspacing="4">
										<tr>
											<td width="75">Order ID</td>
											<td width="70%">
											<input type="text" name="tOrderID"  class="admin_txt_box" autocomplete="on" value="<?php echo $orderid; ?>" disabled="disabled"/>
											</td>
										</tr>
										<tr>
											<td width="75" height="98">Comment</td>
											<td>
											<textarea name="tComments" class="admin_txt_box" id="tPassword" rows="5"></textarea></td>
										</tr>
										<tr>									  <td><input type="submit" name="bAddComment" id="bLogin" value="Add" class="button_admin"/></td>
										  <td>&nbsp;</td>
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
		</form>
                        
		<p>&nbsp; </p>
		  
		  <?php
	}
	
	function display_comments($orderid)
	{
		?>
         <tr>
			<td >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Comments</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                        <?php
											$conn = db_connect();
											$query = "select * from comments where order_id = ".$orderid." order by logtime desc;";
											$result = $conn->query($query);
											if($result)
											{
												if($result->num_rows >0)
												{
													?>
                                                    <table width="100%" border="0" cellspacing="4" cellpadding="0">
												  <tr>
													<td width="10%"><strong>Order ID</strong></td>
													<td width="10%"><strong>User</strong></td>
													<td width="50%"><strong>Comment</strong></td>
                                                    <td width="30%"><strong>Log Time</strong></td>
												  </tr>
                                                    <?php
													for($count = 0;$row = $result->fetch_object();$count++)
													{
														?>
                                                        <tr>
                                                            <td width="10%"><?php echo $row->order_id; ?></td>
                                                            <td width="10%"><?php echo $row->userid;?></td>
                                                            <td width="50%"><?php echo stripslashes($row->comment); ?></td>
                                                            <td width="30%"><?php echo $row->logtime; ?></td>
                                                        </tr>
                                                        <?php
													}													
												}
												else
												echo "<tr><td>No Comments added</td></tr>";
												
											}
											else throw new Exception('Please try at a later time');
											?>
                                            </table>
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
	function display_add_place_form()
	{
		?>
		<form id="form11" name="form11" method="post" action="add_places.php">
			<tr>
				<td height="400">
				 <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr> 
                            	<td height="30" align="left" valign="middle" class="heading">Add Place</td>
                            </tr>                         
                            <tr>
								<td height="150" valign="middle" class="home_gallery_data">
									<table width="100%" border="0" cellpadding="0" cellspacing="4">
										<tr>
											<td width="75">Place</td>
											<td width="70%">
											<input type="text" name="tPlace"  class="admin_txt_box" autocomplete="on"/>
											</td>
										</tr>
										<tr>
                                        <td><input type="submit" name="bAddPlace" id="bAddPlace" value="Add" class="button_admin" /></td>
										  <td>&nbsp;</td>
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
		</form>
                        
		<p>&nbsp; </p>
		  
		  <?php
	}
	
	function display_add_stay_type_form()
	{
		?>
		<form id="form17" name="form17" method="post" action="add_stay_type.php">
			<tr>
				<td height="400">
				 <table width="350" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr> 
                            	<td height="30" align="left" valign="middle" class="heading">Add Stay Type</td>
                            </tr>                         
                            <tr>
								<td height="150" valign="middle" class="home_gallery_data">
									<table border="0" cellpadding="0" cellspacing="4" align="center">
										<tr>
											<td width="100">Place</td>
											<td width="250">
											<select name="sPlace" class="admin_txt_box">
                                            <?php
											try
											{
												$conn = db_connect();
												$query = 'select place from places group by place';
												$result = $conn->query($query);
												if($result->num_rows>0)
												{
													for($count=0;$row=$result->fetch_object();++$count)
													{
														?>
                                                        <option value="<?php echo $row->place; ?>"><?php echo $row->place; ?></option>
                                                        <?php
													}
												}
												else throw new Exception('No places exist in the database');
											}
											catch(Exception $e)
											{
												throw $e;	
											}
											?>
                                            </select>
											</td>
										</tr>
																				<tr>
											<td width="100">Stay Type</td>
											<td width="250">
											<input type="text" name="tStayType"  class="admin_txt_box" autocomplete="on"/>
											</td>
										</tr>
                                        										<tr>
											<td width="100">Price</td>
											<td width="250">
											<input type="text" name="tPrice"  class="admin_txt_box" autocomplete="on" />
											</td>
										</tr>
										<tr>									  <td><input type="submit" name="bAdd" id="bAdd" value="Add" class="button_admin" onclick="return checkStayTravelType()"/></td>
										  <td>&nbsp;</td>
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
		</form>
                        
		<p>&nbsp; </p>
		  
		  <?php
	}
	
	function display_add_travel_type_form()
	{
		?>
		<form id="form19" name="form19" method="post" action="add_travel_type.php">
			<tr>
				<td height="400">
				 <table width="350" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr> 
                            	<td height="30" align="left" valign="middle" class="heading">Add Travel Type</td>
                            </tr>                         
                            <tr>
								<td height="150" valign="middle" class="home_gallery_data">
									<table border="0" cellpadding="0" cellspacing="4" align="center">
										<tr>
											<td width="100">Place</td>
											<td width="250">
											<select name="sPlace" class="admin_txt_box">
                                            <?php
											try
											{
												$conn = db_connect();
												$query = 'select place from places group by place';
												$result = $conn->query($query);
												if($result->num_rows>0)
												{
													for($count=0;$row=$result->fetch_object();++$count)
													{
														?>
                                                        <option value="<?php echo $row->place; ?>"><?php echo $row->place; ?></option>
                                                        <?php
													}
												}
												else throw new Exception('No places exist in the database');
											}
											catch(Exception $e)
											{
												throw $e;	
											}
											?>
                                            </select>
											</td>
										</tr>
																				<tr>
											<td width="100">Travel Type</td>
											<td width="250">
											<input type="text" name="tTravelType"  class="admin_txt_box" autocomplete="on"/>
											</td>
										</tr>
                                        										<tr>
											<td width="100">Price</td>
											<td width="250">
											<input type="text" name="tPrice"  class="admin_txt_box" autocomplete="on" />
											</td>
										</tr>
										<tr>									  <td><input type="submit" name="bAdd" id="bAdd" value="Add" class="button_admin" onclick="return checkStayTravelType()"/></td>
										  <td>&nbsp;</td>
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
		</form>
                        
		<p>&nbsp; </p>		  
		  <?php
	}
	?>
    <?php
	}
	?>

