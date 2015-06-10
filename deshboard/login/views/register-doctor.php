<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<?php

include 'templates/header.php';?>	
<?php
/*
$hostname = "ziauddins.com";
var_dump($hostname );
var_dump(gethostbyname($hostname ));


?>

<?php
//script to time DNS propagation
//(Above script modified slightly to show micro time)
//seems pretty damn quick to me.. I'm getting .0055 sec worstcase badhost times.

//A known good dns name (my own)
    $nametotest = "ziauddins.com";
   
//Call address test function
    $time_start = getmicrotime();
    testipaddress($nametotest);
    $time_end = getmicrotime();
    $time = $time_end - $time_start;
    echo "Search took $time seconds<br><br>";

//A known bad name (trust me)
    $nametotest = "providence.mascot.com";
    $time_start = getmicrotime();
    testipaddress($nametotest);
    $time_end = getmicrotime();
    $time = $time_end - $time_start;
    echo "earch took $time seconds<br>";
   
   
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }

//ip address checking function
//for real use should have a return value but example code
function testipaddress ($nametotest) {
    $ipaddress = $nametotest;
    $ipaddress = gethostbyname($nametotest);
    if ($ipaddress == $nametotest) {
        echo "No ip address for host<br>";
    }
    else {
        echo "good hostname, $nametotest ipaddress = $ipaddress<br>";
    }
}

//Recommended fix for sql applications:
// store url to temporary table
// run second process periodically to
// check urls and update main table

*/
?>

<!-- register form -->
<article class="row">		
<form method="post" action="register.php">
	
	<!-- the name input field -->
	<label for="login_input_name">Name(Full Name)</label>
	<input id="login_input_name" class="login_input" type="text" name="fullname" />
	
	<!-- the Title/Degree input field -->
	<label for="login_input_title">Title/Degree</label>
	<input id="login_input_title" class="login_input" type="text" name="title" />
	
	<!-- the Gender input field -->
	<label for="login_input_gender">Gender</label>	
	<input id="login_input_male" type="radio" name="gender" value="male">Male
	<input id="login_input_female" type="radio" name="gender" value="female">Female

	<!-- the BDMC input field -->
	<label for="login_input_bmdc">BMDC No.</label>
	<input id="login_input_bmdc" class="login_input" type="text" name="bmdc" />
	
	<!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">Email Address</label>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
	
	<!-- the Phone input field -->
	<label for="login_input_phone">Phone</label>
	<input id="login_input_phone" class="login_input" type="text" name="phone" />
	
	<!-- the Specialist input field -->
	<label for="login_input_specialist">Speciality</label>
	<input id="login_input_specialist" class="login_input" type="text" name="specialist" />
	
	<!-- the Address input field -->
	<label for="login_input_address">Address</label>
	<input id="login_input_address" class="login_input" type="textarea" name="address" rows="4" cols="20" />
	
	<!-- the Address input field --><!-- the Address input field --><!-- the Address input field --><!-- the Address input field -->
	<label for="login_input_district">District</label>
	<input id="login_input_district" class="login_input" type="text" name="district" rows="4" cols="20" />
	<!-- the Address input field --><!-- the Address input field --><!-- the Address input field --><!-- the Address input field -->
	
	<!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

	<!-- the Password input field -->
	<label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	
	<!-- the Submit input field -->
	<input type="submit"  name="registerDoctor" value="Register" />

	</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
</article>
<?php include 'templates/footer.php';?>	