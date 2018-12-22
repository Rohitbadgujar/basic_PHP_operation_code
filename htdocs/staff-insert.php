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
$sno = $fname = $lname = $address = $telno = "";
$salary = $dob = $gender = $position = $nin  = $sex = $bno ="";
$GLOBALS['flag'] =1;
$snoE =$fnameE = $lnameE = $addressE = $telnoE = "";
$salaryE = $dobE = $genderE = $positionE = $ninE  = $sexE = $bnoE = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag =1;
   if (empty($_POST["sno"])) {
    $snoE = "Sno is required";
	$flag = 0;
  } else {
    $sno = test_input($_POST["sno"]);
    // check if name only contains letters and whitespace
  
  }
  
  if (empty($_POST["fname"])) {
    $fnameE = "First Name is required";
	$flag = 0;
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
		$flag = 0;
      $fnameE = "Only letters and white space allowed"; 
    }
  }
  
  
    if (empty($_POST["lname"])) {
		$flag = 0;
    $lnameE = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
		$flag = 0;
      $lnameE = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["address"])) {
	  $flag = 0;
    $addressE = "Address is required";
  } else {
    $address = test_input($_POST["address"]);

  }
  if (empty($_POST["sex"])) {
    $sexE = "Gender is required";
  } else {
    $sex = test_input($_POST["sex"]);
  }
  
    if (empty($_POST["position"])) {
		$flag = 0;
    $positionE = "Address is required";
  } else {
    $position = test_input($_POST["position"]);
    // check if name only contains letters and whitespace
   
  }
    if (empty($_POST["telno"])) {
		$flag = 0;
    $telnoE = "Telephone No. is required";
  } else {
    $telno = test_input($_POST["telno"]);
	$flag = 0;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9 ]*$/",$telno)) {
		$flag = 0;
      $telnoE = "Please Enter Numeric Value!!"; 
    }
  }
    if (empty($_POST["dob"])) {
		$flag = 0;
    $dobE = "DOB is required";
  } else {
    $dob = test_input($_POST["dob"]);
    // check if name only contains letters and whitespace
   
  }
  
      if (empty($_POST["salary"])) {
		  $flag = 0;
    $salaryE = "Salary is required";
  } else {
    $salary = test_input($_POST["salary"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$salary)) {
		$flag = 0;
       $salaryE = "Please Enter Numeric Value!!"; 
    }
  }
      if (empty($_POST["nin"])) {
		  $flag = 0;
    $ninW = "nin is required";
  } else {
    $nin = test_input($_POST["nin"]);
    // check if name only contains letters and whitespace
  
  }
  
        if ($_POST["bno"] == 'Select') {
    $bnoE = "Branch No. is required";
  } else {
    $bno = test_input($_POST["bno"]);
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
  Staff No: <input style="float: right;" type="text" name="sno" value="<?php echo $sno;?>">
  <span class="error">* <?php echo $snoE;?></span>
  <br><br>
  First Name: <input style="float: right;" type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameE;?></span>
  <br><br>
  Last Name: <input style="float: right;" type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameE;?></span>
  <br><br>
   Address: <input style="float: right;" type="text" name="address" value="<?php echo $address;?>">
  <span class="error">* <?php echo $addressE;?></span>
  <br><br>
  Sex:
  <br><br>
  <label style="float: right;"  for="genderF"><input id="genderF" type="radio" name="sex" <?php if (isset($sex) && $sex=="Female") echo "checked";?> value="female">Female</label>
  <label style="float: right;"  for="genderM"><input id="genderM" type="radio" name="sex" <?php if (isset($sex) && $sex=="Male") echo "checked";?> value="male">Male</label>
  <span style="float: right;" class="error">* <?php echo $sexE;?></span>
  <br><br>
     Position: <input style="float: right;" type="text" name="position" value="<?php echo $position;?>">
  <span class="error">* <?php echo $positionE;?></span>
  <br><br>
  Telephone No: <input style="float: right;" type="text" name="telno" value="<?php echo $telno;?>">
  <span class="error">* <?php echo $telnoE;?></span>
  <br><br>
   DOB: <input style="float: right;" type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobE;?></span>
  <br><br>
   Salary: <input style="float: right;" type="text" name="salary" value="<?php echo $salary;?>">
  <span class="error">* <?php echo $salaryE;?></span>
  <br><br>
     NIN: <input style="float: right;" type="text" name="nin" value="<?php echo $nin;?>">
  <span class="error">* <?php echo $ninE;?></span>
  <br><br>
  Select Branch: <select style="float: right;" name='bno'>
<option>Select</option>
  <span class="error">* <?php echo $bnoE;?></span>
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
	$sql = "INSERT INTO staff (Sno, FName, LName, Address, Tel_No, Position, Sex, DOB, Salary,NIN, Bno)
       
		 VALUES ('".$_POST["sno"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["address"]."','".$_POST["telno"]."','".$_POST["position"]."','".$_POST["sex"]."','".$_POST["dob"]."','".$_POST["salary"]."','".$_POST["nin"]."','".$_POST["bno"]."')";
		
if ($conn_id->query($sql) === TRUE) {
    echo("<br><br><br><br><label style='color:#3cb371;font-size: 20px'>New record created successfully</label>");
	echo "<h2>Your Input:</h2>";
					echo("<table border='2'>");
echo("<tr style='background-color: darkcyan'>");
echo("<th>Sno </th>");
echo("<th>First Name </th>");
echo("<th>Last Name </th>");
echo("<th>Address </th>");
echo("<th>Telephone No </th>");
echo("<th>Position </th>");
echo("<th>Sex </th>");
echo("<th>DOB </th>");
echo("<th>Salary </th>");
echo("<th>NIN </th>");
echo("<th>Bno </th>");
echo ("<tr><td> ".$_POST['sno']." </td><td>" . $_POST['fname']."</td><td>" . $_POST['lname']."</td><td>" . $_POST['address']."</td><td>" . $_POST['telno']."</td><td>" . $_POST['position']."</td><td>" . $_POST['sex']."</td><td>" . $_POST['dob']."</td><td>" . $_POST['salary']."</td><td>" . $_POST['nin']."</td><td>" . $_POST['bno']."</td></tr>");
echo("</table>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>



</body>
</html>