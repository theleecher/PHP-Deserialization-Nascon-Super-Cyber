<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name=$_POST["name"];
	$org_name=$_POST["organization"]; 
	$emp_size=$_POST["employee-size"]; 
	$pen_freq=$_POST["pentesting-frequency"];


	include "code.php";
	$obj = new Data(); 
	$obj->username=$name;
	$obj->OrganizationName=$org_name; 
	$obj->sizeoforg=$emp_size;
	$obj->PentestFreq=$pen_freq;

$serObj=base64_encode(serialize($obj));

$cookie_name = "session";
$cookie_value = $serObj;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

header("Location: Budget Report.php");
die();
}

include 'common1.php'; ?>
<html>
<body>
<form action="CalculateBudget.php" method="post"> 
	<label for="name">What is your name?</label>
	<input minlength="3" maxlength="50" required type="text" id="name" name="name" required>

	<label for="organization">What is your organization name?</label>
	<input minlength="3" maxlength="50" required type="text" id="organization" name="organization" required>

	<label for="employee-size">What is the size of your organization?</label> 
	<select id="employee-size" name="employee-size">
		<option value="0-10">0-10 employees</option>
		<option value="10-100">10-100 employees</option> <option value="100-1000">100-1000 employees</option>
		<option value="1000-more">1000 or more employees</option> 
	</select>

<br>
	<label>Which of the following solutions You want to deploy in your organization?</label>
	<div>
		<input type="checkbox" id="IDS" name="solutions-deployed" value="IDS"> 
		<label for="IDS">Intrusion Detection System (IDS)</label>

		<input type="checkbox" id="Firewall" name="solutions-deployed" value="Firewall"> 
		<label for="Firewall">Firewall</label>

		<input type="checkbox" id="IPS" name="solutions-deployed" value="IPS"> 
		<label for="IPS">Intrusion Prevention System (IPS)</label>

		<input type="checkbox" id="SIEM" name="solutions-deployed" value="SIEM"> 
		<label for="SIEM">Security Information and Event Management (SIEM)</label> 
		</div>
<br>
	<label for="pentesting-frequency">How many times do you want to conduct penetration testing?</label> 
	<select id="pentesting-frequency" name="pentesting-frequency">
		<option value="once-year">Once a year</option>
		<option value="twice-year">Twice a year</option>
		<option value="once-2years">Once every 2 years</option> <option value="never">Never</option>
	</select>
	<button type="submit">Calculate the Security budget of Your Organization</button>
	</form>
</body>
</html>
<?php
ob_end_flush();
?>
