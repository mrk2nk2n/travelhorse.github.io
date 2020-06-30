<?php include("/hiddenFile.php");
$password = PASSWORD;
$username = USERNAME;
?>

<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'partnerships@travelhorse.co';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_phone = $_POST['phone'];
  $contact->from_email = $_POST['email'];
  $contact->subject = "Enquiry";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.zoho.com',
    'username' => $username,
    'password' => $password,
    'port' => '465'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_phone = ( $_POST['phone]', 'Contact');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_outlet = ( $_POST['outlet'], 'Outlet');
  $contact->add_comments = ( $_POST['message'], 'Message');
  echo $contact->send();
?>
