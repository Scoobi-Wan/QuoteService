<?php
// This file contains a bridge between the view and the model and redirects back to the proper page
// with after processing whatever form this code absorbs. This is the C in MVC, the Controller.
//
// Authors: Rick Mercer and Paul Rich
//  
session_start (); // Not needed in Quotes1

require_once './DatabaseAdaptor.php';

$theDBA = new DatabaseAdaptor();

if (isset ( $_GET ['todo'] ) && $_GET ['todo'] === 'getQuotes') {
    $arr = $theDBA->getAllQuotations();
    unset($_GET ['todo']);
    echo getQuotesAsHTML ( $arr );
}

if (isset ($_POST ['LoginLogin'])) {
    $usr = htmlspecialchars($_POST ['ID']);
    $psw = htmlspecialchars($_POST ['password']);
    if ($theDBA->verifyCredentials($usr, $psw) === true) {
        $_SESSION ['userID'] = $usr;
        header('Location: view.php');
    } else {
        $_SESSION ['loginError'] = "Incorrect username or password. Please try again.";
        header('Location: login.php');
    }
    
    
}



if (isset ($_POST ['registerUsername']) && isset ($_POST ['registerPassword'])) {
    $usrID = htmlspecialchars($_POST ['registerUsername']);
    $usrPwd = htmlspecialchars($_POST ['registerPassword']);
    if ($theDBA->addUser($usrID, $usrPwd) === true) {
        header('Location: view.php');
    } else {
        $_SESSION['registrationError'] = "Account name taken";
        header('Location: register.php');
    }
    
}

if (isset ($_POST ['Register'])) {
    header('Location: register.php');
    
}

if (isset ($_POST ['quoteAdded'])) {
    $quoteToAdd = htmlspecialchars($_POST ['quoteBox']);
    $quoteAuthor = htmlspecialchars($_POST ['quoteAuthor']);
    $theDBA->addQuote($quoteToAdd, $quoteAuthor);
    header('Location: view.php');
}

if (isset ($_POST ['Login'])) {
    header('Location: login.php');
}

if (isset ($_POST ['Logout'])) {
    unset( $_SESSION ['userID']);
    header ('Location: view.php');
}

if (isset ($_POST ['AddQuote'])) {
    header('Location: addQuote.php');
}

if (isset ($_POST ['update'])) {
    print ("post['update'] was set");
    if (($_POST ['update']) === 'increase') {
        print("increase set");
        $theDBA->increaseRating($_POST ['ID']);
        header('Location: view.php');
    } else if (($_POST ['update']) === 'decrease') {
        $theDBA->decreaseRating($_POST ['ID']);
        header('Location: view.php');
    } else if (($_POST ['update']) === 'delete') {
        $theDBA->deleteQuote($_POST ['ID']);
        header('Location: view.php');
    }
  
}


function getQuotesAsHTML($arr) {
    // TODO 6: Many things. You should have at least two quotes in 
    // table quotes. layout each quote using a combo of PHP and HTML 
    // strings that includes HTML for buttons along with the actual 
    // quote and the author, ~15 PHP statements. This function will 
    // be the most time consuming in Quotes 1. You will
    // need to add css rules to styles.css.  
    $result = '';
    foreach ( $arr as $quote ) {
        $result .= '<div class="container">';
        $result .= '"' . $quote ['quote'] . '"';
        $result .= '<br><p class="author">';
        $result .= '&nbsp;&nbsp;--' . $quote ['author'] . '<br></p>';
        $result .= '<form action="controller.php" method="post">';
        $result .= '<input type="hidden" name="ID" value="' . $quote ['id'] . '">&nbsp;&nbsp;&nbsp;';
        $result .= '<button name="update" value="increase">+</button>';
        $result .= '&nbsp;<span id="rating">' . $quote ['rating'] . '</span>&nbsp;&nbsp;';
        $result .= '<button name="update" value="decrease">-</button>&nbsp;&nbsp;';
        if (isset ($_SESSION ['userID'])) {
            $result .= '<button name="update" value="delete">Delete</button>';
        }
        $result .= '</form></div>';
    }
    
    return $result;
}
?>