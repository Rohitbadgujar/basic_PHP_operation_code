<!DOCTYPE HTML>  
<html>

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
$pno = $street = $area = $city = $pcode = "";
$type = $room = $rent = $ono = $bno  = $sno= "";
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
$result_id = mysqli_query ($conn_id,'select * from property_for_rent')
or exit ("could not execute query" .mysqli_error($link));
echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Select Record to Updates </th>");
echo("<th>Pno </th>");
echo("<th>Street </th>");
echo("<th>Area </th>");
echo("<th>City </th>");
echo("<th>Pcode No </th>");

echo("<th>Type </th>");
echo("<th>Rooms </th>");
echo("<th>Rent </th>");
echo("<th>Ono </th>");
echo("<th>Sno </th>");
echo("<th>Bno </th>");
while ($row = mysqli_fetch_array($result_id, MYSQLI_BOTH))
{
echo ("<tr><td style='width:9%'><input type='radio' id='d-update' name='pnid' value = ".$row['Pno']."></td><td> ".$row['Pno']." </td><td>" . $row['Street']."</td><td>" . $row['Area']."</td><td>" . $row['City']."</td><td>" . $row['Pcode']."</td><td>" . $row['Type']."</td><td>" . $row['Rooms']."</td><td>" . $row['Rent']."</td><td>" . $row['Ono']."</td><td>" . $row['Sno']."</td><td>" . $row['Bno']."</td></tr>");
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
	if(isset($_POST["pnid"])){
	$pnid = $_POST["pnid"];
	
   updateRecordSelected($conn_id,$pnid);
	}
	else{
	echo("<br><br><label style='color:red;font-size: 20px'>Please select record to be updated</label>");
	}
}
function updateRecordSelected($conn_id,$pnid)
{
	$result_id = mysqli_query ($conn_id,"select Pno, Street,City,Area,Rooms,Rent,Type from property_for_rent where Pno = '$pnid'")
				or exit ("could not execute query" .mysqli_error($conn_id));
	if ($row = mysqli_fetch_row ($result_id))
	{
		$GLOBALS['pn'] = $row[0];
		$GLOBALS['st'] = $row[1];
		$GLOBALS['ci'] = $row[2];
		$GLOBALS['ar'] = $row[3];
		$GLOBALS['rm'] = $row[4];
		$GLOBALS['rt'] = $row[5];
		$GLOBALS['ty'] = $row[6];
	}

	mysqli_free_result ($result_id);
}
?>

<form method="post" style="width: 34%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Property Number: <input style="float: right;" type="text" name="prno" value="<?php  if (!empty($pn)) { echo $pn;}?>">
  <br><br>
  Street: <input style="float: right;" type="text" name="street" value="<?php if (!empty($st)) { echo $st;} ?>">
  <br><br>
  City Name: <input style="float: right;" type="text" name="city" value="<?php if (!empty($ci)) { echo $ci;} ?>">
  <br><br>
  Area : <input style="float: right;" type="text" name="area" value="<?php if (!empty($ar)) { echo $ar;} ?>">
  <br><br>
  Rooms Available : <input style="float: right;" type="room" name="room" value="<?php if (!empty($rm)) { echo $rm;} ?>">
  <br><br>
  Rent: <input style="float: right;" type="number" name="rent" value="<?php if (!empty($rt)) { echo $rt;} ?>">
  <br><br>
   Room Type: <input style="float: right;" type="text" name="type" value="<?php if (!empty($ty)) { echo $ty;} ?>">
  <br><br>
  <input class="btn" type="submit" name="update" value="Update">  
</form>
  <?php
if (isset($_POST["update"]))
{
	$pno = $_POST["prno"];
	$area = $_POST["area"];
	$city = $_POST["city"];
	$street = $_POST["street"];
	$room = $_POST["room"];
	$rent = $_POST["rent"];
	$type = $_POST["type"];
	if(empty($pno)){
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
				$result_id = mysqli_query ($conn_id,"update property_for_rent set Pno =  '$pno',Street =  '$street' ,Area = '$area' ,City =  '$city' ,Rooms =  '$room' , Rent = '$rent', Type = '$type' WHERE Pno= '$pno'")
				
				or exit ("could not execute query" .mysqli_error($conn_id));
				echo("Updated Succesfully");
				
				header("Location: property-update.php");
				
				
}
?>
  



</body>
</html>