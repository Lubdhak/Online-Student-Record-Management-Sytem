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
	if (isset($_REQUEST['upbtn'])) {
		$img_path="image/".$_FILES['fileup']['name'];
		move_uploaded_file($_FILES['fileup']['tmp_name'], $img_path);
		mysql_query("UPDATE fend SET logo_path='$img_path'") or die(mysql_error());
	}
	
?>

<?php
	$refoo=mysql_query("SELECT footer FROM fend") or die(mysql_error());
	$rwfoo=mysql_fetch_array($refoo);
	$afoo=$rwfoo[0];  
	if (isset($_REQUEST['savebtn'])) {
		$foo=$_REQUEST['farea'];
		mysql_query("UPDATE fend SET footer='$foo'") or die(mysql_error());
		$refoo=mysql_query("SELECT footer FROM fend") or die(mysql_error());
		$rwfoo=mysql_fetch_array($refoo);
		$afoo=$rwfoo[0];
	}
?>
<?php 
 	if (!empty($_SESSION['aid'])) {
 	?>
<html>
	<head>
		<title>Setings Page</title>
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
		<div class="users">
			<form method="post" enctype="multipart/form-data">
				<table align="center">
					<tr><td><br/><br/></td></tr>
					<tr><td><br/><br/></td></tr>
					<tr>
						<td><b>Logo(200 x 100): &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</b></td>
						<td><input type="file" name="fileup"></td>
						<td><input type="submit" name="upbtn" value="upload"></td>
					</tr>
					</form>
					<form method="post">
					<tr><td><br/><br/></td></tr>
					<tr>
						<td><b>Footer: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</b></td>
						<td><input type="text" name="farea" value="<?php echo $afoo; ?>" /></td>
					</tr>
					<tr><td><br/><br/></td></tr>
					<table align="center">
						<tr>
							<td><input type="submit" name="savebtn" value="Save"></td>
						</tr>
					</table>
				</table>
			</form>
		</div>
		</div>
	</div>
	</body>
</html>
<?php } 
 	else
 		header('Location:index.php');
 ?>