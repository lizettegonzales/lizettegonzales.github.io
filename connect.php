<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$number = $_POST['number'];

	$conn = new mysqli('localhost', 'root', '','inquire');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(firstName, lastName, age, address, email,number)
		values(?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssissi", $firstName, $lastName, $age, $address, $email,$number);
		$stmt->execute();
		echo '<script>alert("Registered Successfully!")</script>';
		$stmt->close();
		$conn->close();
	}

?>