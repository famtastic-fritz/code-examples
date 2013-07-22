<?php

// This Line is setting the $username variable and filling with the ost value for username
// for good programming  practice user input that will be sent to the db should
// be sanitized first to protect against SQL injection attacks. 
// without seeing if what login.php does it should be assume that the check hasent been made as of yet.
$username = $_POST['username'];
// This will check to see if the  logged_in is set, and if not then redirect to the login.php page.
// this will not work . inorder to use $_SESSION you must make a session_start(); at the beginning of the page
if(!isset($_SESSION['session']["logged_in"])) { 
  header("Location: login.php");
}
// this is trying to check to see is if the user name is set.
// Again , with out know how login.php is handeling the log in form , I will make the assumption that
// it's using the post method.  and since Earlier on we used post we should stick with post or EVEN use $_REQUEST
// to give the form uniformity.
// Also to be on the safe side we should also have a check to see the username != ''
// there is also a syntax error the if statement is missing a closing ")"
// this check should really be done at the top and encapluslate most of this code because if username is not check there is no 
// need to continue on with the rest of the script. 
if (isset($_GET['username'])
{
  // this will take the passed user name and attempt to sanitize it before sending it to the db
  // this could have been easily accomplished by using php's addslashes() function.

  $username = filterinput($_POST['username']);
}
//include php form the file admin.inc.php
// in stead of using the ip adress , we should be using $_SERVER["DOCUMENT_ROOT"]
include("http://242.32.23.4/inc/admin.inc.php");
// checking to see if page_id is set, again there should also really be a check to see that page_id !=''
if (isset($_GET['page_id'])) {
  // load the specfic inc file based on the given  page_id
  include('inc/inc' . $_GET['page_id'] . '.php');
  //  load the code from the inc-base.php
  include('inc/inc-base.php');
}
// this will attempt to strip a $varaibale  addslashes 
function filterinput($variable)
{
    // this will add a slash in front of every occurnece of ' in the string 
    $variable = str_replace("'", "\'", $variable);
    // this will attempt to add a slash in front og every " in the string
    // this will  not run there is a syntax error  the first parmeter need to add a \ in the middle 
    // it would be a better practice to just re-write the arameters as ('"', '\"', $variable)
    $variable = str_replace(""", "\"", $variable);
    return $variable;
}
// this will return the user content
function getUserContent($username)
{
    // make an connection to the db
    $con=mysqli_connect("locahost","dbuser","abc123","my_db");
    // run the query
    // while this will still work I would have rather written this part  like 
    // $result= $con->query("SELECT user_content FROM users where username = ". $username); since I already defined $con    
    $result = mysqli_query($con,"SELECT user_content FROM users where username = ". $username);
    // stores the user content in the result array
    $row = mysqli_fetch_array($result);
    // returns  the user content
    return $row['user_content'];
    // this will close the connection to the db.
    // this will not run however , anthing thats written after the return statment will not
    // get executed since that's the furthest the program will go.
    mysqli_close($con);
}
// this will  will echo to the screen a welcome message with the user's name
echo "<h1>Welcome, ". $username ."</h1>";
// this will echo to the screen the user's content
// that assuming everything else pased and made it this far. 
// another reason why there shod have been some type of encapulation to ensure that 
// it never makes it this far unless it passes several checks.
echo getUserContent($username);

?>
