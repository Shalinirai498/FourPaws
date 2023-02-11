<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$usn = $_POST['usn'];
	$psw = $_POST['psw'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname, email, phonenumber, usn, psw) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $firstname, $lastname, $email, $phonenumber, $usn, $psw);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
	}
?>