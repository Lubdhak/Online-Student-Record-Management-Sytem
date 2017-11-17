					<form method="post" action=""><br/>
						<table align="center">
							<th><h2>Payment Form<hr/></h2></th>
							<tr>
								<td>
									<table align="center"><th><h3 style="color: red;">Pay Rs.1000 by Cheque or Cash<hr/></h></th>
										<table>

										<tr>
											<td><input type="radio" name="payoption" value="cheque" checked="checked" /><b>Cheque</b></td>
											<td><input type="radio" name="payoption" value="cash"/><b>Cash</b></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Payment Method</b></td>
											<td><input type="text" value="Cheque" style="text-align: center; font-size: 27px;" disabled/></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Bank Name</b></td>
											<td><input type="text" name="bname"/> <span class="error">*</span></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Check No</b></td>
											<td><input type="text" name="cno"/> <span class="error">*</span></td>
										</tr>
										<tr><td><br/></td></tr>
										<tr>
											<td><b>Check Drawn Date</b></td>
											<td><input type="date" name="cdate"/> <span class="error">*</span></td>
										</tr>
										<tr><td><br/></td></tr>
										<table align="center">
											<tr>
												<td><input type="submit" name="paybtn" value="Payment"></td>
											</tr>
										</table></table>
									</table>
								</td>
							</tr>
						</table>
					</form>
						