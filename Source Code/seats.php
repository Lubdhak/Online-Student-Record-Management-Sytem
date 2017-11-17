<?php
	include('include/config.php');
 ?>
 <?php 
 	$uid= $_SESSION['id'];
	$sql="SELECT ID, users_name FROM users WHERE ID='$uid'";
	$result=mysql_query($sql) or die(mysql_error());
	$rws=mysql_fetch_array($result);
		$name=$rws[1];
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

 	$logor=mysql_query("SELECT logo_path FROM fend") or die(mysql_error());
 	$logorw=mysql_fetch_array($logor);
 	$prlogo=$logorw[0];
 ?>
 <?php 
 	if (isset($_REQUEST['logoutbtn'])) {
 		session_destroy();
 		header('Location:index.php');
 	}
 ?>
<?php 
	if (!empty($_SESSION['id'])) {
 ?>
<html>
	<head>
		<title>Seats</title>
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
			<div id="content">
				<table align="center"><br/>
					<th><h2>Seats Availablity<hr/></h2></th>
					<tr>
						<td>
							<table>
								<th><h3>Physics</h3></th>
								<tr>
									<td>
										<table>
											<tr>
												<td>Total Seats</td>
												<td><input type="text" value="100"></td>
												<td>Available Seats</td>
												<td><input type="text" value="<?php echo 100-$rwsp; ?>"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<th><h3>Chemistry</h3></th>
								<tr>
									<td>
										<table>
											<tr>
												<td>Total Seats</td>
												<td><input type="text" value="100"></td>
												<td>Available Seats</td>
												<td><input type="text" value="<?php echo 100-$rwsch; ?>"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<th><h3>Math</h3></th>
								<tr>
									<td>
										<table>
											<tr>
												<td>Total Seats</td>
												<td><input type="text" value="100"></td>
												<td>Available Seats</td>
												<td><input type="text" value="<?php echo 100-$rwsm; ?>"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<th><h3>Biology</h3></th>
								<tr>
									<td>
										<table>
											<tr>
												<td>Total Seats</td>
												<td><input type="text" value="100"></td>
												<td>Available Seats</td>
												<td><input type="text" value="<?php echo 100-$rwsb; ?>"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<th><h3>Computer Science</h3></th>
								<tr>
									<td>
										<table>
											<tr>
												<td>Total Seats</td>
												<td><input type="text" value="100"></td>
												<td>Available Seats</td>
												<td><input type="text" value="<?php echo 100-$rwsco; ?>"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
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