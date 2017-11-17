<?php 
	include('include/config.php');
 ?>
 <?php  
 	$logor=mysql_query("SELECT logo_path FROM fend") or die(mysql_error());
 	$logorw=mysql_fetch_array($logor);
 	$prlogo=$logorw[0];
 ?>
<html>
	<head>
		<title>Authentication key</title>
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
				<br/><br/>
				<div>
					<h2 align="center">You have successfully done your 1st part of registration.</h2>
					<h2 align="center">Copy the authentication key and click on go button to do the last part of registration.</h2><br/><br/>
					<div align="center">
						<b style="color: blue; font-size:30px;">Authentication key: </b><input type="text" name="akey" value="<?php if (!empty($_SESSION['key']))
																																		echo $_SESSION['key'];
																																	else
																																		echo ""; ?>"><br/><br/>
						<a href="confirm.php"><input type="submit" value="Go" style="width: 100px; height:30px; "></a>
					</div>
				</div>
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