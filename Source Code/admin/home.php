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
 	$sqlp="SELECT phy_s FROM users WHERE phy_s='2'";
 	$resultp=mysql_query($sqlp) or die(mysql_error());
 	$rwsp=mysql_num_rows($resultp);
 	
 	$sqlch="SELECT chem_s FROM users WHERE chem_s='2'";
 	$resultch=mysql_query($sqlch) or die(mysql_error());
 	$rwsch=mysql_num_rows($resultch);

 	$sqlm="SELECT math_s FROM users WHERE math_s='2'";
 	$resultm=mysql_query($sqlm) or die(mysql_error());
 	$rwsm=mysql_num_rows($resultm);

 	$sqlb="SELECT bio_s FROM users WHERE bio_s='2'";
 	$resultb=mysql_query($sqlb) or die(mysql_error());
 	$rwsb=mysql_num_rows($resultb);

 	$sqlco="SELECT com_s FROM users WHERE com_s='2'";
 	$resultco=mysql_query($sqlco) or die(mysql_error());
 	$rwsco=mysql_num_rows($resultco);
 ?>
<?php 
	$sqlpd="SELECT users_name, users_email, pay_st FROM users WHERE pay_st='0'";
	$resultpd=mysql_query($sqlpd) or die(mysql_error());
	$rowno=mysql_num_rows($resultpd);
 ?>
<?php 
	$resultpa=mysql_query("SELECT phy FROM users WHERE phy='1' AND pay_st='1'") or die(mysql_error());
	$pano=mysql_num_rows($resultpa);

	$resultcha=mysql_query("SELECT chem FROM users WHERE chem='1' AND pay_st='1'") or die(mysql_error());
	$chano=mysql_num_rows($resultcha);

	$resultma=mysql_query("SELECT math FROM users WHERE math='1' AND pay_st='1'") or die(mysql_error());
	$mano=mysql_num_rows($resultma);

	$resultba=mysql_query("SELECT bio FROM users WHERE bio='1' AND pay_st='1'") or die(mysql_error());
	$bano=mysql_num_rows($resultba);

	$resultcoa=mysql_query("SELECT com FROM users WHERE com='1' AND pay_st='1'") or die(mysql_error());
	$coano=mysql_num_rows($resultcoa);
 ?>
<?php 
 	if (!empty($_SESSION['aid'])) {
 	?>
<html>
	<head>
		<title>Admin Home Page</title>
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
				<table align="center">
					<br/>
					<th><h2>Vacant Seats<hr/></h2></th>
					<tr>
						<td>
							<table>
								<tr>
									<td><h3>Math:</h3></td>
									<td><h4><?php echo 100-$rwsm ?></h4></td>
								</tr>
								<tr>
									<td><h3>Physics:</h3></td>
									<td><h4><?php echo 100-$rwsp ?></h4></td>
								</tr>
								<tr>
									<td><h3>Chemistry:</h3></td>
									<td><h4><?php echo 100-$rwsch ?></h4></td>
								</tr>
								<tr>
									<td><h3>Biology:</h3></td>
									<td><h4><?php echo 100-$rwsb ?></h4></td>
								</tr>
								<tr>
									<td><h3>Computer Science: </h3></td>
									<td><h4><?php echo 100-$rwsco ?></h4></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="tablep">
				<table align="center">
					<br/>
					<th><h2>Payment Due <span style="color: blue;"><?php echo "&nbsp&nbsp".$rowno."&nbsp&nbsp" ?></span></h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th>
								<?php
									while($rwspd=mysql_fetch_array($resultpd)) {
										echo "<tr><td align='center'><b>".$rwspd[0]."</b></td>";
										echo "<td align='center'><b>".$rwspd[1]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="table">
				<table align="center">
					<br/>
					<th><h2>Applied Students<hr/></h2></th>
					<tr>
						<td>
							<table>
								<tr>
									<td><h3>Math:</h3></td>
									<td><h4><?php echo $mano ?></h4></td>
								</tr>
								<tr>
									<td><h3>Physics:</h3></td>
									<td><h4><?php echo $pano ?></h4></td>
								</tr>
								<tr>
									<td><h3>Chemistry:</h3></td>
									<td><h4><?php echo $chano ?></h4></td>
								</tr>
								<tr>
									<td><h3>Biology:</h3></td>
									<td><h4><?php echo $bano ?></h4></td>
								</tr>
								<tr>
									<td><h3>Computer Science: </h3></td>
									<td><h4><?php echo $coano ?></h4></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</body>
</html>
<?php } 
 	else
 		header('Location:index.php');
?>