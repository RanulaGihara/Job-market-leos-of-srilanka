<!DOCTYPE html>

<head>
	<title>Register</title>
	<link href="css/class.css" rel="stylesheet">
</head>

<body>

	<?php

	session_start();

	include("heade-plus.php");

	?>

	<br />
	<h2 id="subj_section_header">Enroll as a New Student</h2>

	<br />
	<a href="login.php"><button class="regbtn">Log In Instead?</button></a>

	<form action="" method="post">

		<table>
			<tr>
				<td> <label class="form_input_label" for="fname"><b>First Name</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter First Name" name="fname" required> </td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="lname"><b>Last Name</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter Last Name" name="lname" required> </td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="phone"><b>Phone Number</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter Personal Phone Number" name="phone" required> </td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="batch"><b>Leo Club Name</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter AL Batch" name="club" required> </td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="mail"><b>E-mail</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter E-mail" name="mail" required> </td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="gender"><b>Gender</b></label> </td>
				<td>
					<select class="form_input" width="300px" name="gender">
						<option class="form_input" value="male">Male</option>
						<option class="form_input" value="female">Female</option>
					</select>
				</td>
			</tr>

			<tr>
				<td> <label class="form_input_label" for="school"><b>Work Place</b></label> </td>
				<td> <input class="form_input" type="text" placeholder="Enter Workplace" name="workplace" required> </td>
			</tr>

			<tr>
				<td><label class="form_input_label" for="address"><b>Degree</b></label> </td>
				<td><input class="form_input" type="text" placeholder="Degree" name="Degree" required> </td>
			</tr>

			<tr>
				<td><label class="form_input_label" for="guardianName"><b>Job Position</b></label> </td>
				<td><input class="form_input" type="text" placeholder="Enter Job Position" name="position" required> </td>
			</tr>

			<tr>
				<td><label class="form_input_label" for="password"><b>Password</b></label></td>
				<td><input class="form_input" type="password" placeholder="Enter Password" name="password" required></td>
			</tr>
		</table>

		<input type="hidden" name="action" value="signup">
		<button type="submit">Register</button>

	</form>



	<?php


	include_once 'lsc/connect-main.php';

	@session_start();


	if (isset($_POST["action"])) {

		$fname =  $_POST["fname"];
		$lname = $_POST["lname"];
		$num = $_POST["phone"];
		$mail = $_POST["mail"];
		$gender = $_POST["gender"];
		$club = $_POST["club"];
		$workplace = $_POST["workplace"];
		$position = $_POST["position"];
		$pass = $_POST["password"];




		$sql = "INSERT INTO members(fname, lname,num, email, gender, club, workplace, position, password) 
		VALUES ('$fname', '$lname','$num', '$mail',  '$gender', '$club', '$workplace', '$position', '$password')";

		$result = $conn->query($sql);



		$sql_person = "INSERT INTO users(email, password) VALUES ('$mail','$password')";

		$result = $conn->query($sql_person);


		if ($result)
			echo "Please log in to continue";
	}



	$conn->close();


	include("footer.php");

	?>

</body>