<!DOCTYPE HTML>  
<html style="background-color:#f0f0f0;">
<head>
<style>
.error {color: #FF0000;}
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
// define variables and set to empty values
$pno = $street = $area = $city = $pcode = "";
$type = $room = $rent = $ono = $bno  = $sno="";
$GLOBALS['flag'] =1;
$pnoE =$streetE = $areaE = $cityE = $pcodeE = "";
$typeE = $roomE = $onoE = $bnoE = $rentE  = $snoE ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag =1;
   if (empty($_POST["sno"])) {
    $snoE = "Sno is required";
	$flag = 0;
  } else {
    $sno = test_input($_POST["sno"]);
    // check if name only contains letters and whitespace
  
  }
  
  if (empty($_POST["pno"])) {
    $streetE = "First Name is required";
	$flag = 0;
  } else {
    $pnoE = test_input($_POST["pno"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$pno)) {
		$flag = 0;
      $pnoE = "Only letters and white space allowed"; 
    }
  }
  
  
    if (empty($_POST["street"])) {
		$flag = 0;
    $streetE = "Last Name is required";
  } else {
    $street = test_input($_POST["street"]);
    // check if name only contains letters and whitespace
   
  }
  if (empty($_POST["area"])) {
	  $flag = 0;
    $areaE = "area is required";
  } else {
    $area = test_input($_POST["area"]);

  }
  if (empty($_POST["city"])) {
    $cityE = "Gender is required";
  } else {
    $city = test_input($_POST["city"]);
  }
  
    if (empty($_POST["pcode"])) {
		$flag = 0;
    $pcodeE = "pcode is required";
  } else {
    $pcode = test_input($_POST["pcode"]);
    // check if name only contains letters and whitespace
   
  }
    if (empty($_POST["room"])) {
		$flag = 0;
    $roomE = "room  is required";
  } else {
    $room = test_input($_POST["room"]);
	$flag = 0;
    // check if name only contains letters and whitespace
  
  }
    if (empty($_POST["rent"])) {
		$flag = 0;
    $rentE = "DOB is required";
  } else {
    $rent = test_input($_POST["rent"]);
    // check if name only contains letters and whitespace
   
  }
  
      if (empty($_POST["type"])) {
		  $flag = 0;
    $typeE = "type is required";
  } else {
    $type = test_input($_POST["type"]);
    // check if name only contains letters and whitespace
  
  }
      if ($_POST["bno"] == 'Select') {
		  $flag = 0;
    $bnoE = "nin is required";
  } else {
    $bno = test_input($_POST["nin"]);
    // check if name only contains letters and whitespace
  
  }
  
        if ($_POST["ono"] == 'Select') {
    $onoE = "Branch No. is required";
  } else {
    $ono = test_input($_POST["ono"]);
    // check if name only contains letters and whitespace
  
  }
  $flag =1;
  }
  


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

<form method="post" style="width: 34%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Property No: <input style="float: right;" type="text" name="pno" value="<?php echo $pno;?>">
  <span class="error">* <?php echo $pnoE;?></span>
  <br><br>
  Street: <input style="float: right;" type="text" name="street" value="<?php echo $street;?>">
  <span class="error">* <?php echo $streetE;?></span>
  <br><br>
  Area: <input style="float: right;" type="text" name="area" value="<?php echo $area;?>">
  <span class="error">* <?php echo $areaE;?></span>
  <br><br>
   City: <input style="float: right;" type="text" name="city" value="<?php echo $city;?>">
  <span class="error">* <?php echo $cityE;?></span>
  <br><br>
 
     Pcode: <input style="float: right;" type="text" name="pcode" value="<?php echo $pcode;?>">
  <span class="error">* <?php echo $pcodeE;?></span>
  <br><br>
  Room Type:
  <br><br>
  <label style="float: right;"  for="typeF"><input id="typeF" type="radio" name="type" <?php if (isset($type) && $type=="flat") echo "checked";?> value="Flat">Flat</label>
  <label style="float: right;"  for="typeH"><input id="typeH" type="radio" name="type" <?php if (isset($type) && $type=="hause") echo "checked";?> value="House">House</label>
  <span style="float: right;" class="error">* <?php echo $typeE;?></span>
  <br><br>
   Rooms: <input style="float: right;" type="number" name="room" value="<?php echo $room;?>">
  <span class="error">* <?php echo $roomE;?></span>
  <br><br>
   Rent: <input style="float: right;" type="text" name="rent" value="<?php echo $rent;?>">
  <span class="error">* <?php echo $rentE;?></span>
  <br><br>
  
  Owner Number: <select style="float: right;" name='ono'>
<option>Select</option>
  <span class="error">* <?php echo $onoE;?></span>
  <br><br>
   <br><br>
    <?php
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				
				$result_id = mysqli_query ($conn_id,"select Ono as Ono from owner")
				or exit ("could not execute query" .mysqli_error($conn_id));
while ($row = mysqli_fetch_array($result_id)) {
echo ("<option>" .$row['Ono']. "</option>");
}

echo ("</select>");

?>
<br>
<br>
<br>
  Staff Number: <select style="float: right;" name='sno'>
<option>Select</option>
  <span class="error">* <?php echo $snoE;?></span>
   <br><br>
    <?php
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				
				$result_id = mysqli_query ($conn_id,"select Sno as Sno from staff")
				or exit ("could not execute query" .mysqli_error($conn_id));
while ($row = mysqli_fetch_array($result_id)) {
echo ("<option>" .$row['Sno']. "</option>");
}

echo ("</select>");

?>
<br>
<br>
<br>
  Branch Number: <select style="float: right;" name='bno'>
<option>Select</option>
  <span class="error">* <?php echo $bnoE;?></span>
  <?php
$localhost = $config['DB_HOST'];
$user = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$database = $config['DB_DATABASE'];
	$conn_id = mysqli_connect ($localhost, $user ,$password)
				or exit("Login Failed " .mysqli_error());
	mysqli_select_db ($conn_id,$database)
				or exit ("Cannot connect to database");
				
				$result_id = mysqli_query ($conn_id,"select Bno as Bno from branch")
				or exit ("could not execute query" .mysqli_error($conn_id));
while ($row = mysqli_fetch_array($result_id)) {
echo ("<option>" .$row['Bno']. "</option>");
}

echo ("</select>");

?>
<br>
<br>
<br>

  <input style="float:right" class="btn"  type="submit" name="submit" value="Submit"> 
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
	if($flag == 1){
   insertData($conn_id);
	}
}
function insertData($conn_id)	
{
	$sql = "INSERT INTO property_for_rent (Pno, Street, Area, City, Pcode, Type, Rooms, Rent, Ono,Sno, Bno)
       
		 VALUES ('".$_POST["pno"]."','".$_POST["street"]."','".$_POST["area"]."','".$_POST["city"]."','".$_POST["pcode"]."','".$_POST["type"]."','".$_POST["room"]."','".$_POST["rent"]."','".$_POST["ono"]."','".$_POST["sno"]."','".$_POST["bno"]."')";
		
if ($conn_id->query($sql) === TRUE) {
    echo("<br><br><br><br><label style='color:#3cb371;font-size: 20px'>New record created successfully</label>");
	echo "<h2>Your Input:</h2>";
					echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
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
echo ("<tr><td> ".$_POST['pno']." </td><td>" . $_POST['street']."</td><td>" . $_POST['area']."</td><td>" . $_POST['city']."</td><td>" . $_POST['pcode']."</td><td>" . $_POST['type']."</td><td>" . $_POST['room']."</td><td>" . $_POST['rent']."</td><td>" . $_POST['ono']."</td><td>" . $_POST['sno']."</td><td>" . $_POST['bno']."</td></tr>");
echo("</table>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>



</body>
</html>