<?php	
	
	require_once("db.php");
	if(isset($_POST["login"]))
	{
		$email=$_POST["email"];
		$pass=$_POST["password"];
		$query="select email, password, name from users where email = '".$_POST["email"]."'";
		//echo $query;
		if ($result = mysqli_query($conn, $query)) 
		{
		  // Fetch one and one row
		  while ($row = mysqli_fetch_row($result)) 
		  {
		    if($email==$row[0] && $pass==$row[1])
		    {
		    	//echo "authentication success";
		    	
		    	$cookie_name = $row[2];
			$cookie_value = $row[1];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		    	
		    	mysqli_free_result($result);
		    	mysqli_close($conn);
		    	header("Location: http://localhost/homepage.php?email=".$email);
			//exit();
		    }
		    else
		    {
		    	mysqli_free_result($result);
		    	mysqli_close($conn);
		    	echo "authentication failed";
		    }
		  }
		}
	}
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="reset.css">
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	</head>
	<body>
		<form action="" name=form1 method="POST">
			<div class="wrap">
			<input type="text" placeholder="email" name="email" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" placeholder="password" name="password" required>
			<a href="" class="forgot_link">forgot ?</a>
			<button onclick="ValidateEmail(document.form1.email)" name="login">Login</button>
			</div>
		</form>
		<script>
			function ValidateEmail(inputText)
			{
				var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
				var check=0;
				if(inputText.value.match(mailformat))
				{
					check=1;
				}
				else
				{
					alert("You have entered an invalid email address!");
					return false;
				}
				if(check==1)
				{
					window.location.href="http://localhost/login.php";
					return true;
				}
			}		
		</script>
	</body>
</html>
