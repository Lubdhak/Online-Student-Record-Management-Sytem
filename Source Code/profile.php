<?php
	include('include/config.php');
 ?>
 <?php 
 	$uid= $_SESSION['id'];
	$sql="SELECT ID, users_name, users_email, users_gender, users_dob, users_tmarks FROM users WHERE ID='$uid'";
	$result=mysql_query($sql) or die(mysql_error());
	$rws=mysql_fetch_array($result);
		$name=$rws[1];
		$email=$rws[2];
		$gender=$rws[3];
		$dob=$rws[4];
		$tmarks=$rws[5];
	if (isset($_REQUEST['updatebtn'])) {
		$uname=$_REQUEST['uname'];
		$usql="UPDATE users SET users_name='$uname' WHERE ID='$uid'";
		mysql_query($usql) or die(mysql_error());
		$sql1="SELECT ID, users_name, users_email, users_gender, users_dob, users_tmarks FROM users WHERE ID='$uid'";
		$result1=mysql_query($sql1) or die(mysql_error());
		$rws1=mysql_fetch_array($result1);
		$name=$rws1[1];
		$email=$rws1[2];
		$gender=$rws1[3];
		$dob=$rws1[4];
		$tmarks=$rws1[5];
	}

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
		<title><?php echo $name; ?>'s Profile</title>
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
				<form method="post">
					<table align="center"><br/>
						<th><h2><?php echo $name; ?>'s Profile<hr/></h2></th>
						<tr>
						<td>
						<table>
						<tr><td><br/></td></tr>
						<tr>
							<td><b>Name</b></td>
							<td><input type="text" name="uname" value="<?php echo $name; ?>"></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td><b>Email</b></td>
							<td><input type="email" name="uemail" value="<?php echo $email; ?>" disabled></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td><b>Gender</b></td>
							<td><input type="text" name="ugender" value="<?php echo $gender; ?>" disabled></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td><b>DOB</b></td>
							<td><input type="date" name="udate" value="<?php echo $dob; ?>" disabled></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td><b>Total Marks</b></td>
							<td><input type="text" name="tmarks" value="<?php echo $tmarks; ?>" disabled></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td></td>
							<td><input type="submit" name="updatebtn" value="update profile"></td>
						</tr>
					</table></td></tr></table>
				</form>
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