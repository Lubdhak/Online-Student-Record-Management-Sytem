<?php
	include('include/config.php');
  
 	$uid= $_SESSION['id'];
	$sql="SELECT ID, users_name FROM users WHERE ID='$uid'";
	$result=mysql_query($sql) or die(mysql_error());
	$rws=mysql_fetch_array($result);
		$name=$rws[1];
 
 	if (isset($_REQUEST['logoutbtn'])) {
 		session_destroy();
 		header('Location:index.php');
 	}
 
	$qsql="SELECT ID, pay_st FROM users WHERE ID='$uid'";
	$qresult=mysql_query($qsql) or die(mysql_error());
	$qrws=mysql_fetch_array($qresult);
	$payst=$qrws[1];
 
	$sqls="SELECT ID, phy_s, chem_s, math_s, bio_s, com_s, up FROM users WHERE ID='$uid'";
	$results=mysql_query($sqls) or die(mysql_error());
	$rwss=mysql_fetch_array($results);
	$ph=$rwss[1];
	$ch=$rwss[2];
	$ma=$rwss[3];
	$bi=$rwss[4];
	$co=$rwss[5];
	$up=$rwss[6];

	if (isset($_REQUEST['confirmsub'])) {
		if ($_REQUEST['sub']=="ph") {
			$sqlcp="UPDATE users SET chem='0', math='0', bio='0', com='0', phy_s='2', chem_s='0', math_s='0', bio_s='0', com_s='0', up='0' WHERE ID='$uid'";
			mysql_query($sqlcp) or die(mysql_error());
		}
		if ($_REQUEST['sub']=="ch") {
			$sqlcch="UPDATE users SET phy='0', math='0', bio='0', com='0', phy_s='0', chem_s='2', math_s='0', bio_s='0', com_s='0', up='0' WHERE ID='$uid'";
			mysql_query($sqlcch) or die(mysql_error());
		}
		if ($_REQUEST['sub']=="ma") {
			$sqlcm="UPDATE users SET phy='0', chem='0', bio='0', com='0', phy_s='0', chem_s='0', math_s='2', bio_s='0', com_s='0', up='0' WHERE ID='$uid'";
			mysql_query($sqlcm) or die(mysql_error());
		}
		if ($_REQUEST['sub']=="bi") {
			$sqlcb="UPDATE users SET phy='0', chem='0', math='0', com='0', phy_s='0', chem_s='0', math_s='0', bio_s='2', com_s='0', up='0' WHERE ID='$uid'";
			mysql_query($sqlcb) or die(mysql_error());
		}
		if ($_REQUEST['sub']=="co") {
			$sqlcco="UPDATE users SET phy='0', chem='0', math='0', bio='0', phy_s='0', chem_s='0', math_s='0', bio_s='0', com_s='2', up='0' WHERE ID='$uid'";
			mysql_query($sqlcco) or die(mysql_error());
		}
		header('Location:home.php');
	}
	if (isset($_REQUEST['upgradebtn'])) {
		$sqlup="UPDATE users SET phy_s='0', chem_s='0', math_s='0', bio_s='0', com_s='0', up='1' WHERE ID='$uid'";
		mysql_query($sqlup) or die(mysql_error());
		header('Location:home.php');
	}
	if (isset($_REQUEST['withdraw'])) {
		$sqlwd="UPDATE users SET phy_s='3', chem_s='3', math_s='3', bio_s='3', com_s='3', up='0' WHERE ID='$uid'";
		mysql_query($sqlwd) or die(mysql_error());
		header('Location:home.php');
	}

	$respay=mysql_query("SELECT pay, cse FROM online") or die(mysql_error());
	$rwspay=mysql_fetch_array($respay);
	$payon=$rwspay[0];
	$csecon=$rwspay[1];

 	$logor=mysql_query("SELECT logo_path FROM fend") or die(mysql_error());
 	$logorw=mysql_fetch_array($logor);
 	$prlogo=$logorw[0];


 
	if (!empty($_SESSION['id'])) {
 ?>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="homestyle.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="index.php"><img src="admin/<?php echo $prlogo; ?>" width="250" height="100"></a>
				</div>
				<div id="profile"><br/>
					<table align="right">
						<tr>
							<td><b>Hi, <i><?php echo $name; ?></i></b></td>
						</tr><tr><td><br/><br/><table align="right">
						<tr>
							<td>
								<form method="post">
									<input type="submit" name="logoutbtn" value="Logout">
								</form>
							</td>
						</tr></table></td></tr>
					</table>
				</div>
			</div>
			<div id="content"><br/>
				<div class="top" align="center">
				<?php
					if ($payst==0) {
						if (isset($_REQUEST['paybtn'])) {
							if ($_REQUEST['payoption']=="cheque") {
								
							$bname=$_REQUEST['bname'];
							$cno=$_REQUEST['cno'];
							$cdate=$_REQUEST['cdate'];
							if (!empty($bname) && !empty($cno) && !empty($cdate)) {
								$paysql="INSERT INTO payment VALUES ('$uid','$bname','$cno','$cdate')";
								mysql_query($paysql) or die(mysql_error());
								echo "<script>window.alert('Submit the Cheque in College Counter.')</script>";
							}
							else
								echo "<b style='color: red;'>Fill all fields.</b>";
							}
							if ($_REQUEST['payoption']=="cash") {
								$time=date("Y-m-d");
								mysql_query("INSERT INTO payment VALUES ('$uid', 'CASH','CASH','$time')") or die(mysql_error());
								echo "<script>window.alert('Submit Rs. 1000 in College Counter.')</script>";
							}
						}
						if ($payon==0) {
							require('payment.php');
						}
						else
							echo "<h2 style='color: red;'><br/><br/><br/><br/><br/><br/>Last date of payment is over.</h2>";	
					}
					else {
 						if ($csecon==0) {
 							require('seatcon.php');
 						}
 						else
 							echo "<h2 style='color: red; text-align: center;'><br/><br/><br/>Admission is not started.</h2>";
					}
 					if ($ph==0 && $ch==0 && $ma==0 && $bi==0 && $co==0 && $up==0 && $payst==1 && $csecon==0) {
 						echo "<h2 style='color: red; text-align: center;'><br/><br/><br/>You are not shortlisted for any course.</h2>";
 					}
 					if ($payst==1 && $up==1 && $csecon==0) {
 						echo "<h2 style='color: red; text-align: center;'><br/><br/><br/>You have chosen the upgrage option.</h2>";
 					}
 					if ($ph==3 && $ch==3 && $ma==3 && $bi==3 && $co==3 && $csecon==0) {
 						echo "<h2 style='color: red; text-align: center;'><br/><br/><br/>You have withdrawn your seat or did not confirm your seat.</h2>";
 					}
 					if (($ph==2 or $ch==2 or $ma==2 or $bi==2 or $co==2) && $csecon==0) {
 						echo "<h2 style='color: red; text-align: center;'><br/><br/><br/>You have confirmed your seat.</h2>";
 						echo "<form method='post'><table align='center'><tr><td><input type='submit' name='withdraw' value='Withdraw'></td></tr></table></form>";
 					}
 			 	 ?>
 			 	
 			 	</div>
			</div>
			<div id="rpanel">
				<table align="center">
					<tr><td><br/></td></tr>
					<tr>
						<td class="menu"><a href="home.php">Home</a></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td class="menu"><a href="profile.php">Profile</a></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td class="menu"><a href="seats.php">Seats</a></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
<?php }
	else
		header('Location:index.php');
 ?>