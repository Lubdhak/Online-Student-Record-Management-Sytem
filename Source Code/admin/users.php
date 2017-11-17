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
 	if (!empty($_SESSION['aid'])) {
 	?>
<html>
	<head>
		<title>All Students</title>
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
			<div class="userp">
				<form>
					<table align="center"><br/>
						<th><h2>All Students<hr/></th>
						<tr>
							<td>
								<table><th><b>Name</b><hr/></th> <th><b>Email</b><hr/></th> <th><b>Gender</b><hr/></th> <th><b>Dob</b><hr/></th> <th><b>Marks</b><hr/></th>
									<?php  
										$resultall=mysql_query("SELECT users_name, users_email, users_gender, users_dob, users_tmarks FROM users ORDER BY users_tmarks DESC") or die(mysql_error());
										while($rwsall=mysql_fetch_array($resultall)) {
											echo "<tr><td align='center'>$rwsall[0] &nbsp</td>
				  									<td align='center'>$rwsall[1] &nbsp</td>
				  									<td align='center'>$rwsall[2] &nbsp</td>
				  									<td align='center'>$rwsall[3] &nbsp</td>
				  									<td align='center'>$rwsall[4] &nbsp</td></tr>";
										}
 									?>
								</table>
							</td>
						</tr>
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