<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Id</th><th>Name</th><th>Gender</th><th>Email</th><th>Team</th><th>Country</th><th>Website</th><th>Comment</th><th>Date Created</th></tr>";

class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
}

?>

<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_collection_db"; 

try {
	if(isset($_POST['submitName']) && !empty($_POST['searchName'])) {
		$searchValueName = $_POST['searchName'];		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, gender, email, team, country, website, comment, created_at FROM form_data WHERE name LIKE '%$searchValueName%'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	}
	elseif(isset($_POST['submitGender']) && !empty($_POST['searchGender'])) {
		$searchValueGender = $_POST['searchGender'];		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, gender, email, team, country, website, comment, created_at FROM form_data WHERE gender LIKE '$searchValueGender'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	}
	elseif(isset($_POST['submitEmail']) && !empty($_POST['searchEmail'])) {
		$searchValueEmail = $_POST['searchEmail'];		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, gender, email, team, country, website, comment, created_at FROM form_data WHERE email LIKE '%$searchValueEmail%'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	}
	elseif(isset($_POST['submitTeam']) && !empty($_POST['searchTeam'])) {
		$searchValueTeam = $_POST['searchTeam'];		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, gender, email, team, country, website, comment, created_at FROM form_data WHERE team LIKE '%$searchValueTeam%'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	}
	elseif(isset($_POST['submitCountry']) && !empty($_POST['searchCountry'])) {
		$searchValueCountry = $_POST['searchCountry'];		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, gender, email, team, country, website, comment, created_at FROM form_data WHERE country LIKE '%$searchValueCountry%'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	}
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

$conn = null;



echo "</table>";
?> 

</body>
</html>