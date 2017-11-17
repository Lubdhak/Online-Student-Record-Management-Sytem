<?php
	include('../include/config.php');
 ?>
<?php 
 	if (isset($_REQUEST['adlogoutbtn'])) {
 	session_destroy();
 	header('Location:index.php');
 	}	
 ?>
 <?php
 	$resultpc=mysql_query("SELECT phy_s FROM users WHERE phy_s='2'") or die(mysql_error());
 	$rowpc=mysql_num_rows($resultpc);
 	$restpc=(100-$rowpc);

 	$resultchc=mysql_query("SELECT chem_s FROM users WHERE chem_s='2'") or die(mysql_error());
 	$rowchc=mysql_num_rows($resultchc);
 	$restchc=(100-$rowchc);

 	$resultmc=mysql_query("SELECT math_s FROM users WHERE math_s='2'") or die(mysql_error());
 	$rowmc=mysql_num_rows($resultmc);
 	$restmc=(100-$rowmc);

 	$resultbc=mysql_query("SELECT bio_s FROM users WHERE bio_s='2'") or die(mysql_error());
 	$rowbc=mysql_num_rows($resultbc);
 	$restbc=(100-$rowbc);

 	$resultcoc=mysql_query("SELECT com_s FROM users WHERE com_s='2'") or die(mysql_error());
 	$rowcoc=mysql_num_rows($resultcoc);
 	$restcoc=(100-$rowcoc);

 	if (isset($_REQUEST['confirmbtn'])) {

 		mysql_query("UPDATE online SET pre='1'") or die(mysql_error());

 		$sqlcp="UPDATE users SET phy_s='1', up='0' WHERE pay_st='1' AND phy_s='0' AND phy='1' ORDER BY users_tmarks DESC LIMIT $restpc";
 		mysql_query($sqlcp) or die(mysql_error());

 		$sqlcch="UPDATE users SET chem_s='1', up='0' WHERE pay_st='1' AND chem_s='0' AND chem='1' ORDER BY users_tmarks DESC LIMIT $restchc";
 		mysql_query($sqlcch) or die(mysql_error());

 		$sqlcm="UPDATE users SET math_s='1', up='0' WHERE pay_st='1' AND math_s='0' AND math='1' ORDER BY users_tmarks DESC LIMIT $restmc";
 		mysql_query($sqlcm) or die(mysql_error());

 		$sqlcb="UPDATE users SET bio_s='1', up='0' WHERE pay_st='1' AND bio_s='0' AND bio='1' ORDER BY users_tmarks DESC LIMIT $restbc";
 		mysql_query($sqlcb) or die(mysql_error());

 		$sqlcco="UPDATE users SET com_s='1', up='0' WHERE pay_st='1' AND com_s='0' AND com='1' ORDER BY users_tmarks DESC LIMIT $restcoc";
 		mysql_query($sqlcco) or die(mysql_error());
 	}
 	$resultad=mysql_query("SELECT pay, cse, pre FROM online") or die(mysql_error());
 	$rwsad=mysql_fetch_array($resultad);
 	$dpay=$rwsad[0];
 	$cse=$rwsad[1];
 	$pre=$rwsad[2];

 	$resu=mysql_query("SELECT signup FROM online") or die(mysql_error());
 	$rwsu=mysql_fetch_array($resu);
 	$dr=$rwsu[0];
 ?>
<?php 
	if (isset($_REQUEST['astart'])) {
		mysql_query("UPDATE online SET cse='0'") or die(mysql_error());
		header('Location:process.php');
	}
	if (isset($_REQUEST['aend'])) {
		mysql_query("UPDATE online SET cse='1'") or die(mysql_error());
		mysql_query("UPDATE online SET pre='0'") or die(mysql_error());
		mysql_query("UPDATE users SET phy_s='3', chem_s='3', math_s='3', bio_s='3', com_s='3', up='0' WHERE phy_s='1' or chem_s='1' or math_s='1' or bio_s='1' or com_s='1'") or die(mysql_error());
		header('Location:process.php');
	}
	if (isset($_REQUEST['dpay'])) {
		mysql_query("UPDATE online SET pay='1'") or die(mysql_error());
		header('Location:process.php');
	}
	if (isset($_REQUEST['cpay'])) {
		mysql_query("UPDATE online SET pay='0'") or die(mysql_error());
		header('Location:process.php');
	}
	if (isset($_REQUEST['esup'])) {
		mysql_query("UPDATE online SET signup='0'") or die(mysql_error());
		header('Location:process.php');
	}
	if (isset($_REQUEST['dsup'])) {
		mysql_query("UPDATE online SET signup='1'") or die(mysql_error());
		header('Location:process.php');
	}
 ?>
 <?php 
 	if (!empty($_SESSION['aid'])) {
 	?>
<html>
	<head>
		<title>Process Page</title>
		<link rel="stylesheet" type="text/css" href="homestyle.css">
	</head>
	<body>
	<div id="adwrapper">
		<div id="adheader">
			<div align="right">
				<b>Hi, Admin</b><br/>
				<form method="post">
					<input type="submit" name="adlogoutbtn" value="Logout">
				</form>
			</div>
		</div>
		<div id="adlpanel"><br/>
			<ul>
			<table align="center">
  				<tr><td><li class="menu"><a href="home.php">Home</a></li></td></tr>
  				<tr><td><br/><li class="menu"><a href="process.php">Process</a></li></td></tr>
  				<tr><td><br/><li class="dropdown">
    				<a href="students.php" class="dropbtn" style="font-size: 35px; border: outset;">Students</a>
    				<div class="dropdown-content">
      					<a href="users.php" style="font-size: 20px;">All Students</a>
      					<a href="confirmed.php" style="font-size: 20px;">Confirmed Students</a>
    				</div>
  				</li></td></tr>
  				<tr><td><br/><li class="menu"><a href="seting.php">Setings</a></li></td></tr>
  				</table>
			</ul>
		</div>
		<div id="adcontent">
		<div class="table">
			<form method="post" action="">
				<table align="center">
					<tr>
						<td><?php if ($pre==0)
								echo "<input type='submit' name='confirmbtn' value='Publish Result' class='publish'>";
								else
									echo "<h2 style='color: red;'>Result Published</h2>"; ?></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="tabler">
			<form method="post" action="">
				<table align="center">
					<tr>
						<td><input type="submit" name="astart" value="Start Admission " class="publishas" <?php 
						if ($cse==0) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td><input type="submit" name="aend" value="End Admission " class="publishas" <?php 
						if ($cse==1) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td><input type="submit" name="dpay" value="Disable Payment" class="publishas" <?php 
						if ($dpay==1) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td><input type="submit" name="cpay" value="Enable Payment" class="publishas" <?php 
						if ($dpay==0) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="table">
			<form method="post" action="">
				<table align="center">
					<tr>
						<td><input type="submit" name="esup" value="Enable Registration" class="publishar" <?php 
						if ($dr==0) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td><input type="submit" name="dsup" value="Disable Registration" class="publishar" <?php 
						if ($dr==1) {
						 	echo "hidden";
						 } ?>></td>
					</tr>
				</table>
			</form>
		</div>
		<div>
		<div class="tablerr">
			<form method="post" action="">
				<table align="center">
					<th><h2>Payment Details<hr/></h2></th>
					<tr>
						<td>
							<table><th><b></b><th><b>Email<hr/></b></th> <th><b>Bank Name<hr/></b></th> <th><b>Check No<hr/></b></th> <th><b>Date<hr/></b></th> <th><b>Status<hr/></b></th>
								<?php  
									$repayment=mysql_query("SELECT ID, users_email, pay_st FROM users") or die(mysql_error());
									while($rwpayment=mysql_fetch_array($repayment)){
									$re1payment=mysql_query("SELECT ID, bname, cno, cdate FROM payment WHERE ID='$rwpayment[0]'") or die(mysql_error());
									while ($rw1payment=mysql_fetch_array($re1payment)) {
										echo "<tr><td><input type='checkbox' name='ch[]' value='$rwpayment[0]'></td>
												<td align='center'>".$rwpayment[1]."</td>
												<td align='center'>".$rw1payment[1]."</td>
												<td align='center'>".$rw1payment[2]."</td>
												<td align='center'>".$rw1payment[3]."</td>
											    <td align='center'>";if($rwpayment[2]==1)
														echo "Approved"."</td></tr>";
													else
														echo "Unapproved"."</td></tr>";
									}}  
 											if (!empty($_REQUEST['dispay'])) {
 											$char = $_REQUEST['ch'];
 											$i=0;
 											foreach ($char as $key) {
 											mysql_query("UPDATE users SET pay_st='0' WHERE ID='$key'") or die(mysql_error());
 											$i++;
 											}
 										header('Location:process.php');
 									}
 									if (!empty($_REQUEST['apay'])) {
 											$chara = $_REQUEST['ch'];
 											$ii=0;
 											foreach ($chara as $keya) {
 											mysql_query("UPDATE users SET pay_st='1' WHERE ID='$keya'") or die(mysql_error());
 											$ii++;
 										}
 									header('Location:process.php');
 									}
 								 ?>
								<tr><td><br/></td></tr>
								<table align="center"><tr><td class="tablerrr"><input type="submit" name="apay" value="Approve Payment"></td><td> &nbsp</td>
															<td class="tablerrr"><input type="submit" name="dispay" value="Unapprove Payment"></td></tr></table>
							</table>
						</td>
					</tr>
				</table>
			</form>
		</div>
		</div>
		</div>
	</div>
	</body>
</html>
<?php } 
 	else
 		header('Location:index.php');
 ?>