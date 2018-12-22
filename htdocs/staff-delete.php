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
<?php
include 'config.php';
?>
<body>  
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
include 'config.php';
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
    <input type="submit" name="delete" class="btn" value="Delete Record" style="font-size: 16px"><br />
</div>
</form>

<?php
include 'config.php';
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				if (isset($_POST["delete"]))
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
	$sql = "DELETE FROM staff WHERE Sno= '$snoid'";

if ($conn_id->query($sql) === TRUE) {
    echo("<br><br><br><br><label style='color:#3cb371;font-size: 20px'>Record Deleted successfully</label>");
} else {
    echo("Error deleting record: " . $conn_id->error);
}

}
?>

  



</body>
</html>