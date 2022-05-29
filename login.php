<?php
include "connection/connection.php";
if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	
	$sql = "select * from login_master where username='$uname'";
	$rec = mysql_query($sql);
	$num = mysql_num_rows($rec);
	if($num > 0)
	{
		$res = mysql_fetch_assoc($rec);
		if($pass == $res['password'])
		{
			session_start();
			$_SESSION['lid'] = $res['login_id'];
			$_SESSION['full_name'] = $res['full_name'];
			echo "<script>
				alert('Successfully Logged In');
				location.replace('index.php')
				</script>";
		}else
		{
			echo "<script>
				alert('Invalid Password');
				location.replace('login.php?')
				</script>";
		}
	}else
	{
		echo "<script>
				alert('Invalid User Name or Password');
				location.replace('login.php?')
				</script>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginc.css">
	<title>LOGIN</title>
</head>
<body class="container" >
	<div class="col-sm-4"></div>
	<div class="col-sm-5" style="margin-top: 100px;">
		<div class="form-style-8">
		  <h2>Login to your account</h2>

		   	 <form action="" method="POST">
		    <input type="text" name="uname" placeholder="Username" />
		    <input type="password" name="pass" placeholder="Password" />
		    
		    <input type="submit" value="Login" name="submit" />
		  </form>
		</div>
		<div class="col-sm-2"></div>

</div>
 <br><br>
 
</body>
</html>
