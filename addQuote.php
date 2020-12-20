<!DOCTYPE html>
<html>
<head>
<title>Add Quote Page</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<!-- Author: Paul Rich -->
</head>
<body>
<?php
session_start ();

?>

<h3>Add Quote</h3>
	<form action="controller.php" method="POST">
		<div class="addQuoteBox">
			<textarea name="quoteBox" class="QB" value="" placeholder="Enter new quote" required></textarea><br><br>
			<div class="authorSubmitBox">
				<input type="text" name="quoteAuthor" class="AB" value="" placeholder="Author" required><br> <br>
	    		<input type="submit" name="quoteAdded" value="Add Quote"> <br> <br>
	    	</div>
	    </div>
	</form>
</body>
</html>