

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <meta name="viewport" content="width-device-width,initial-scale=1.0">
  <link rel="stylesheet" href="Home.css">
</head>

<body>
  <div class="wrapper">
    <header class="main-head">
      <div class="logo">Welcome <?php
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
?> </div>
      <button type="button" name="serachbar" onClick="redirect1()" style="margin-left:70%;">Search</button>
      <button type="button" name="profile" onClick="redirect()" >Profile</button>
    </header>
    <nav class="main-nav">
      <!-- <form action="/action_page.php" id="usrform">
            Name: <input type="text" name="usrname">
            <input type="submit">
            <textarea rows="4" cols="50" name="comment" form="usrform" >
            </textarea>
          </form> -->
    </nav>
    <article class="content">
      <h1>Post Here...</h1>  
      <section>
        <div class="text">
          <textarea placeholder="What's in your mind"></textarea>
          <input type="submit" value="post" />
        </div>
      </section>
      <div class="overlay"></div>
      <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    </article>

    <footer class="main-footer">
      <p>The Footer</p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
      magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </footer>
    <script>
      $(document).ready(function () {
        $(".text").click(function () {
          $(".overlay").fadeIn(200);
        });
        $(".overlay").not(".text").click(function () {
          $(".overlay").fadeOut(200);
        });
        $("[type = submit]").click(function () {
          var post = $("textarea").val();
          $("<p class='post'>" + post + "</p>").appendTo("section");
        });
      });
    </script>
  </div>
  
  <script>
		function redirect()
		{
			const queryString = window.location.search;
			window.location.href="http://localhost/profile.php"+queryString;
			//alert(queryString);
		}
		function redirect1()
		{
			window.location.href="http://localhost/search.php"
		}
  </script>
</body>

</html>
