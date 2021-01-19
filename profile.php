<?php

if(isset($_POST['change']))
{
	require_once('db.php');
	//echo "hello";
	$name=$_POST['newUsername'];
	$email=$_POST['newEmail'];
	$pass=$_POST['newPassword'];
	//echo $name;
	
	$query="UPDATE users SET name = '".$name."', email= '".$email."', password= '".$pass."' WHERE email = '".$_GET["email"]."'";
	
	if (mysqli_query($conn, $query)) 
	{
  		//echo "Record updated successfully";
  		mysqli_close($conn);
  		header("Location: http://localhost/profile.php?email=".$email);
	} 
	else 
	{
		mysqli_close($conn);
  		echo "Error updating record: " . mysqli_error($conn);
	}
}
?>


<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <link rel="stylesheet" href="Profile.CSS">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Profile Page</title>
</head>

<body>
    <div class="container">
        <header>
            <h5>User Profile</h5>
            <h5>username: <?php
	require_once("db.php");
	$id=$_GET["email"];
	//echo $id;
	$query="select name from users where email = '".$_GET["email"]."'";
	if ($result = mysqli_query($conn, $query)) 
	{
	  $row = mysqli_fetch_row($result);
	  echo $row[0];
	  mysqli_free_result($result);
	  mysqli_close($conn);
	}
?> <br>email: <?php echo $_GET["email"]; ?> </h5>
            <nav>
                <button type="button" class="btn btn-default btn-lg" id="myBtn">Update</button>
            </nav>
        </header>
        <div class="wrapper">
            <section class="main">
                <img src="avatar.jfif" alt="Avatar" class="avatar">
                
            </section>
        </div>
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon"></span>User Profile</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <form role="form" method="POST">
                                <div class="form-group">
                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                    <input type="text" class="form-control" name="newUsername" id="newUsername" placeholder="Enter New Name">
                                </div>
                                <div class="form-group">
                                    <label for="email"><span class="glyphicon"></span>Email</label>
                                    <input type="text" class="form-control" name="newEmail" id="newEmail" placeholder="Enter New Email">
                                </div>
                                <div class="form-group">
                                    <label for="psw"><span class="glyphicon"></span>New Password</label>
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Enter New Password">
                                </div>
                                <button type="submit" name="change" class="btn btn-success btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#myBtn").click(function () {
                    $("#myModal").modal();
                });
            });
        </script>
</body>

</html>
