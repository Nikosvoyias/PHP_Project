<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
		.error { color: #FF0000;}
		.form { text-align:left; display: block; margin-left:42.5%;} 
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a> 
    </p>
	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $websiteErr = $countryErr = "";
	$name = $email = $gender = $comment = $website = $country = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   if (empty($_POST["name"])) {
		 $nameErr = "Name is required";
	   } else {
		 $name = test_input($_POST["name"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		   $nameErr = "Only letters and white space allowed";
		 }
	   }
	  
	   if (empty($_POST["email"])) {
		 $emailErr = "Email is required";
	   } else {
		 $email = test_input($_POST["email"]);
		 // check if e-mail address is well-formed
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		   $emailErr = "Invalid email format";
		 }
	   }
		
	   if (empty($_POST["website"])) {
		 $website = "";
	   } else {
		 $website = test_input($_POST["website"]);
		 // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		 if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		   $websiteErr = "Invalid URL";
		 }
	   }

	   if (empty($_POST["comment"])) {
		   $comment = "";
	   } else {
		   $comment = test_input($_POST["comment"]);
	   }

	   if (empty($_POST["gender"])) {
		 $genderErr = "Gender is required";
	   } else {
		 $gender = test_input($_POST["gender"]);
	   }
	   
	   if (empty($_POST[""])) {
		 $countryErr = "Country is required";
	   } else {
		 $country = test_input($_POST["country"]);
	   }
	}

	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	?>

	<h2>Please fill in the following form so we can learn more about you!</h2> </br>
	<p><span class="error">* required field.</span></p>
	<form method="post" action="insert.php" class="form">
		
	    First Name:<br><br><input type="text" name="name" value="<?php echo $name;?>">
	    <span class="error">* <?php echo $nameErr;?></span>
	    <br><br>
		
	    Gender:<br><br>
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
	    <span class="error">* <?php echo $genderErr;?></span>
	    <br><br>
		
	    E-Mail:<br><br><input type="text" name="email" value="<?php echo $email;?>">
	    <span class="error">* <?php echo $emailErr;?></span>
	    <br><br>	   
	    
	    Football teams you support(can be more than one): <br><br><fieldset class="checkboxgroup">							
	    <label><input type="checkbox" name="team[]" value="Manchester United"> Manchester United</label> <br>
	    <label><input type="checkbox" name="team[]" value="Real Madrid"> Real Madrid</label> <br>
	    <label><input type="checkbox" name="team[]" value="Liverpool"> Liverpool</label> <br>
	    <label><input type="checkbox" name="team[]" value="Barcelona"> Barcelona</label> <br>
	    <label><input type="checkbox" name="team[]" value="Juventus"> Juventus</label> <br>
	    <label><input type="checkbox" name="team[]" value="Milan"> Milan</label> <br>
		<label><input type="checkbox" name="team[]" value="Another"> Another</label></fieldset><br>
	   
	    <label for="country">Where are you from:</label> <br><br>
		<select id="country" name="country">
		<option value=""></option>
		<option value="England">England</option>
		<option value="Greece">Greece</option>
		<option value="France">France</option>
		<option value="Spain">Spain</option>
		<option value="Germany">Germany</option>
		<option value="Italy">Italy</option>
		</select>
		<span class="error">* <?php echo $countryErr;?></span>
		<br><br>
		
		Website:<br><br><input type="text" name="website" value="<?php echo $website;?>">
	    <span class="error"><?php echo $websiteErr;?></span>
	    <br><br>
		
	    Comment:<br><br><textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
	    <br><br>		
		
		<input type="submit" name="submit" value="Submit Form" class="submit"> <br><br>
		
	</form>
</body>
</html>