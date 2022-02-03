<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
	<style>
		body{ font: 14px sans-serif; text-align: center; }
		.form { text-align:left; display: block; margin-left:42.5%; margin-top: 5%;} 
		h3 {color:red; }
	</style>
</head>

<body>
	<h1> Αναζητήστε για στοιχεία στη βάση μας </h1>
	<h3> Συμπληρώστε το πεδίο που θέλετε να αναζητήσετε και πατήστε το κουμπί επιλογή! </h3>
    <form action="searchdb.php" method="post" class="form">
        <input type="text" placeholder="Name" name="searchName">
        <button type="submit" name="submitName">Επιλογή</button></br></br></br>
		
		<input type="text" placeholder="Gender" name="searchGender">
        <button type="submitGender" name="submitGender">Επιλογή</button></br></br></br>
		
		<input type="text" placeholder="Email" name="searchEmail">
        <button type="submit" name="submitEmail">Επιλογή</button></br></br></br>
		
		<input type="text" placeholder="Team" name="searchTeam">
        <button type="submit" name="submitTeam">Επιλογή</button></br></br></br>
		
		<input type="text" placeholder="Country" name="searchCountry">
        <button type="submit" name="submitCountry">Επιλογή</button></br></br></br>
		
		
    </form>
	

</body>

</html>

