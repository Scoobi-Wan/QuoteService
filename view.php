<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name quotes.php 
    
Authors: Rick Mercer and Paul Rich
-->

<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="showQuotes()">



<h1>Quotation Service</h1>


<form action="controller.php" method="POST">
	
	
	
	<?php
    session_start (); // Not needed in Quotes1

    require_once './DatabaseAdaptor.php';
    if (isset ($_SESSION ['userID'])) {
        echo "<input type='submit' name='Logout' class='menuButton' value='Logout'/>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<input type='submit' name='AddQuote' class='menuButton' value='Add Quote'/>&nbsp;&nbsp;&nbsp;&nbsp;<i>Hello " . $_SESSION ['userID'] . "</i>";
    } else {
        echo "<input type='submit' name='Register' class='menuButton' value='Register'/>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<input type='submit' name='Login' class='menuButton' value='Login'/>&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    ?>
</form>





<div id="quotes"></div>

<script>
var element = document.getElementById("quotes");





function showQuotes() {
    // TODO 5: 
    // Complete this function using an AJAX call to controller.php
  	// You will need query parameter todo=getQuotes.
  	// Echo back one big string to here that has all styled quotations.
  	// Write all of the complex code to layout the array of quotes 
  	// inside function getQuotesAsHTML inside controller.php.

  	var ajax = new XMLHttpRequest();
  	var queryURL = "controller.php?todo=getQuotes";
  	ajax.open("GET", queryURL);
  	ajax.send();
  	ajax.onreadystatechange = function() {
  	  	if (ajax.readyState = 4 && ajax.status == 200) {
  	  	  	var quoteList = ajax.responseText;
  	  		element.innerHTML = quoteList;
  	  	}
  	}
  	
} // End function showQuotes

</script>

</body>
</html>
