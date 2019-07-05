

<html>
<head>
    <title>User Login</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</head>
<body style="background: turquoise;">
	<br>
	<h1 align="center">User Login</h1>
	<div class="container" style="padding-top: 200px; padding-left: 350px ">
	<div class="row">
	<div class="col-lg-6">
	<div class="card border-dark">
	<div class="card-header" style="background: grey;">
		<h3 align="center"> Welcome</h3>
	</div>
	<div class="card-body" >
		<form method="post" action="cookie_session_check.php" align="center">
   			User Name:<input type="text" name="email" value=<?php echo Cookie_val(1) ?> > <br><br>
   			Password:<input type="password" name="Password" value=<?php echo Cookie_val(2) ?> > 
  		 <br><br>
   			<input type="checkbox" name="remuser">Remember Password<br><br>
   			<input type="submit" value="Login">
		</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</body>
	<?php
		function Cookie_val($ch){
		if ($ch==1)
		{	
			if (isset($_COOKIE['UName']))
			{
				return $_COOKIE['UName'];
			}
			else 
				return;
		}
		else
		{
			if (isset($_COOKIE['Pwd']))
			{
				return $_COOKIE['Pwd'];
			}
			else 
				return;
		}
		}
	?>
</html>