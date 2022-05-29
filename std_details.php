<?php 
session_start();
if (isset($_SESSION['lid'])&& !empty($_SESSION)) 
{
  # code...

    include "connection/connection.php";

    if(isset($_POST['submit']))
    {
    	$name=$_POST['name'];
    	$stream=$_POST['stream'];
    	$dob= $_POST['dob'];
      $email=$_POST['email'];
      $mob=$_POST['mob'];
       $ssql= "insert into student_master(std_name,stream,dob,email,mob) values ('$name','$stream','$dob','$email','$mob')";
       $srec=mysql_query($ssql);
       $pk=mysql_insert_id($con); //Fetching the last generated id(in this case it is the last generated primary key)
      
      


      
       {
          $degree1=$_POST['degree1'];
          $degree2=$_POST['degree2'];
          $degree3=$_POST['degree3'];
          $degree4=$_POST['degree4'];
          
          $board1=$_POST['board1'];
          $board2=$_POST['board2'];
          $board3=$_POST['board3'];
          $board4=$_POST['board4'];

          $grade1=$_POST['grade1'];
          $grade2=$_POST['grade2'];
          $grade3=$_POST['grade3'];
          $grade4=$_POST['grade4'];

          $yop1=$_POST['yop1'];
          $yop2=$_POST['yop2'];
          $yop3=$_POST['yop3'];
          $yop4=$_POST['yop4'];

          $degree=$degree4;
          

          if($degree = "")
         {   
         $dsql ="insert into std_qualification(std_id,degree1,degree2,degree3,board1,board2,board3,grade1,grade2,grade3,yop1,yop2,yop3) values ('$pk','$degree1','$degree2','$degree3','$board1','$board2','$board3','$grade1','$grade2','$grade3','$yop1','$yop2','$yop3')";
         $drec=mysql_query($dsql);
     
        }
        else{
            $dsql ="insert into std_qualification(std_id,degree1,degree2,degree3,degree4,board1,board2,board3,board4,grade1,grade2,grade3,grade4,yop1,yop2,yop3,yop4) values ('$pk','$degree1','$degree2','$degree3','$degree4','$board1','$board2','$board3','$board4','$grade1','$grade2','$grade3','$grade4','$yop1','$yop2','$yop3','$yop4')";
         $drec=mysql_query($dsql);
        }
      }

    if($srec && $drec>0)
      {
        echo"<script>
        alert('Data inserted successfully');
        location.replace('std_details.php?');
        </script>";
      }
    }

    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <title>Student details</title>

    <body>
        <div class="col-sm-2 bg-info" style="padding-bottom: 300px;">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="std_details.php">ADD STUDENT</a></li>
          <li class="nav-item"><a class="nav-link" href="comp_details.php">ADD COMPANY</a></li>
          <li class="nav-item"><a class="nav-link" href="eligible.php">VIEW ELIGIBLE STUDENTS</a></li>
          <li class="nav-item"><a  class="nav-link" href="logout.php">LOGOUT</a></li>
            
        </ul>
      </div>
        <div class="col-10">

           <h3 class="text-info bg-warning"> Insert Student Details</h3>
          <form id="form1" name="form1" method="post" action="">
    
      <table width="50%" border="0" align="center">
        <tr>
          <td width="161" height="29" align="right">Name</td>
          <td width="36" align="center">:</td>
          <td width="182" align="left"><input name="name"class="form-control" type="text" id="name" /></td>
        </tr>
        <tr>
          <td align="right">Stream</td>
          <td align="center">:</td>
          <td align="left"><select name="stream" class="form-control" id="stream">
            
            <option value="Computer Application">Computer Application</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Computer Science ">Computer Science </option>
          </select></td>
        </tr>
        <tr>
          <td height="27" align="right">D.O.B(YYYY-MM-DD)</td>
          <td align="center">:</td>
          <td align="left"><input type="text" class="form-control" name="dob"></td>
        </tr>
        <tr>
          <td height="30" align="right">Email id </td>
          <td align="center">:</td>
          <td align="left"><input name="email" type="text" class="form-control" id="email" /></td>
        </tr>
        <tr>
          <td height="30" align="right">Mobile No </td>
          <td align="center">:</td>
          <td align="left"><input name="mob" type="text" class="form-control" id="mob" /></td>
        </tr>
      </table>
     <h3 class="text-info bg-warning">Insert Qualification Details</h3>
      <table width="50%" height="225" border="0" align="center">
        <tr style="border: solid 2px grey;" >
          <td align="center" >Degree</td>
          <td align="center">Board/University</td>
          <td align="center">Percentage/GPA</td>
          <td align="center">Year of Passing </td>
        </tr>
        <tr>
          <td height="46" align="center"><input name="degree1"  class="form-control" type="text" id="degree1" /></td>
          <td align="center"><input name="board1" class="form-control" type="text" id="board1" /></td>
          <td align="center"><input name="grade1" class="form-control" type="text" id="grade1" /></td>
          
          <td align="center"><input name="yop1" class="form-control" type="text" id="yop1" /></td>
        </tr>
        <tr>
          <td height="42" align="center"><input name="degree2" class="form-control" type="text" id="degree2" /></td>
          <td align="center"><input name="board2" class="form-control" type="text" id="board2" /></td>
          <td align="center"><input name="grade2" class="form-control" type="text" id="grade2" /></td>
          
          <td align="center"><input name="yop2"  class="form-control" type="text" id="yop2" /></td>
        </tr>
        <tr>
          <td height="42" align="center"><input name="degree3" class="form-control" type="text" id="degree3" /></td>
          <td align="center"><input name="board3" type="text" class="form-control" id="board3" /></td>
          <td align="center"><input name="grade3" type="text" class="form-control" id="grade3" /></td>
          
          <td align="center"><input name="yop3" type="text" class="form-control" id="yop3" /></td>
        </tr>
        <tr>
          <td height="42" align="center"><input name="degree4" class="form-control" type="text" id="degree4" /></td>
          <td align="center"><input name="board4" type="text" class="form-control" id="board4" /></td>
          <td align="center"><input name="grade4" type="text" class="form-control" id="grade4" /></td>
          
          <td align="center"><input name="yop4" type="text" class="form-control" id="yop4" /></td>
        </tr>
        <tfoot>
          <th> <input name="submit" type="submit" class="btn btn-success" value="submit" /></th>
        </tfoot>
      </table>
      
      
    </form>
        </div>
<br><br>
<footer>
  <div class="col-sm-12 footer bg-primary" >
    <br>
    <p class="text-center">&copy;S.I.T</p>
    <br><br><br>
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
