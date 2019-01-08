<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if(isset($method) && $method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'ส':
			$speech = "Hi, Nice to meet you";
			break;

		case 'ด':
			$speech = "Bye, good night";
			break;

		case 'อ':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = $text;
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>