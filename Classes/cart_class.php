<?php 

//inheriting the methods from connection
require('../Settings/db_class.php');



class Cart extends DbConnection {

    function addToCart($p_id, $ip_add, $cartId, $qty){
        return $this->query("INSERT into cart (p_id, ip_add, c_id, qty) values('$p_id','$ip_add', '$cartId', '$qty')");
    }

    function removeFromCart($p_id, $c_id){
        return $this->query("DELETE from cart where p_id = '$p_id' and c_id='$c_id' ");
    }

    function selectAllCart($cartId){
        return $this->fetch("SELECT * from cart inner join products on p_id = product_id where c_id = '$cartId'");
    }

    function selectOneCart($cartId, $p_id){
        return $this->fetchOne("select * from cart where c_id = '$cartId' and  p_id = '$p_id'");
    }

    function updateQuantity($p_id, $cartId, $qty){
        return $this->query("update cart set qty = '$qty' where p_id = '$p_id' and c_id = '$cartId'");
    }
    function totalAmount ($cartId){
        return $this->fetchOne("SELECT SUM(products.product_price *cart.qty) as Amount FROM cart join products on (products.product_id = cart.p_id) where cart.c_id = '$cartId'");
    }

    // Order stuff

    function addOrder($customer_id, $invoice_no, $order_date, $order_status){
        return $this->query("insert into orders (customer_id, invoice_no, order_date, order_status) values('$customer_id','$invoice_no', '$order_date', '$order_status')");
    }
   
    			
    function addOrderDetails($order_id, $product_id, $qty){
        return $this->query("insert into orderdetails (order_id,product_id,	qty) values('$order_id','$product_id', '$qty')");
    }
        
    function getLastOrder(){
        return $this ->fetchOne("SELECT MAX(order_id) as last_order from orders");
    }

    function addPayment ($amount, $cartId, $order_id, $currency, $payment_date){
        return $this->query("insert into payment(amt, customer_id, order_id, currency, payment_date) values('$amount', '$cartId', '$order_id', '$currency', '$payment_date')");
    }

}


?>