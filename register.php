<!-- 
This code will appear when the Register menu item is chosen in the Final Exam.

This form will be absorbed by the controller.

Authors: Rick Mercer and Paul Rich
-->
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<!-- Author: Paul Rich -->
</head>
<body>
<?php 
  // seesion_start()s are not needed until later, certainly not in Quotes 1
  session_start();
?>

<h3>Register</h3>
<form autocomplete="off"  action="controller.php" method="post">
<div class="registerContainer">
<input type="text" name="registerUsername" placeholder='Username' required>
<br>
<input type="text" name="registerPassword" placeholder='Password' required>
<br><br>
<input type="submit" value="Register"> <br>
<div id="nameTakenDiv"></div>
<?php 
// This is not needed in Quotations 1.  This code will be needed to show
// errors later in a multi-page website when an account name already exists.
if( isset($_SESSION ['registrationError']))
  echo $_SESSION ['registrationError']; 
unset($_SESSION ['registrationError']);


?>

</div>

</form>