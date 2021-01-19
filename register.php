<?php
require_once('db.php');

if(isset($_POST['Next']))
{
	//echo "hello";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	//echo $name;
	$query="INSERT INTO users (name, email, password) VALUES (?,?,?)";
	$insert=mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($insert, 'sss', $name, $email, $pass);
	//mysqli_stmt_execute($insert);
	if (mysqli_stmt_execute($insert))
	{
		//echo "success";
		mysqli_close($conn);
		header("Location: http://localhost/login.php");
	}
	else
	{
		echo "failed";
		mysqli_close($conn);
	}
}
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
</head>

<body>
    <div class="box">
        <form id="form" name="form" method="post" action="#">
            <h1>Register Form</h1>
            <hr>
            <label for="Name"><b>Name*</b></label>
            <input type="text" name="name" value="" placeholder="Enter Name" required>
            <label for="Email"><b>Eamil*</b></label>
            <input type="text" name="email" value="" placeholder="Enter Email" required>
            <label for="pwd"><b>Password*</b></label>
            <input type="password" name="password" value="" id="password" onkeyup='check();'
                placeholder="Enter Password" required>
            <label for="pwd"><b>Confirm Password*</b></label><br>
            <input type="password" name="confirm_password" id="confirm_password" value="" onkeyup='check();'
                placeholder="Confirm Password" required>
                <span id='message'></span>
            <hr>
            <button type="submit" class="button" name="Next">Register</button>
        </form>
    </div>
</body>
<script>
    var check = function () {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Matching';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Not Matching';
        }
    }
</script>
</html>

