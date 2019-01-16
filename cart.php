<?php 
require_once './lib/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('skr8wydy9hbrff4x');
Braintree_Configuration::publicKey('5wbv6wgb9psxf6bz');
Braintree_Configuration::privateKey('ffc9b581c44ed3c0cef477030e9f9ff2');

session_start();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$qty = $_GET['qty'];
	$wasFound = false;
	$i=0;
	if(!isset($_SESSION['cart'])	||count($_SESSION['cart'])<1){
		$_SESSION['cart']= array(1=>array("item_id"=>$id,"quantity"=>$qty));
	}else{
		foreach ($_SESSION["cart"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $id) {
					  array_splice($_SESSION["cart"], $i-1, 1, array(array("item_id" => $id, "quantity" => $each_item['quantity'] + $qty)));
					  $wasFound = true;
				  } 
		      } 
	       }
		   if ($wasFound == false) {
			   array_push($_SESSION["cart"], array("item_id" => $id, "quantity" => $qty));
		   }
	}
}
?>
<?php
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart"]);
} 
?>

<?php 
$cartOutput = "";
$amount = 0;
$totalItems= 0;
$amountForItem = 0;
if(!isset($_SESSION['cart'])||count($_SESSION['cart'])<1){
$cartOutput = "	<h2>empty cart</h2>";
}else{
$i= 0 ;
$tempId = "";
	foreach($_SESSION['cart'] as $each_item){
		$i++;
		$cartOutput .= '';
		while(list($key, $value) = each($each_item)){
			//$cartOutput .= '<li style="margin:2rem;" ><a href="#" class="cartItem">'.$key.' '.$value.'</a></li>';
			if($key == 'item_id'){
				$tempId =$value; 
			} else if($key == 'quantity'){
				switch ($tempId) {
					case "1":
						$amountForItem = 15*$value;
						$amount = $amount + $amountForItem;
						$totalItems = $totalItems+$value;
						$cartOutput .= '<li style="margin:2rem;" ><a href="#" class="cartItem">BlackLabel R15x'.$value.' Total:'.$amountForItem.'</a></li>';
						break;
					case "2":
						$amountForItem = 20*$value;
						$amount = $amount + $amountForItem;
						$totalItems = $totalItems+$value;
						$cartOutput .= '<li style="margin:2rem;" ><a href="#" class="cartItem">Castle R20x'.$value.' Total:'.$amountForItem.'</a></li>';
						
						break;
					case "3":
						$amountForItem = 25*$value;
						$amount = $amount + $amountForItem;
						$totalItems = $totalItems+$value;
						$cartOutput .= '<li style="margin:2rem;" ><a href="#" class="cartItem">Amstel R25x'.$value.' Total:'.$amountForItem.'</a></li>';
						
						break;
					case "4":
					$amountForItem = 40*$value;
					$amount = $amount + $amountForItem;
					$totalItems = $totalItems+$value;
					$cartOutput .= '<li style="margin:2rem;" ><a href="#" class="cartItem">Special R40x'.$value.' Total:'.$amountForItem.'</a></li>';
					
					break;
				}
			}
		}
	}
	
		
}
if(isset($_SESSION['cart'])){
$cartOutput.='
						<li style="margin:3rem;"><a href="#" class="cartTotal">items:'.$totalItems.' </a></li>
						<li style="margin:3rem;"><a href="#" class="cartTotal">amount:R'.$amount.'</a></li> 
						<li><button  class="cartRemove" value="Remove Contents Of Cart">Remove Contents Of Cart</button></li> 
						<div id="Payment" style="margin:1rem;"></div>
						<form id="checkout-form">
						  <input class="payment_button cartButton" type="submit" value="Pay"/>
						</form>	';
						//<li><button class="cartButton">Check out</button></li>
}
echo $cartOutput;
if(isset($_GET['paymentNonce'])){
$result = Braintree_Transaction::sale([
  'amount' => $amount,
  'paymentMethodNonce' => $_GET['paymentNonce'],
  'options' => [
    'submitForSettlement' => True
  ]
]);
echo $result->success;
}
?>