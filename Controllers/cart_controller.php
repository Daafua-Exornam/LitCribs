<?php 

require('../Classes/cart_class.php');


function addToCartCtrlr($p_id, $ip_add, $cartId, $qty) {
    //create an instance of the cart class
    $cartInstance = new Cart();
    // call a method from the cart class
    return $cartInstance-> addToCart($p_id, $ip_add, $cartId, $qty);
}

function removeFromCartCtrlr($p_id, $c_id){
    $cartInstance = new Cart();
    return $cartInstance->removeFromCart($p_id, $c_id);
}

function selectAllCartCtrlr($cartId){
     $cartInstance = new Cart();
     return $cartInstance->selectAllCart($cartId);
}

function selectOneCartCtrlr($cartId, $p_id){
      $cartInstance = new Cart();
      return $cartInstance->selectOneCart($cartId, $p_id);
}

function  updateQuantityCtrlr($p_id, $cartId, $qty){
     $cartInstance = new Cart();
     return $cartInstance->updateQuantity($p_id, $cartId, $qty);
}

function  totalAmountCtrlr($cartId){
    //create an instance of the cart class
    $cartInstance = new Cart();
    //call a method from the cart class
    return $cartInstance->totalAmount ($cartId);
}


function  addOrderCtrlr($customer_id, $invoice_no, $order_date, $order_status){
    //create an instance of the cart class
    $cartInstance = new Cart();
    //call a method from the cart class
    return $cartInstance->addOrder($customer_id, $invoice_no, $order_date, $order_status);

}


function addOrderDetailsCtrlr($order_id, $product_id, $qty){
    //create an instance of the cart class
    $cartInstance = new Cart();
    //call a method from the cart class
    return $cartInstance->addOrderDetails($order_id, $product_id, $qty);

}


function getLastOrderCtrlr(){
      //create an instance of the cart class
      $cartInstance = new Cart();
      //call a method from the cart class
      return $cartInstance->getLastOrder();

}

function addPaymentCtrlr($amount, $cartId, $order_id, $currency, $payment_date){
      //create an instance of the cart class
    $paymentInstance = new Cart();
     //call a method from the cart class
    return $paymentInstance-> addPayment ($amount, $cartId, $order_id, $currency, $payment_date);
}

?> 