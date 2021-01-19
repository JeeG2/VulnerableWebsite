
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <link rel="stylesheet" href="SearchBar.CSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search</title>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="search-container">
                    <form action="#" method="post">
                        <input type="text" placeholder="Search here..." name="searchText">
                        <button type="submit" name="search">Search</button>
                    </form>
                </div>
            </nav>
        </header>
        <div class="wrapper">
            <section class="main">
                <h2>User Exist</h2>
                <ul>
                        <li> <h3> <?php	
	if(isset($_POST['search']))
	{
		require_once("db.php");
		$query="select name from users where name = '".$_POST['searchText']."'";
		if($result = mysqli_query($conn, $query))
		{
			$row = mysqli_fetch_row($result);
			echo $row[0];
			mysqli_free_result($result);
			mysqli_close($conn);
		}
	}
?> </h3> </li>
                </ul>
            </section>
        </div>
    </div>
   
    
</body>

</html>
