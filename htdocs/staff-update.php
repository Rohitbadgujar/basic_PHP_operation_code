<!DOCTYPE HTML>  
<html>
<head>

<style>
.error {color: #FF0000;}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
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
</style>
</head>
<body>  
<?php
include 'config.php';
?>
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
<?php

$sno = $fname = $lname = $address = $telno =  "";
$salary = $dob = $gender = $position = $nin  = $sex = $bno = "";
tablecontent();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function tablecontent(){
	include 'config.php';
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
 or exit ("Cannot connect to database");
$result_id = mysqli_query ($conn_id,'select * from staff')
or exit ("could not execute query" .mysqli_error($link));
echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Select Record to Updates </th>");
echo("<th>First Name </th>");
echo("<th>Last Name </th>");
echo("<th>Address </th>");
echo("<th>DOB </th>");
echo("<th>Tel No </th>");
echo("</tr>");
while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{

echo ("<tr><td style='width:9%'><input type='radio' id='d-update' name='snoid' value = ".$row['Sno']."></td><td> ".$row['FName']." </td><td>" . $row['LName']."</td><td>" . $row['Address']."</td><td>" . $row['DOB']."</td><td>" . $row['Tel_No']."</td></input><tr>");
}
echo("</table>");

mysqli_free_result ($result_id);
}
?>

<div class="subscribe">
    <input type="submit" name="submit" class="btn" value="Go" style="font-size: 16px"><br />
</div>
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
				if (isset($_POST["submit"]))
{
	

   	if(isset($_POST["snoid"])){
	$snoid = $_POST["snoid"];
	
   updateRecordSelected($conn_id,$snoid);
	}
	else{
	echo("<br><br><label style='color:red;font-size: 20px'>Please select record to be updated</label>");
	}
}
function updateRecordSelected($conn_id,$snoid)
{
	$result_id = mysqli_query ($conn_id,"select FName as FName, Sno as Sno,LName,DOB,Address,Tel_No from staff where Sno = '$snoid'")
				or exit ("could not execute query" .mysqli_error($conn_id));
	if ($row = mysqli_fetch_row ($result_id))
	{
		$GLOBALS['fn'] = $row[0];
		$GLOBALS['sn'] = $row[1];
		$GLOBALS['ln'] = $row[2];
		$GLOBALS['dob'] = $row[3];
		$GLOBALS['add'] = $row[4];
		$GLOBALS['tel'] = $row[5];
	}

	mysqli_free_result ($result_id);
}
?>

<form method="post" style="width: 34%;"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Staff No: <input  style="float: right;" type="text" name="srno" value="<?php  if (!empty($sn)) { echo $sn;}?>">
  <br><br>
  First Name: <input  style="float: right;" type="text" name="firstname" value="<?php if (!empty($fn)) { echo $fn;} ?>">
  <br><br>
  Last Name: <input  style="float: right;" type="text" name="lastname" value="<?php if (!empty($ln)) { echo $ln;} ?>">
  <br><br>
  Address : <input   style="float: right;"type="text" name="add" value="<?php if (!empty($add)) { echo $add;} ?>">
  <br><br>
  DOB : <input   style="float: right;"type="date" name="birth" value="<?php if (!empty($dob)) { echo $dob;} ?>">
  <br><br>
  Tel No: <input  style="float: right;" type="text" name="tel" value="<?php if (!empty($tel)) { echo $tel;} ?>">
  <br><br>
  <input class="btn" type="submit" name="update" value="Update">  
</form>
 <?php
if (isset($_POST["update"]))
{
	$sno = $_POST["srno"];
	$fname = $_POST["firstname"];
	$lname = $_POST["lastname"];
	$address = $_POST["add"];
	$dob = $_POST["birth"];
	$telno = $_POST["tel"];
	if(empty($sno)){
		echo("<br><br><label style='color:red;font-size: 20px'>Please select record to be updated</label>");
		exit;
	}
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				$result_id = mysqli_query ($conn_id,"update staff set FName =  '$fname',LName =  '$lname' ,Address = '$address' ,DOB =  '$dob' ,Tel_No =  '$telno' WHERE Sno= '$sno'")
				
				or exit ("could not execute query" .mysqli_error($conn_id));
				echo("Updated Succesfully");
				header("Location: staff-update.php");				
}?>
  
</body>
</html>