<?php
session_start();
include "connection/connection.php";
if (isset($_SESSION['lid'])&& !empty($_SESSION)) 
{

if(isset($_POST['submit']))
{
     $cname =$_POST['cname'];
     $criteria =$_POST['criteria'];
     $criteria2 =$_POST['criteria2'];
     $criteria3 =$_POST['criteria3'];
     $criteria4 =$_POST['criteria4'];
     $date_of_visit=$_POST['date_of_visit'];
     $remark=$_POST['remark'];

     $rsql="insert into company_master(com_name,criteria,criteria2,criteria3,criteria4,date_of_visit,remark) values ('$cname','$criteria','$criteria2','$criteria3','$criteria4','$date_of_visit','$remark')";
    
     $rrec=mysql_query($rsql);
   
   if($rrec)
   {
    echo "success";
   }  


    


}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<title>company details</title>

<body>
    <div class="col-sm-2 bg-info" style="padding-bottom: 300PX;">
    <ul class="nav">
      <li class="nav-item"><a href="std_details.php">ADD STUDENTS</a></li>
      <li class="nav-item"><a href="comp_details.php">ADD COMPANY</a></li>
      <li class="nav-item"><a href="eligible.php">VIEW ELIGIBLE STUDENTS</a></li>
      <li class="nav-item"><a href="std_details.php">LOGOUT</a></li>
        
    </ul>
  </div>
    <div class="col-9">
        <form id="form1" name="form1" method="POST" action="">
  <h3 class="text-info bg-warning">COMPANY DETAILS</h3>
  <table width="401" border="0"  align="center">
    <tr>
      <td width="161" height="29" align="right">Company Name</td>
      <td width="36" align="center">:</td>
      <td width="182" align="left"><input name="cname" class="form-control" type="text" id="cname" /></td>
    </tr>
    <tr>
      <td align="right">Criteria (Matriculation)</td>
      <td align="center">:</td>
      <td align="left"><input name="criteria" class="form-control" type="text" id="criteria" /></td>
    </tr>
    <tr>
      <td align="right">Criteria (Higher Secondary)</td>
      <td align="center">:</td>
      <td align="left"><input name="criteria2" type="text" class="form-control" id="criteria2" /></td>
    </tr>
    <tr>
      <td align="right">Criteria (Graduation)</td>
      <td align="center">:</td>
      <td align="left"><input name="criteria3" type="text" class="form-control" id="criteria3" /></td>
    </tr>
    <tr>
      <td align="right">Criteria (Post Graduation)</td>
      <td align="center">:</td>
      <td align="left"><input name="criteria4" type="text" class="form-control" id="criteria4" /></td>
    </tr>

    <tr>
      <td height="27" align="right">Date of Visit</td>
      <td align="center">:</td>
      <td align="left"><input type="text" class="form-control" name="date_of_visit"/></td>
    </tr>
    <tr>
      <td height="30" align="right">Remark</td>
      <td align="center">:</td>
      <td align="left"><input name="remark" type="text" class="form-control" id="remark" /></td>
    </tr>
    <tfoot>
      <th><input type="submit" name="submit" class="btn btn-success" value="submit"/></th>
    </tfoot>
  </table>
  
 
</form>
    </div>
           <br><br>
           <footer>
           <div class="col-sm-12 footer bg-primary" >
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