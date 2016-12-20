<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Flee to Paradise</title>
<link href="css/body_styles2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/check.js"></script>
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
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/webmaster_active.png')">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td id="header"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="400" height="160" valign="top" id="logo_holder">
		
		<a href="default.htm">
		<img src="images/logoo.jpg" width="158" height="148" border="0"/></a>		</td>
        <td valign="middle"><!-- .............. menu starts ....... -->
            <div id="menu">
              <ul>
                <li><a href="home.htm" >Home</a></li>
                <li><a href="tours.htm" class="active">Tours</a></li>
                <li><a href="about.htm">About Us</a></li>
                <li><a href="contact.htm">Contact us</a></li>
              </ul>
            </div>
          <!-- .............. menu ends  ....... -->        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <form name="form1" action="register_tour.php?place=<? echo $_GET['place']; ?>" method="post">
    <td height="400"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="box">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="middle" class="heading">Book the Tour </td>
          </tr>
          <tr>
            <td height="260" valign="middle" class="home_gallery_data">
<!-- .............anything slider starts................................ -->			
			<table width="100%" border="0" cellspacing="10" cellpadding="0">
				<tr>
					<td width="150"><strong>Name</strong></td>
					<td width="190"><input name="tName" type="text" class="admin_txt_box" /></td>
					<td width="124">&nbsp;</td>
				</tr>
				<tr>
					<td><strong>Email Address </strong></td>
					<td><input name="tEmailAddress" type="text" class="admin_txt_box" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><strong>Phone Number </strong></td>
					<td><input name="tPhoneNumbers" type="text" class="admin_txt_box" /></td>
					<td>&nbsp;</td>
				</tr>
                <tr>
					<td><strong>Address</strong> </td>
					<td><textarea name="tAddress" class="admin_txt_box"></textarea></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><strong>Number of People</strong> </td>
					<td><input name="tNoOfPeople" type="text" class="admin_txt_box" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><strong>Number of Days</strong> </td>
					<td><input name="tNoOfDays" type="text" class="admin_txt_box" /></td>
					<td>&nbsp;</td>
				</tr>
                <tr>
				    <td><strong>Date of Travel </strong></td>
    <td> <label for="date1"></label>
					  <input name="date1" id="date1" class="date-pick" /></td>
    <td>&nbsp;</td>
  </tr>
				<tr>
					<td><strong>Travel Type</strong></td>
					<td><select name="sTravelType" class="admin_txt_box">
					<?php
					require_once('db_fns.php');
					require_once('output_fns.php');
					try{						
						$conn = db_connect();
						$place = $_GET['place'];
						$query = "select traveltype from travel_type where place ='".$place."';";
						$result = $conn->query($query);
						if($result->num_rows>0)
						{
							for($count=0;$row=$result->fetch_object();++$count)
							{
								?>
								  <option value="<?echo $row->traveltype; ?>"><?echo $row->traveltype; ?></option>
								 <?php
							}
						}
						
						?>
							</select>    </td>
					<td>&nbsp;</td>
				 </tr>
			  <tr>
				<td><strong>Accommodation Type </strong></td>
				<td>
				<select name="sStayType" class="admin_txt_box">
				<?php
				$query = "select staytype from stay_type where place ='".$place."';";
				$result = $conn->query($query);
				if($result->num_rows>0)
				{
					for($count=0; $row=$result->fetch_object();++$count)
					{
						?>
						<option value="<? echo $row->staytype; ?>"><? echo $row->staytype; ?></option>
						<?php
					}
				}
			}
			catch(Exception $e)
			{
				display_error($e->getMessage());
			}
		?>						 
			</select></td>
			<td class="btn_box"><input name="Submit" type="submit" class="button_admin" value="Book the Tour" onclick="return fCheck()" /></td>
			</tr>
			</table>

	<!-- .............anything slider ends................................ -->			</td>
          </tr>
        </table>		</td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
    </table></td>
	</form>
  </tr>
  <tr>
    <td id="footer"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left">&copy; Copyright 2dayHoliday. All Rights Reserved </td>
          <td width="300" align="center"><a href="login.php" class="admin_login">Admin Login</a> </td>
          <td width="200" align="right">designed by: </td>
          <td width="35" align="right"><a href="http://www.justcreativeweb.com" target="_blank" onmouseover="MM_swapImage('Image1','','images/webmaster_active.png',1)" onmouseout="MM_swapImgRestore()" ><img src="images/webmaster.png" width="32" height="30" border="0" id="Image1"/></a></td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
