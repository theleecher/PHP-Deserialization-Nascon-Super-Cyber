<?php
include "common.php";
include "code.php";

	$cookie_name = "session";
	if(!isset($_COOKIE [$cookie_name])){ 
		echo "Set the cookie first ";
		return;
	}

$obj=unserialize(base64_decode($_COOKIE [$cookie_name]));
$obj->PrintData();
	echo '
	<div class="card">
	<h2>Dear '.$obj->username.',</h2>
	<p>The Security score of your organization <span style="color: blue;">'.$obj->OrganizationName.'</span> is</p> 
	<p class="score">'.rand(1, 100). '% </p>
</div>';

?>
