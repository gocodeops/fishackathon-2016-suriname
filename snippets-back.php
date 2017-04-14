<?php
	
	function send_email($email_to, $email_subject, $email_message, $email_from){
	    $to      = $email_to;
	    $subject = $email_subject;
	    $message = $email_message;
	    $headers = $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	    
	    mail($to, $subject, $message, $headers);
	}




	// Auth
	$servername	= "localhost";
	$username	= "";
	$password	= "";
	$database	= "";

	// make connection
	$conn	= new mysqli($servername, $username, $password, $database);
	// check for errors
	if ($conn->connect_error) {	die("Error: " . $conn->connect_error); }




	// make query
	$query = "SELECT * FROM table";
	// result query
	$result = $conn->query($query);

	$array = array();
	while ($data = $result->fetch_assoc()) {
	    // array push $data -> $array
	    $array[] = $data;
	}
	// convert teh $array into JSON data
	$array = json_encode($array);
	print_r($array);
?>