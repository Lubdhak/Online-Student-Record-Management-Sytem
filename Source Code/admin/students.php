<?php
	include('../include/config.php');
 ?>
<?php 
 	if (isset($_REQUEST['adlogoutbtn'])) {
 	session_destroy();
 	header('Location:index.php');
 	}	
 ?><?php 
 	if (!empty($_SESSION['aid'])) {
 	?>
<html>
	<head>
		<title>Students</title>
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
			<div class="tables">
				<table align="center">
					<br/>
					<th><h2>Shortlisted for physics</h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th> <th>Marks<hr/></th>
								<?php
									$sqlphy="SELECT users_name, users_email, users_tmarks, phy_s FROM users WHERE phy_s='1' ORDER BY users_tmarks DESC LIMIT 100";
									$resultphy=mysql_query($sqlphy) or die(mysql_error());
									
									while($rwsphy=mysql_fetch_array($resultphy)){
										echo "<tr><td align='center'><b>".$rwsphy[0]."</b></td>";
										echo "<td align='center'><b>".$rwsphy[1]."</b></td>";
										echo "<td align='center'><b>".$rwsphy[2]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="tableps">
				<table align="center">
					<br/>
					<th><h2>Shortlisted for Chemistry</h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th> <th>Marks<hr/></th>
								<?php
									$sqlchem="SELECT users_name, users_email, users_tmarks, chem_s FROM users WHERE chem_s='1' ORDER BY users_tmarks DESC LIMIT 100";
									$resultchem=mysql_query($sqlchem) or die(mysql_error());
									
									while($rwschem=mysql_fetch_array($resultchem)){
										echo "<tr><td align='center'><b>".$rwschem[0]."</b></td>";
										echo "<td align='center'><b>".$rwschem[1]."</b></td>";
										echo "<td align='center'><b>".$rwschem[2]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="tables">
				<table align="center">
					<br/>
					<th><h2>Shortlisted for Biology</h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th> <th>Marks<hr/></th>
								<?php
									$sqlbio="SELECT users_name, users_email, users_tmarks, bio_s FROM users WHERE bio_s='1' ORDER BY users_tmarks DESC LIMIT 100";
									$resultbio=mysql_query($sqlbio) or die(mysql_error());
									
									while($rwsbio=mysql_fetch_array($resultbio)){
										echo "<tr><td align='center'><b>".$rwsbio[0]."</b></td>";
										echo "<td align='center'><b>".$rwsbio[1]."</b></td>";
										echo "<td align='center'><b>".$rwsbio[2]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="tableps">
				<table align="center">
					<br/>
					<th><h2>Shortlisted for Math</h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th> <th>Marks<hr/></th>
								<?php
									$sqlmath="SELECT users_name, users_email, users_tmarks, math_s FROM users WHERE math_s='1' ORDER BY users_tmarks DESC LIMIT 100";
									$resultmath=mysql_query($sqlchem) or die(mysql_error());
									
									while($rwsmath=mysql_fetch_array($resultmath)){
										echo "<tr><td align='center'><b>".$rwsmath[0]."</b></td>";
										echo "<td align='center'><b>".$rwsmath[1]."</b></td>";
										echo "<td align='center'><b>".$rwsmath[2]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="tables">
				<table align="center">
					<br/>
					<th><h2>Shortlisted for Computer Sceince</h2></th>
					<tr>
						<td>
							<table>
								<tr><td>
								<table><th>Name<hr/></th> <th>Email<hr/></th> <th>Marks<hr/></th>
								<?php
									$sqlcom="SELECT users_name, users_email, users_tmarks, com_s FROM users WHERE com_s='1' ORDER BY users_tmarks DESC LIMIT 100";
									$resultcom=mysql_query($sqlcom) or die(mysql_error());
									
									while($rwscom=mysql_fetch_array($resultcom)){
										echo "<tr><td align='center'><b>".$rwscom[0]."</b></td>";
										echo "<td align='center'><b>".$rwscom[1]."</b></td>";
										echo "<td align='center'><b>".$rwscom[2]."</b></td></tr>";
									}
								 ?></table>
								 </td></tr> 
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