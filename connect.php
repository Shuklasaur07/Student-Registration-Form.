<?php
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastName = $_POST['lastName'];
    $Course = $_POST['Course'];
	$gender = $_POST['gender'];
	$country_code = $_POST['country_code'];
	$phone = $_POST['phone'];
	$currentAd = $_POST['currentAd'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, middlename, lastName, Course, gender, country_code, phone, currentAd, email, password, re_password) values(?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?)");
		$stmt->bind_param("ssssssissss", $firstname, $middlename, $lastName, $Course, $gender, $country_code, $phone, $currentAd, $email, $password, $re_password );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>