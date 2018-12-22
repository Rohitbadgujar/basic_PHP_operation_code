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
	if(isset($_POST["pnid"])){
	$pnid = $_POST["pnid"];
	
   updateRecordSelected($conn_id,$pnid);
	}
	else{
	echo("<br><br><br><br><label style='color:red;font-size: 20px'>Please select record to be deleted</label>");
	}
}
function updateRecordSelected($conn_id,$pnid)
{
	$sql = "DELETE FROM property_for_rent WHERE Pno= '$pnid'";

if ($conn_id->query($sql) === TRUE) {
    echo("<br><br><br><br><label style='color:#3cb371;font-size: 20px'>Record Deleted successfully</label>");
} else {
    echo("Error deleting record: " . $conn_id->error);
}

}
?>

  



</body>
</html>