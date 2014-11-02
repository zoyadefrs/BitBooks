<?php
#GLOBALS
$_gCLIENT_ID = "08be435839fa3aea6c41aefd417bfd3b0b68610f32952cdb4a9032437831961d"; 
$_gCLIENT_SECRET = "cb395eb92796a496be3760af79fae9f5b535cdd913efa03a57d81bfb6d54a182";
$_gREDIRECT_URL = "https://localhost/work/yhack";

function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>