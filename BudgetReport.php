<?php
include "common1.php";
include "code.php";

$cookie_name = "session";

if (!isset($_COOKIE[$cookie_name])) {
    echo "Set the cookie first";
    return;
}

$obj = unserialize(base64_decode($_COOKIE[$cookie_name]));

echo '
<div class="card">
    <h2>Dear ' . htmlspecialchars($obj->username) . ',</h2>
    <p>The budget needed in your organization <span style="color: blue;">' . htmlspecialchars($obj->OrganizationName) . '</span> to setup security solutions is</p> 
    <p class="score">' . rand(1988, 100000) . ' $</p>
</div>';
?>
