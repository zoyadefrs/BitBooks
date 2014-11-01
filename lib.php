<?php
#GLOBALS
$_gCLIENT_ID = "4dbc3a46bcd1fce37259e5a715da8c513ab69f4366adc2155068f4caeb2f2ef3"; 
$_gCLIENT_SECRET = "2ac72ec6461e08f003cd4799aa94a6544d72005be20efc9ed2266d95ab6c223a";
$_gREDIRECT_URL = "https://localhost";

function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>