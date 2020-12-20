
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<!-- Author: Paul Rich -->
</head>
<body>
<?php
session_start ();
   
?>

<h3>Login</h3>
	<form action="controller.php" method="POST">
		<div class="loginContainer">
	    <!--  Use name="stringIndex" to let controller.php  -->
	    <!--  know isset($_POST['ID']) is true  -->
		<input type="text" name="ID" value="" placeholder="Username">
		<!--  $_POST['password'] is also set in controller.php -->
		<input type="password" name="password" value="" placeholder="Password"> <br> <br>
		<!--  $_POST['LoginLogin'] is also set in controller.php -->
	    <input type="submit" name="LoginLogin" value="Login"> <br> <br>
	    </div>
	<?php
	
  // TODO 9: Show message indicating the credentials were not correct
  if( isset(  $_SESSION['loginError']))
    echo  $_SESSION['loginError'];
    unset($_SESSION['loginError']);
	?>
</form>
</body>
</html>