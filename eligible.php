<?php 
session_start();
include "connection/connection.php";
if (isset($_SESSION['lid'])&& !empty($_SESSION)) 
{
	if (isset($_REQUEST['search'])) {

		$sr = $_REQUEST['sr'];
		
				
		
	}
			
		
			$qsql="select com_name,com_id from company_master";
			$qrec=mysql_query($qsql);
			$num = mysql_num_rows($qrec);
			$cmid=$qrec['com_id'];
			$psql="select st.*,stq.*,cm.* from  student_master st,company_master cm  INNER JOIN  std_qualification stq ON  stq.grade1 >= cm.criteria AND stq.grade2 >= cm.criteria2 AND stq.grade3 >= cm.criteria3 AND stq.grade4 >= cm.criteria4 where st.std_id=stq.std_id AND cm.com_id='$sr'"; 
			 	
			$pres=mysql_query($psql);
			$num1=mysql_num_rows($pres);
			
			if(isset($_POST['save']))
			{
				


			 $flg=0;
			  for($i=1; $i<=$num1; $i++)
			   {
			      $stid=$_POST['stid'.$i];
			      $stname=$_POST['stname'.$i];
			    	echo "$stid $stname";

			   		$esql="insert into eligible_student(std_id,com_id) values('$stid','$stname')";
			   		$eres=mysql_query($esql);
			   	

			    }  
			  

			}

			 ?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>eligible students</title>
					<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			</head>
			<body>
				<div class="col-sm-2 bg-info" style="padding-bottom: 300px;">
			        <ul class="nav">
			          <li class="nav-item"><a class="nav-link" href="std_details.php">ADD STUDENT</a></li>
			          <li class="nav-item"><a class="nav-link" href="comp_details.php">ADD COMPANY</a></li>
			          <li class="nav-item"><a class="nav-link" href="eligible.php">VIEW ELIGIBLE STUDENTS</a></li>
			          <li class="nav-item"><a  class="nav-link" href="logout.php">LOGOUT</a></li>
			            
			        </ul>
				</div>
					<div class=" container col-sm-10">
						<div class="container col-sm-9">
								<form action="" name="form2" method="POST">
										<h5 class="">Check by Company name </h5>
											<select class="form-control" name="sr">

												 <?php
												 if($num>0){
													
													while($res = mysql_fetch_assoc($qrec))

													{
														?>
												
												<option  value="<?php echo $res['com_id'];?>"><?php echo $res['com_name'];?></option>

													<?php
													}

												}

												?>

											</select>
									<input type="submit" class="btn btn-success" name="search" value="search">

								</form>
							</div>
							<div class="container col-sm-9">
							<table  border="0" class="table table-hover" align="center">
								<form action="" method="POST">
								<th>SN.no</th>
								<th>Student id</th>
								<th>Student name</th>
								<th>Company</th>    
								<th>Attendance</th>
								<?php

							 		if($num1>0){
									$j=1;
									while($tres = mysql_fetch_assoc($pres))

										{
									?>
							    <tr>
							    	<td><?php echo $j?></td>
							      <td width="161" height="29" align="right"><input name="" class="" style="border: none;" type="text" id="stid" value="<?php echo $tres['std_id'];?>" readonly /></td>
							      <td width="36" align="center"><input name="stname" type="text" style="border: none;" id="stname" value="<?php echo $tres['std_name'];?>" readonly /></td>
							      <td width="182" align="left"><input name="cname" type="text" style="border: none;" id="cname" value="<?php echo $tres['com_name'];?>" readonly /></td>
							      <td width="182" align="left"><input name="check" style="border: none;" class="form-check-input" type="checkbox" id="check" /></td>
							      <?php
							      $j++;
							  }


							}



							?>
							    </tr>
							    <tfoot>
							    	<th></th>
							    	<th>
							    		<input type="submit" class="btn btn-success" name="save" value="save">
							    	</th>
							    	<th>
							    		<input type="submit" class="btn btn-info" name="" value="email">
							    	</th>
							    	<th>
							    		<input type="button" name="" class="btn btn-primary" value="print" onclick="window.print()">
							    	</th>
							    
							    </tfoot>
							    </form>
							</table>
							</div>
					</div>

					 <br><br>
					 <footer>
					 <div class=" col-sm-12 footer bg-primary" >
					 <br>
					 <p class="text-center">&copy;S.I.T</p>
					 <r><br><br>
					 </div>
					 </footer>

					</body>
					</html>
					   <?php
						 }
						else
						{
							echo "<script>
							alert('Invalid Session');
							location.replace('login.php?')
							 </script>";
							}
						?>