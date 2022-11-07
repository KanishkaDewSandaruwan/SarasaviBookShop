<?php
if(session_id() == '') {
    session_start();
}
include 'server/api.php';

if (isset($_SESSION['customer'])) {
    if(isset($_REQUEST['pid']) && isset($_REQUEST['product_price'])){

        
        $qty;
        
        if (isset($_REQUEST['qty'])) {
            $qty = $_REQUEST['qty'];
        }
        else {
            $qty = 1;
        }
        
        $pid = $_REQUEST['pid'];
        $product_price = $_REQUEST['product_price'];
        $customer_id = $_SESSION['customer'];
        
        return addtoCart($pid, $customer_id, $product_price, $qty);
    }

}else{
    echo json_encode("Fail");
}

?>