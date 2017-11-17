<?php 
	include('include/config.php');
 ?>
<?php  
	if (isset($_REQUEST['submitbtn'])) {
		if (!empty($_REQUEST['mathcheck'])) {
			$m=1;
		}
		else
			$m=0;
		if (!empty($_REQUEST['phycheck'])) {
			$p=1;
		}
		else
			$p=0;
		if (!empty($_REQUEST['chemcheck'])) {
			$ch=1;
		}
		else
			$ch=0;
		if (!empty($_REQUEST['biocheck'])) {
			$b=1;
		}
		else
			$b=0;
		if (!empty($_REQUEST['comcheck'])) {
			$co=1;
		}
		else
			$co=0;
	}
?>
<?php
	$err=""; 
	if (isset($_REQUEST['submitbtn'])) {
		$akey=$_REQUEST['key'];
		$tmarks=$_REQUEST['ben'] + $_REQUEST['eng'] + $_REQUEST['math'] + $_REQUEST['phy'] + $_REQUEST['chem'] + $_REQUEST['bocs'] ;
		$sql="SELECT * FROM temp_users WHERE users_key='$akey'";
		$result=mysql_query($sql) or die(mysql_error());
		$rws=mysql_fetch_array($result);
		if ($rws[6]==$akey) {
			$name=$rws[1];
			$email=$rws[2];
			$pwd=$rws[3];
			$gender=$rws[4];
			$dob=$rws[5];
			if (!empty($_REQUEST['ben']) && !empty($_REQUEST['eng']) && !empty($_REQUEST['math']) && !empty($_REQUEST['phy']) && !empty($_REQUEST['chem']) && !empty($_REQUEST['bocs'])) {
				if (!empty($_REQUEST['mathcheck']) or !empty($_REQUEST['phycheck']) or !empty($_REQUEST['chemcheck']) or !empty($_REQUEST['biocheck']) or !empty($_REQUEST['comcheck'])) {
					
						$sqlin="INSERT INTO users VALUES (NULL, '$name', '$email', '$pwd', '$gender', '$dob', '$tmarks','$p','$ch','$m','$b','$co','0','0','0','0','0','0','0')";
						mysql_query($sqlin) or die(mysql_error());

						$sqldel="DELETE FROM temp_users WHERE users_key='$akey'";
						mysql_query($sqldel) or die(mysql_error());
						echo "<script>window.alert('You have sucessfully complited your registration.')</script>";
				}
			}
		}
		else
			$err="Wrong Authentication key!";

	}
 ?>
<?php
$benerr = $engerr = $pherr = $cherr = $merr = $bocserr = "";
if (!empty($_POST["submitbtn"])) {
  if (empty($_POST["ben"])) {
    $benerr = "Field can't be blank.";
  }

  if (empty($_POST["eng"])) {
    $engerr = "Field can't be blank.";
  }

  if (empty($_POST["math"])) {
    $merr = "Field can't be blank.";
  }

  if (empty($_POST["phy"])) {
    $pherr = "Field can't be blank.";
  }

  if (empty($_POST["chem"])) {
    $cherr = "Field can't be blank.";
  }

  if (empty($_POST["bocs"])) {
    	$bocserr = "Field can't be blank.";
   }
}
 ?>
<?php 
	$checkerr="";
	if (isset($_REQUEST['submitbtn'])) {
		if (empty($_REQUEST['mathcheck']) && empty($_REQUEST['phycheck']) && empty($_REQUEST['chemcheck']) && empty($_REQUEST['biocheck']) && empty($_REQUEST['comcheck']))
			$checkerr="* Select at least one.";
	}
 ?>
 <?php  
 	$logor=mysql_query("SELECT logo_path FROM fend") or die(mysql_error());
 	$logorw=mysql_fetch_array($logor);
 	$prlogo=$logorw[0];
 ?>
<html>
	<head>
		<title>Confirm Page</title>
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
				<form method="post">
					<table align="center">
						<th><h2>Last registration page<hr/></h2></th>
						<tr>
							<td>
								<table>
									<tr>
										<td>Authentication key</td>
										<td><input type="text" name="key"> <span class="error">*<?php echo $err; ?></span></td>
									</tr>
								</table><br/><br/>
						<tr>
							<td>
								<table align="center">
									<th><h3>Marks<hr style="border: 1px dotted black;" /></h3></th>
									<tr>
									<td>
									<table>
									<tr>
										<td>Bengali</td>
										<td><input type="text" name="ben" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['ben'])){
																				 ?>
																				value="<?php echo $_REQUEST['ben'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $benerr ?></td>
									</tr>
									<tr>
										<td>English</td>
										<td><input type="text" name="eng" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['eng'])){
																				 ?>
																				value="<?php echo $_REQUEST['eng'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $engerr ?></td>
									</tr>
									<tr>
										<td>Math</td>
										<td><input type="text" name="math" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['math'])){
																				 ?>
																				value="<?php echo $_REQUEST['math'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $merr ?></td>
									</tr>
									<tr>
										<td>Physics</td>
										<td><input type="text" name="phy" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['phy'])){
																				 ?>
																				value="<?php echo $_REQUEST['phy'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $pherr ?></td>
									</tr>
									<tr>
										<td>Chemistry</td>
										<td><input type="text" name="chem" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['chem'])){
																				 ?>
																				value="<?php echo $_REQUEST['chem'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $cherr ?></td>
									</tr>
									<tr>
										<td><select>
												<option>Biology</option>
												<option>Computer Science</option>
											</select></td>
										<td><input type="text" name="bocs" <?php 
																				if (!empty($_REQUEST['submitbtn']) && !empty($_POST['bocs'])){
																				 ?>
																				value="<?php echo $_REQUEST['bocs'];?>"
																				<?php
																					}
																				 ?>
																				/> <span class="error">*<?php echo $bocserr ?></td>
										
									</tr>
									<tr>
										<td>Want to apply for</td>
										<td><input type="checkbox" name="mathcheck" value="math">Math <input type="checkbox" name="phycheck" value="phy">Physics <input type="checkbox" name="chemcheck" value="chem">Chemistry <br/><input type="checkbox" name="biocheck" value="bio">Biology <input type="checkbox" name="comcheck" value="com">Computer Science <span class="error"><?php echo $checkerr ?></td>
									</tr>
									</table><br/>
									<tr>
										<td align="center"><input type="submit" name="submitbtn" value="Submit"></td>
									</tr>
									</td>
									</tr>
								</table>
							</td>
						</tr>
								</table>
							</td>
						</tr>
					</table>
				</form>
			</div><!--content end-->
			<div id="footer"><!--footer start-->
				<div align="center">
					<h4><?php 
								$re=mysql_query("SELECT footer FROM fend") or die(mysql_error());
								$rw=mysql_fetch_array($re);
								echo $rw[0]; 
							?></h4>
				</div>
			</div><!--footer end-->
		</div><!--wrapper end-->
	</body>
</html>