<?php 
	include('include/config.php');
 ?>
 <?php  
 	$logor=mysql_query("SELECT logo_path FROM fend") or die(mysql_error());
 	$logorw=mysql_fetch_array($logor);
 	$prlogo=$logorw[0];
 ?>
 <?php
$nameerr = $emailerr = $passworderr = $gendererr = $doberr = "";
if (!empty($_POST["registerbtn"])) {
  if (empty($_POST["name"])) {
    $nameerr = "Name is required";
  }

  if (empty($_POST["remail"])) {
    $emailerr = "Email is required";
  }

  if (empty($_POST["rpwd"])) {
    $passworderr = "Password is required";
  }

  if (empty($_POST["gender"])) {
    $gendererr = "Gender is required";
  }

  if (empty($_POST["bdate"])) {
    $doberr = "Date is required";
  }
}
?>
<?php 
	$dupemail="";
 	if (!empty($_REQUEST['registerbtn'])) {
 		$name=$_REQUEST['name'];
 		$remail=$_REQUEST['remail'];
 		$rpwd=md5($_REQUEST['rpwd']);
 		$gender=$_REQUEST['gender'];
 		$bdate=$_REQUEST['bdate'];
 		$emailsql="SELECT users_email FROM users WHERE users_email='$remail'";
 		$emailresult=mysql_query($emailsql) or die(mysql_error());
 		$emailrws=mysql_fetch_array($emailresult);
 		$demail=$emailrws[0];
 		if ($remail==$demail) {
 			$dupemail="Email already registered.";
 		}
 		if (!empty($remail) && $remail!=$demail) {
 		$key=md5($remail.rand(1,1000));
 		$_SESSION['key']=$key;
 		}
 		if (!empty($name) && !empty($remail) && !empty($_REQUEST['rpwd']) && !empty($gender) && !empty($bdate) && $remail!=$demail) {
 			$regsql="INSERT INTO temp_users VALUES (NULL,'$name','$remail','$rpwd','$gender','$bdate','$key')";
 			mysql_query($regsql) or die(mysql_error());
 			header('Location:akey.php');
 		}
 	}
 ?>
<?php
	$err =""; 
	if (!empty($_POST['loginbtn'])) {
	 	$lemail=$_POST['lemail'];
	 	$lpwd=md5($_POST['lpwd']);
	 	$logsql="SELECT ID, users_email, users_pwd FROM users WHERE users_email='$lemail' AND users_pwd='$lpwd'";
	 	$lresult=mysql_query($logsql) or die(mysql_error());
	 	$lrws=mysql_fetch_array($lresult);
	 	if ($lrws[1]==$lemail && $lrws[2]==$lpwd) {
	 		$_SESSION['id']=$lrws[0];
	 		header('Location:home.php');
	 	}
	 	else {
	 		$err="Wrong Email or Password!";
	 	}
	 } 
 ?>
<?php 
	$ressign=mysql_query("SELECT signup FROM online") or die(mysql_error());
	$rwssign=mysql_fetch_array($ressign);
	$sign=$rwssign[0];
 ?>
<?php
	if (empty($_SESSION['id'])) {
 ?>
<html>
	<head>
		<title>Online Students Registrtion</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="wrapper"><!--wrapper start-->
			<div id="header"><!--header start-->
				<div class="logo">
					<a href="index.php"><img src="admin/<?php echo $prlogo; ?>" width="250" height="100"></a>
				</div>
			</div><!--header end-->
			<div id="content"><!--content start-->
				<div id="rform"><!--rform start-->
				<br/>
				<?php 
					 if ($sign==0) {
					 ?>
					<form method="post" action="">
						<table align="center">
							<th><h2>Registration Form<hr/></h2></th>
							<tr>
								<td>
									<table>

										<tr>
											<td><b>Name<span style="color: red;">*</span></b></td>
											<td><input type="text" name="name" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['name'])){
																				 ?>
																				value="<?php echo $_REQUEST['name'];?>"
																				<?php
																					}
																				 ?>
																				/>
																				<span style="color: red;"> <?php echo $nameerr;?></span><br/></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Email<span style="color: red;">*</span></b></td>
											<td><input type="email" name="remail" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['remail'])){
																				 ?>
																				value="<?php echo $_REQUEST['remail'];?>"
																				<?php
																					}
																				 ?>
																				/>
																				<span style="color: red;"> <?php echo $emailerr; if (!empty($remail))
																				echo $dupemail; ?></span><br/></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Password<span style="color: red;">*</span></b></td>
											<td><input type="password" name="rpwd" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['rpwd'])){
																				 ?>
																				value="<?php echo $_REQUEST['rpwd'];?>"
																				<?php
																					}
																				 ?>
																				/>
																				<span style="color: red;"> <?php echo $passworderr;?></span><br/></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Gender<span style="color: red;">*</span></b></td>
											<td><input type="radio" name="gender" value="male" checked="checked" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['gender'])){
																				 ?>
																				value="<?php echo $_REQUEST['gender'];?>"
																				<?php
																					}
																				 ?>
																				/>Male<input type="radio" name="gender" value="female" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['gender'])){
																				 ?>
																				value="<?php echo $_REQUEST['gender'];?>"
																				<?php
																					}
																				 ?>
																				/>Female <span style="color: red;"> <?php echo $gendererr;?></span><br/></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Date of Birth<span style="color: red;">*</span></b></td>
											<td><input type="date" name="bdate" <?php 
																					if (!empty($_REQUEST['registerbtn']) && !empty($_POST['bdate'])){
																				 ?>
																				value="<?php echo $_REQUEST['bdate'];?>"
																				<?php
																					}
																				 ?>
																				/>
																				<span style="color: red;"> <?php echo $doberr; ?></span><br/></td>
										</tr><tr><td><br/></td></tr>
										<table align="center">
											<tr>
												<td><input type="submit" name="registerbtn" value="Register"></td>
											</tr>
										</table>
									</table>
								</td>
							</tr>
						</table>
					</form>
					<?php }
						else
							echo "<h2 style='color: red;' align='center'>Registration is over</h2>"; ?>
				</div><!--rform end-->
				<div id="lform"><!--lform start-->
				<br/>
					<form method="post" action="">
						<table align="center">
							<th><h2>Login Form<hr/></h2></th>
							<tr>
								<td>
									<table>
										<tr>
											<td><b>Email</b></td>
											<td><input type="email" name="lemail"></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Password</b></td>
											<td><input type="password" name="lpwd"></td>
										</tr><tr><td><br/></td></tr>
										<table align="center">
											<tr>
												<td><input type="submit" name="loginbtn" value="Login"></td>
											</tr>
										</table>
										<tr>
												<td align="center" style="color: red; font-weight: bold;"><?php echo $err; ?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</form>
				</div><!--lform end-->
			</div><!--content end-->
			<div id="footer"><!--footer start-->
				<div align="center">
					<h4><?php 
								$re=mysql_query("SELECT footer FROM fend") or die(mysql_error());
								$rw=mysql_fetch_array($re);
								echo $rw[0]; 
							?>
					</h4>
				</div>
			</div><!--footer end-->
		</div><!--wrapper end-->
	</body>
</html>
<?php
	}
	else
		header('Location:home.php');
 ?>