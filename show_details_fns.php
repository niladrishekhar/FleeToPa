<?php
require_once('output_fns.php');
require_once('user_auth_fns.php');
require_once('db_fns.php');
session_start();

try
{
	if(!check_valid_user())
		throw new Exception('Please log in');
	@$order = $_GET['orderid'];
	if($order == '')
	throw new Exception('Please select a valid order id');
	else
	{
		$conn = db_connect();
		$query = "select * from orders where order_id = ".$order.";";
		$result = $conn->query($query);
		if(!$result)
			throw new Exception('Please try later');
		if($result->num_rows>1)
			throw new Exception('More then 1 rows returned');
		else 
		{
			$row = $result->fetch_object();
			do_html_header('Order Details');
			?>
			<tr>
            <form name="form1" action="update_details.php?orderid=<? echo $order ?>" method="post">
				<td height="400"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td class="box">
		
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="30" align="left" valign="middle" class="heading">Book the Tour </td>
							</tr>
								<tr>
									<td height="260" valign="middle" class="home_gallery_data">
									<!-- .............anything slider starts................................ -->			
										<table width="100%" border="0" cellspacing="4" cellpadding="0">
											<tr>
												<td width="200"><strong>Name</strong></td>
												<td width="190"><input name="tName" type="text" class="admin_txt_box" value="<? echo $row->name; ?>" disabled="diasbled"/></td>
												<td width="124">&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Email Address </strong></td>
												<td><input name="tEmailAddress" type="text" class="admin_txt_box" value="<? echo $row->email_id; ?>" disabled="disabled" /></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Phone Number </strong></td>
												<td><input name="tPhoneNumbers" type="text" class="admin_txt_box" value="<?echo $row->mobile_no ?>" disabled="disabled" /></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Address</strong> </td>
												<td><textarea name="tAddress" class="admin_txt_box" disabled="disabled"><? echo $row->address; ?></textarea></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Number of People</strong> </td>
												<td><input name="tNoOfPeople" type="text" class="admin_txt_box" value="<? echo $row->persons; ?>" disabled="disabled" /></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Number of Days</strong> </td>
												<td><input name="tNoOfDays" type="text" class="admin_txt_box" value="<? echo $row->no_days; ?>" disabled="disabled"/></td>
												<td>&nbsp;</td>
											</tr>
                                                <?php
													$date_array = array();
													$date_array = explode('-',$row->travel_date);
													$date = $date_array[2]."/".$date_array[1]."/".$date_array[0];
												
												?>
											<tr>
				    							<td><strong>Date of Travel </strong></td>
    											<td> <label for="tDate"></label>
					  							<input name="tDate" id="tDate" class="date-pick" value="<? echo $date; ?>" disabled="disabled"/></td>
    											<td>&nbsp;</td>
  											</tr>
                                            <tr>
												<td><strong>Place</strong> </td>
												<td><input name="tPlace" type="text" class="admin_txt_box" value="<? echo $row->travel_to; ?>" disabled="disabled" /></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Travel Type</strong></td>
												<td><select name="sTravelType" class="admin_txt_box" disabled="disabled"  >
                                                <option value="<? echo $row->travel_type; ?>"><? echo $row->travel_type; ?></option> 
												<?php
												require_once('db_fns.php');
												require_once('output_fns.php');
												try{						
													$conn = db_connect();
													$query = "select traveltype from travel_type where place = '".$row->travel_to."';";
													$result = $conn->query($query);
													if($result->num_rows>0)
													{
														for($count=0;$row1=$result->fetch_object();++$count)
														{
															if($row1->traveltype != $row->travel_type)
															{
																?>
																  <option value="<?echo $row1->traveltype; ?>"><? echo $row1->traveltype; ?></option>
																 <?php
															}
														}
													}
													
													?>
														</select>    </td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td><strong>Accommodation Type </strong></td>
												<td>
												<select name="sStayType" class="admin_txt_box" disabled="disabled">
                                                <option value="<? echo $row->stay_type; ?>"><? echo $row->stay_type; ?></option> 
												<?php
												$query = "select staytype from stay_type where place ='".$row->travel_to."';";
												$result = $conn->query($query);
												if($result->num_rows>0)
												{
													for($count=0; $row2=$result->fetch_object();++$count)
													{
														if($row2->staytype != $row->stay_type)
														{
															?>
															<option value="<? echo $row2->staytype; ?>"><? echo $row2->staytype; ?></option>
															<?php
														}													
													}
												}
											}
											catch(Exception $e)
											{
												display_error($e->getMessage());
											}
										?>						 
											</select>
                                            </td>
                                            </tr>
                                            <tr>
                                             <?php
											if($row->status != 'close')
											{
												?>
                                                 <table align="middle" width="583" cellspacing="4">
                                            		<tr>
														<td align="left" width="25%"><input name="bEdit" type="button" class="button_admin" value="Edit" onclick="enableField()" /></td>
            			                                <td align="middle" width="25%"><input name="bUpdate" type="submit" class="button_admin" value="Update"/></td>
                        			                    <td align="middle" width="25%"><input name="bClose" type="button" class="button_admin" value="Close" onclick="closeorder(<? echo $order; ?>)" /></td>
                                    			        <td align="right" width="25%"><input name="bComment" type="button" class="button_admin" value="Comment" onclick="AddComment(<? echo $order; ?>)" /></td>
                                                      </tr>
                                                      </table>
                                            <? } ?>

											</tr>
										</table>

									  <!-- .............anything slider ends................................ -->			</td>
										</tr>
									</table>	
								</td>
						</tr>
						<tr>
							<td height="50">&nbsp;</td>
						</tr>
					</table></td>
                    </form>
			</tr>
  <?php		
	}	
	}
}


catch(Exception $e)
{
	display_error($e->getMessage());
}
display_user_menu();
	