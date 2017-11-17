<?php 
	require('../include/config.php');
?>
<?php  
	$err ="";
	if (!empty($_POST['loginbtn'])) {
		$username= $_POST['aname'];
		$userpwd= $_POST['apwd'];
		$sql= "SELECT * FROM admin WHERE users_email='$username' AND users_pwd='$userpwd'";
		$result= mysql_query($sql) or die(mysql_error());
		$rws= mysql_fetch_array($result);
		if ($rws[1]=$username && $rws[2]==$userpwd) {
			$_SESSION['aid']=$rws[0];
			header('Location:home.php');
		}
		else{
			$err= "Wrong User Name and Password.";
			$_SESSION['aid']='';
		}
	} 
 ?>
 <?php 
 	if (empty($_SESSION['aid'])) {
 	?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="wrapper"><!--wrapper start-->
			<div id="ipage" align="center"><!--content start-->
				<div id="logo" align="center">
						<img src="image/logo.jpg" width="300" height="100" />
				</div>
				<div id="lform" align="center"><br/>
					<h1 align="center">Login to Enter</h1><hr/><br/>
					<form method="post" action="">
						<table>
							<tr>
								<td>
									<input type="text" name="aname" placeholder="username">
								</td>
							</tr>
							<tr>
								<td><br/></td>
							</tr>
							<tr>
								<td>
									<input type="password" name="apwd" placeholder="password">
								</td>
							</tr>
							<tr>
								<td><br/></td>
							</tr>
							<tr>
								<td align="center">
									<input type="submit" name="loginbtn" value="Login">
								</td>
							</tr>
							<tr>
								<td><?php echo $err ; ?></td>
							</tr>
						</table>
					</form>	
				</div>
			</div><!--content end-->
		</div><!--wrapper end-->
	</body>
</html>

 <?php } 
 	else
 		header('Location:home.php');
 ?>