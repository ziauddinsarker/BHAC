<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['user_name'], $_POST['user_pass'])){
    $message = 'Please enter a valid username and password';
	}
		/*** check the username is the correct length ***/
		elseif (strlen( $_POST['user_name']) > 20 || strlen($_POST['user_name']) < 4)
		{
			$message = 'Incorrect Length for Username';
		}
		/*** check the password is the correct length ***/
		elseif (strlen( $_POST['user_pass']) > 20 || strlen($_POST['user_pass']) < 4)
		{
			$message = 'Incorrect Length for Password';
		}
		/*** check the username has only alpha numeric characters ***/
		elseif (ctype_alnum($_POST['user_name']) != true)
		{
			/*** if there is no match ***/
			$message = "Username must be alpha numeric";
		}
		/*** check the password has only alpha numeric characters ***/
		elseif (ctype_alnum($_POST['user_pass']) != true)
		{
				/*** if there is no match ***/
				$message = "Password must be alpha numeric";
	}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $user_pass = filter_var($_POST['user_pass'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $user_pass = sha1( $user_pass );
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'bhaloachee';

    /*** mysql password ***/
    $mysql_password = '19A14t1&';

    /*** database name ***/
    $mysql_dbname = 'bhaloach_dev';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT user_id, user_name, user_pass FROM users WHERE user_name = $user_name AND user_pass = $user_pass");

        /*** bind the parameters ***/
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $stmt->bindParam(':user_pass', $user_pass, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['user_id'] = $user_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>