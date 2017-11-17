<form method="post">
	<table align="center"><br/>
		<th><?php 
 				if ($ph==1 or $ch==1 or $ma==1 or $bi==1 or $co==1) {
					echo "<h2 align='center'>You are shortlisted for</h2><hr/>";
				 ?></th>
		<tr>
			<td align="center"><?php if ($ph==1) {
						echo "<input type='radio' name='sub' value='ph' /><b>Physics</b>";
					} ?></td>
		</tr>
		<tr><td><br/></td></tr>
		<tr>
			<td align="center"><?php 
					if ($ch==1) {
						echo "<input type='radio' name='sub' value='ch' /><b>Chemistry</b>";
					} ?></td>
		</tr>
		<tr><td><br/></td></tr>
		<tr>
			<td align="center"><?php 
					if ($ma==1) {
						echo "<input type='radio' name='sub' value='ma' /><b>Math</b>";
					} ?></td>
		</tr>
		<tr><td><br/></td></tr>
		<tr>
			<td align="center"><?php 
					if ($bi==1) {
						echo "<input type='radio' name='sub' value='bi' /><b>Biology</b>";
					} ?></td>
		</tr>
		<tr><td><br/></td></tr>
		<tr>
			<td align="center"><?php 
					if ($co==1) {
						echo "<input type='radio' name='sub' value='co' /><b>Computer Science</b>";
					} ?></td>
		</tr>
		<tr><td><br/></td></tr>
		<table>
			<tr>
				<td align="center"><input type="submit" name="confirmsub" value="Confirm" /></td>
				<td align="center">&nbsp &nbsp</td>
				<td align="center"><input type="submit" name="upgradebtn" value="Upgrade"></td>
			</tr>
			<table>
			<tr>
				<td align="center"><input type="submit" name="withdraw" value="Withdraw"></td>
			</tr>
			</table>
		</table><?php } ?>
	</table>
</form>
