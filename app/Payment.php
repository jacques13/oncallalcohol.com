<?php

require_once '../lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('skr8wydy9hbrff4x');
Braintree_Configuration::publicKey('5wbv6wgb9psxf6bz');
Braintree_Configuration::privateKey('ffc9b581c44ed3c0cef477030e9f9ff2');


$nonceFromTheClient = $_GET["payment_method_nonce"];
$amount = $_GET['amount'];

$result = Braintree_Transaction::sale([
  'amount' => $amount,
  'paymentMethodNonce' => $nonceFromTheClient,
  'options' => [
    'submitForSettlement' => True
  ]
]);
if($result->success){
	$output = "[";
	$package = array();
	$package["result"] = 'true';
	$output .= json_encode($package);
	$output .="]";
	
	echo $output;
	}else{
	$output = "[";
	$package = array();
	$package["result"] = 'false';
	$output .= json_encode($package);
	$output .="]";
	  print_r($result->errors);
	echo $output;
	}
		


?>