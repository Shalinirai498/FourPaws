<?php
	$First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Email_id = $_POST['Email_id'];
	$Phone_Number = $_POST['Phone_Number'];
	$User_name = $_POST['User_name'];
	$psw = $_POST['psw'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(First_Name, Last_Name, Email_id, Phone_Number, User_name, psw) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $First_Name, $Last_Name, $Email_id, $Phone_Number, $User_name, $psw);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
	}
?>