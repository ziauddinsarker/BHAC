<?php
include 'db/config.php';

$name = $_POST['user_name'];
echo $name;

$fullname = $_POST['fullname'];
echo $fullname;

$title = $_POST['title'];
echo $title;

$gender = $_POST['gender'];
echo $gender;

$bmdc = $_POST['bmdc'];
echo $bmdc;

$phone = $_POST['phone'];
echo $phone;

$specialist = $_POST['specialist'];
echo $specialist;

$address = $_POST['address'];
echo $address;

$district = $_POST['district'];
echo $district;

$user_email = $_POST['user_email'];
echo $user_email;

$user_password_new = $_POST['user_password_new'];
echo $user_password_new;

$user_password = $_POST['user_password_new'];
$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

mysql_query("INSERT INTO users (user_name, user_password_hash, user_email) VALUES ('$name', '$user_password_hash', '$user_email')");
mysql_query("INSERT INTO doctors (doctors_name, doctors_gender, doctors_email, doctors_phone, doctors_designation, doctors_bdmc_no, doctors_address, doctor_district, doctors_category, user) VALUES ( '$fullname', '$gender', '$user_email', '$phone', '$title', '$bmdc', '$address', '$district', '$specialist', (SELECT LAST_INSERT_ID()))")or die(mysql_error());

?> 


