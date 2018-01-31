<?php
// the message



$admin_email = "navjot@ourdesingz.com";
  $email = 'navjot@ourdesingz.com';
  $subject = 'sasaa';
  $comment = 'saa';
  
  //send email
  if( mail($admin_email, "$subject", $comment, "From:" . $email))
  {
  //Email response
  echo "Thank you for contacting us!";
  
}
else {
	"ddd";
}
?>
