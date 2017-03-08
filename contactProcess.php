<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

if(isset($_POST['email'])) {
//  echo "started";
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "preferredsnow@gmail.com";
    $email_subject = "Test Email Contact Form";


    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        //die();
    }

    // validation expected data exists
    if(!isset($_POST['emergency']) ||
		!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        !isset($_POST['address1']) ||
		!isset($_POST['address2']) ||
		!isset($_POST['zip']) ||
		!isset($_POST['phone']) ||
		!isset($_POST['phone2']) ||
		!isset($_POST['phone3']) ||
        !isset($_POST['comments'])) {
       // died('We are sorry, but there appears to be a problem with the form you submitted.');
    }
   $emergency = $_POST['emergency']; // required
  $first = $_POST['firstName']; // required
  $last = $_POST['lastName']; // required
  $email = $_POST['email']; // required
  $phone1 = $_POST['phone']; // required
	$phone2 = $_POST['phone2']; // required
	$phone3 = $_POST['phone3']; // required
	$zip = $_POST['zip']; // required
  $city = $_POST['city']; // required
	$address1 = $_POST['address1']; // required
	$address2 = $_POST['address2']; // required
	$residential = $_POST['resident']; // required	
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email)) {
   // $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first)) {
    //$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last)) {
    //$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    //$error_message .= 'The comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    //died($error_message);
  }
    $message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	$message .= "Emergency?: ".clean_string($emergency)."\n";
    $message .= "First Name: ".clean_string($first)."\n";
    $message .= "Last Name: ".clean_string($last)."\n";
    $message .= "Email: ".clean_string($email)."\n";
	  $message .= "Address: ".clean_string($address1)."\n";
	  $message .= "Address2: ".clean_string($address2)."\n";
	  $message .= "City: ".clean_string($city)."\n";
	  $message .= "Zip Code: ".clean_string($zip)."\n";
    $message .= "Telephone: ".clean_string($phone1). "-" .clean_string($phone2). "-" .clean_string($phone3)."\n";
    $message .= "comments: ".clean_string($comments)."\n";


// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $message, $headers);

header('Location: thankyou.html');

?>

<!-- include your own success html here -->

<?php
}
?>

