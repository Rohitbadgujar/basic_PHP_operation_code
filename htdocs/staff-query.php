<!DOCTYPE HTML>  
<html style="background-color:#f0f0f0;">
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.btn {
  background-color: #555555; /* Green */
  border: none;
  color: white;
  padding: 6px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
include 'config.php';
// define variables and set to empty values
$nameErr = $lastname = $salary = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div style="width:100%;height:20%">
 <div style="width:50%;float:left"><label style="font-size: 40px;color: darksalmon;">Dream House Database Operation: </label></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <input class="button" type="submit" name="navigatetoHome" value="Navigate to Home">  
 </form>
 </div>
 <?php
 if (isset($_POST['navigatetoHome']))
{
 header("Location: index.html");  
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <br><br> Find the name corresponding to a staff number: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  <input class="btn" type="submit" name="submit" value="Submit">  
</form>

<?php
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				if (isset($_POST['submit']))
{
   searchbyId($conn_id);
}

function searchbyId($conn_id)
{
	$name = test_input($_POST["name"]);
	if(empty($name)){
		echo("Please enter SNo!!");

	}
	else{
	$result_id = mysqli_query ($conn_id,"select count(*) from staff where Sno = '$name'")
				or exit ("could not execute query" .mysqli_error($conn_id));
	if ($row = mysqli_fetch_row ($result_id))
			echo ("<p> There are currently ".$row[0]. " staff members");
	mysqli_free_result ($result_id);
	}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <br><br>Find the address & phone for a given last name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
  
  <br><br>
  <input class="btn" type="submit" name="findbylastname" value="Submit">  
</form>

<?php
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				if (isset($_POST['findbylastname']))
{
   searchbylastName($conn_id);
}
function searchbylastName($conn_id)
{
	$lastname = test_input($_POST["lastname"]);
	if(empty($lastname)){
		echo("Please enter Last Name!!");

	}
	else{
	$result_id = mysqli_query ($conn_id,"select Address,Tel_No from staff where LName = '$lastname'")
				or exit ("could not execute query" .mysqli_error($conn_id));
				echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Address </th>");
echo("<th>Telephone No </th>");
echo("</tr>");
	while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{
    //echo "Address: " . $row["Address"] . " and Tel Phone No.: " . $row["Tel_No"];
	echo ("<tr><td> ".$row['Address']." </td><td>" . $row['Tel_No']."</td></tr>");
}
echo("</table>");
	mysqli_free_result ($result_id);
}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <br><br>Find the staff number, last name and first name of those earning more/less than a given
salary <input type="text" name="salary" value="<?php echo $salary;?>">
  
  <br><br>
  <input class="btn" type="submit" name="findbySalary" value="Submit">  
</form>

<?php

$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				if (isset($_POST['findbySalary']))
{
   searchbySalaryGreater($conn_id);
   searchbySalaryLess($conn_id);
}
function searchbySalaryGreater($conn_id)
{
	$salary = test_input($_POST["salary"]);
	if(empty($salary)){
		echo("Please enter Salary!!");
	}
	else{
	$result_id = mysqli_query ($conn_id,"select Sno,FName, LName from staff where Salary > $salary")
				or exit ("could not execute query" .mysqli_error($conn_id));
				echo "<br><b>Salary Greater than " . $salary . "</b><br><br>";
				echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Sno </th>");
echo("<th>First Name </th>");
echo("<th>Last Name </th>");
echo("</tr>");
	while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{
   //echo "Sno: " . $row["Sno"] . "  First Name: " . $row["FName"]  . "  Last Name: " . $row["LName"] . "<br><br>";
   echo ("<tr><td> ".$row['Sno']." </td><td>" . $row['FName']."</td><td>" . $row['LName']."</td></tr>");
}
echo("</table>");
	mysqli_free_result ($result_id);
	}
}
function searchbySalaryLess($conn_id)
{
	$salary = test_input($_POST["salary"]);
	if(empty($salary)){
		echo("Please enter Salary!!");

	}
	else{
	$result_id = mysqli_query ($conn_id,"select Sno, LName, FName from staff where Salary < $salary")
				or exit ("could not execute query" .mysqli_error($conn_id));
				echo "<br><b>Salary Less than " . $salary . "</b><br><br>";
								echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Sno </th>");
echo("<th>First Name </th>");
echo("<th>Last Name </th>");
echo("</tr>");
	while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{
    echo ("<tr><td> ".$row['Sno']." </td><td>" . $row['FName']."</td><td>" . $row['LName']."</td></tr>");
}
echo("</table>");
	mysqli_free_result ($result_id);
	}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <br><br>Find the address of the branch employing a staff member : 
  <input class="btn" type="submit" name="findbranchaddress" value="Submit">   <br><br>
</form>

<?php

$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				if (isset($_POST['findbranchaddress']))
{
   searchbranchAddress($conn_id);
}
function searchbranchAddress($conn_id)
{
	$result_id = mysqli_query ($conn_id,"select s.FName as FName, s.LName as LName, b.Street as Street, b.Area as Area , b.City as City, b.Pcode as Pcode from staff s JOIN branch b on s.Bno = b.Bno")
				or exit ("could not execute query" .mysqli_error($conn_id));
					echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>First Name </th>");
echo("<th>Last Name </th>");
echo("<th>Branch Address </th>");

echo("</tr>");
	while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{
   
	echo ("<tr><td>" . $row['FName']."</td><td>" . $row['LName']."</td><td>" . $row["Street"] . ", " . $row["Area"]. " , " .$row["City"]." , " .$row["Pcode"] ."</td></tr>");
}
echo("</table>");
	mysqli_free_result ($result_id);
}
?>

</body>
</html>