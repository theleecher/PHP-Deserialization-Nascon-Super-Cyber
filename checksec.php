<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST["name"];
	$org_name=$_POST["organization"]; 
	$emp_size=$_POST["employee-size"]; 
	$pen_freq=$_POST["pentesting-frequency"];

include "code.php"; 
$obj = new Data();
$obj->username=$name;
$obj->OrganizationName=$org_name;
$obj->SizeOfOrg=$emp_size;
$obj->PentestFreq=$pen_freq;
$serObj=base64_encode(serialize($obj));
setcookie("session", $serObj, time() + (86400 * 30), "/"); 
header("Location: checksecResults.php");
die();
}
include 'common.php';
?>
<form action="checksec.php" method="post">
	<label for="name">What is your name?</label>
	<input minlength="3" maxlength="50" required type="text" id="name" name="name" required>
	<br>
	<label for="organization">What is your organization name?</label>
	<input minlength="3" maxlength="50" required type="text" id="organization" name="organization" required>
	<br>
	<label for="employee-size">what is the size of your organization?</label>
	<select id="employee-size" name="employee-size">
		<option value="0-10">0-10 employees</option>
		<option value="10-100">10–100 employees</option>
            <option value="100-1000">100–1000 employees</option>
            <option value="1000-more">1000 or more employees</option>
        </select>
		<br>
		<label for="pentesting-frequency">How often do you want to conduct penetration testing?</label>
        <select id="pentesting-frequency" name="pentesting-frequency" required>
            <option value="once-year">Once a year</option>
            <option value="twice-year">Twice a year</option>
            <option value="once-2years">Once every 2 years</option>
            <option value="never">Never</option>
        </select>
		<br>
		<button type="submit">Calculate Security Budget</button>
    </form>
</body>
</html>
<?php
ob_end_flush();
?>