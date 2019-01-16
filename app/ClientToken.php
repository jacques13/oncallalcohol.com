<?php

require_once '../lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('skr8wydy9hbrff4x');
Braintree_Configuration::publicKey('5wbv6wgb9psxf6bz');
Braintree_Configuration::privateKey('ffc9b581c44ed3c0cef477030e9f9ff2');

$clientToken = Braintree_ClientToken::generate();

$output = "[";
$package = array();
$package["token"] = $clientToken;
$output .= json_encode($package);
$output .="]";
echo $output;
die();

