<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Flee to Paradise</title>
<link href="css/body_styles2.css" rel="stylesheet" type="text/css" />
<!--............... calendar script starts................-->
<link rel="stylesheet" media="screen" type="text/css" href="css/datepicker.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/datepicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
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
				<!-- .............. menu ends  ....... -->
			</td>
			</tr>
		</table>
		</td>
	</tr>
	<?php
	require_once('db_fns.php');
	require_once('data_valid_fns.php');
	try
	{
		@$place = $_GET['place'];
		@$name = $_POST['tName'];
		@$email = $_POST['tEmailAddress'];
		@$phone = $_POST['tPhoneNumbers'];
		@$noofpeople = $_POST['tNoOfPeople'];
		@$noofdays = $_POST['tNoOfDays'];
		@$date = $_POST['date1'];
		@$travelType = $_POST['sTravelType'];
		@$stayTypes = $_POST['sStayType'];
		@$address = $_POST['tAddress'];
		if(!isset($name) && !isset($email) && !isset($phone) && !isset($noofpeople) && !isset($noofdays) && !isset($date) && !isset($travelType) && !isset($stayTypes) && !isset($address))
			throw new Exception('Please fill up the form ...');
		if(!valid_email($email))
			throw new Exception('Please enter a valid email address');
		if(!valid_phone_number($phone))
			throw new Exception('Please enter a valid mobile number');
		if(!preg_match('/^[0-9]+$/',$noofpeople))
			throw new Exception('Please enter the number of peoples');
		if(!preg_match('/^[0-9]+$/',$noofdays))
			throw new Exception('Please enter the number of days');
		if(check_valid_date($date))
		{
			$date = get_date($date);			
		}
		else
			throw new Exception('Invalid Date');
		$conn = db_connect();
		$query = "insert into orders values(null,'".$name."','".$phone."','".$email."','".$address."',".$noofpeople.",'".$date."','".$place."','".$stayTypes."','".$travelType."','fresh',".$noofdays.");";
		$result = $conn->query($query);
		
		if($result)
		{
			?>
                 <tr>
			<td height = "400" >	
			<table width="800" align="center" cellpadding="0" border="0" cellspacing="0" >
					<tr>
						<td class = "box">
							<table width = "800" border="0" cellpadding="0" cellspacing="4" align="center">
								<tr>
									<td height="30" align="left" valing="middle" class="heading">Book the Tour</td>
								</tr>
								<tr>
									<td valing="middle" class="home_gallery_data">
										<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
                                      	<tr>
                                        	<td>Thanks for providing the details.</br></br></br>Our Customer Care Executive will get in touch with you shortly.</td>
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
		else throw new Exception('Unable to process your request .. Please try later');
				
		
		
		
		
		
		
	}
	catch(Exception $e)
	{
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
                                        	<td><? echo $e->getMessage(); ?></td>
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
	?>
	<tr>
		<td id="footer"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			<td align="left">&copy; Copyright 2dayHoliday. All Rights Reserved </td>
			<td width="300" align="center"><a href="login.php" class="admin_login">Admin Login</a> </td>
			<td width="200" align="right">designed by: </td>
			<td width="35" align="right"><a href="http://www.justcreativeweb.com" target="_blank" onmouseover="MM_swapImage('Image1','','images/webmaster_active.png',1)" onmouseout="MM_swapImgRestore()" ><img src="images/webmaster.png" width="32" height="30" border="0" id="Image1"/></a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</body>
</html>
