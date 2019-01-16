<?php 
session_start();


require_once './lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('skr8wydy9hbrff4x');
Braintree_Configuration::publicKey('5wbv6wgb9psxf6bz');
Braintree_Configuration::privateKey('ffc9b581c44ed3c0cef477030e9f9ff2');

$clientToken = Braintree_ClientToken::generate();
?>
<?php
$ismobile = false;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\. (browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|631 0|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(e x|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2 |5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny| va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(0 1|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg |te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
	$ismobile = true;
 }
?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">


<title>On Call alcohol</title>
  
<link rel="stylesheet" type="text/css" href="./css/fonts.css">
<link rel="stylesheet" type="text/css" href="./css/main.css"></head>

<body class="body  ">
<?php require_once('header.php');?>
<?php require_once("specials.php");?>

	<div class="l-container--home" id="products">
		<div class="l-one-col l-one-col--less-spacing u-align-center">
		  <h1 class="heading-a">On Call Alcohol Products</h1>
		  <div style="width: 50%;text-align: center;display:inline-block;" > 
		  	<?php 
			if($ismobile){
				echo '<ul style=" list-style-type: none" class="sub-heading">		  
							<li style="margin:2rem;" ><a href="#" class="cartItem">Download our App</a></li>	
						</ul>';
			}else{
				echo '<ul id="cart" style=" list-style-type: none" class="sub-heading-a">		  
							
						</ul>';
			}
			?>
			
		</div>
		</div>
<!--Change di shit-->
         
        
    <div  id="products" class="l-product-grid">
   <?php 
   $products = array("Black_Label","Castle","Amstel","Windhoek","Hansa","Heineken","Hunters","Flying_Fish_Lemon"); 
				$id = 0;
				$x = 1;

	foreach ($products as $product) {
		$id = $id +1;
		echo '<div class="l-product-grid__item-container js-ga-click-product">
				<div class="l-product-grid__item">
			<img class="product-block__photo-alt has-alt lazyautosizes lazyloaded" 
			 data-sizes="auto" 
			 data-src="./Images/'.$products[1].'.jpg" 
			 data-srcset="./Images/'.$products[1].'.jpg 200w,
				./Images/'.$products[1].'.jpg 400w,
				./Images/'.$products[1].'.jpg 600w,
				./Images/'.$products[1].'.jpg 2x" sizes="336px" srcset="./Images/'.$products[1].'.jpg 200w,
				./Images/'.$products[1].'.jpg 400w,
				./Images/'.$products[1].'.jpg 600w,
			   ./Images/'.$products[1].'.jpg 2x" src="">
			<div class="product-block">
				<p class="product-block__view-details"></p>
					<div class="product-block__info">
						<h5 class="product-block__title">
							  '.$product.'
							</h5>
							<div class="product-block__price">
								<div class="product-block__msrp  ">
								Prys 
								</div><br>
							<div class="product-block__msrp  ">
								Hoeveelheid in stock
							</div>
						</div>
					</div>
					<div class="cartholder">
					  <input type="hidden"  class="js-add-to-cart-id" name="id" value="'.$id.'">
					 
					  
						  <div class="add-to-cart product-block__quick-buy ">
						  <div class="add-to-cart__qty">
							<label>QTY</label>
							<input class="js-add-to-cart-qty" type="text" value="1" name="qty">
						  </div>

						  <button type="submit" id="add-to-cart__submit" class="add-to-cart__submit js-add-to-cart">
							<span class="add-to-cart__top">Add to Cart</span>
							<span class="add-to-cart__bottom">Item Added</span>
						  </button>
						</div>
					</div>
			  </div>

			</div>
		</div>';
	}
   ?>                                             
</div>
<script type="text/javascript" src="./js/main.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	$.ajax({    
			type: "GET",
			url: "cart.php",             
			dataType: "html",                 
			success: function(response){   		
				$(".sub-heading-a").html(response); 
			   
			}

		});
	
	
	

});
$('.sub-heading-a').on('click', '.cartRemove', function (){
        $.ajax({    
				type: "GET",
				url: "cart.php?cmd=emptycart",             
				dataType: "html",                 
				success: function(response){                    
				 }

			});
			$.ajax({    
			type: "GET",
			url: "cart.php",             
			dataType: "html",                 
			success: function(response){   		
				$(".sub-heading-a").html(response); 
			   
			}

			});
    });





</script>
<script type="text/javascript">
$(".add-to-cart__submit").click(function() {
	var qty = $(this).parents('.cartholder').find(".js-add-to-cart-qty").val();
	var id = $(this).parents('.cartholder').find(".js-add-to-cart-id").val();
			$.ajax({    
				type: "GET",
				url: "cart.php?qty="+qty+"&id="+id,             
				dataType: "html",                 
				success: function(response){                    
				 }

			});
			$.ajax({    
			type: "GET",
			url: "cart.php",             
			dataType: "html",                 
			success: function(response){   		
				$(".sub-heading-a").html(response); 
			   
			}

		});
		braintree.setup('<?php echo $clientToken;?>', 'dropin', {
		  container: 'Payment',
		  form: 'checkout-form',
		   onPaymentMethodReceived: function (obj) {
			   alert(obj);
			   $.ajax({    
				type: "GET",
				url: "cart.php?paymentNonce="+obj.nonce,             
				dataType: "html",                 
				success: function(response){                    
				   alert(response);
				}

			});
	   
    //myForm.submit();
			}
}		);
		});


</script>

<script src="https://js.braintreegateway.com/js/braintree-2.24.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
braintree.setup('<?php echo $clientToken;?>', 'dropin', {
  container: 'Payment',
  form: 'checkout-form',
   onPaymentMethodReceived: function (obj) {
	   alert(obj);
	   $.ajax({    
        type: "GET",
        url: "cart.php?paymentNonce="+obj.nonce,             
        dataType: "html",                 
        success: function(response){                    
           alert(response);
        }

    });
	   
    //myForm.submit();
  }
});

</script>
<?php require_once('footer.php');?>
</body></html>