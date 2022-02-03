<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_collection_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO form_data (name, gender, email, team, country, website, comment) 
    VALUES (:name, :gender, :email, :team, :country, :website, :comment)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':team', $team);
	$stmt->bindParam(':country', $country);
	$stmt->bindParam(':website', $website);
	$stmt->bindParam(':comment', $comment);
	

    $name = $_REQUEST["name"];
    $gender = $_REQUEST["gender"];
	$email = $_REQUEST["email"];
	foreach($_REQUEST['team'] as $check) {
		if(!empty($_REQUEST['team'])) {
			$team .= $check." ";
		}
	}
	$country = $_REQUEST["country"];
	$website = $_REQUEST["website"];
	$comment = $_REQUEST["comment"];
	if(empty($name) || empty($gender) || empty($email) || empty($country))
		echo "<br>More required fields missing!!! Could not submit your form";
	else {
		$stmt->execute();
		echo "New record created successfully<br>"; 
		echo "Thanks for filling in our form!!!<br>";
    }
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
	
$conn = null;
?> 