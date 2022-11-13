<?php
function addCategory($data, $img)
{
    include 'connection.php';

    $category_name = $data['category_name'];

    $sql = "INSERT INTO category(cat_name, cat_image, is_deleted, date_updated) VALUES('$category_name', '$img', 0 , now())";
    return mysqli_query($con, $sql);

}


function addProduct($data, $img)
{
	include 'connection.php';

	$product_name = $data['product_name'];
	$product_highlight = $data['product_highlight'];
	$product_description = $data['product_description'];
	$product_price = $data['product_price'];
	$product_qty = $data['product_qty'];
	$product_active = $data['product_active'];
	$cat_id = $data['cat_id'];
	$author_id = $data['author_id'];

	$count = checkProductByName($product_name);

	if ($count == 0) {

		$sql = "INSERT INTO products(product_name, product_description, product_highlight, product_price, product_qty, product_active, date_updated, is_deleted, product_image, cat_id, author_id) VALUES('$product_name', '$product_description', '$product_highlight', '$product_price', '$product_qty', '$product_active', now(), 0 ,'$img', '$cat_id', '$author_id')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}

function addEmployee($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$gender = $data['gender'];

	$sql = "INSERT INTO editor(name, email, phone, nic, address, gender, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', 0 )";
	return mysqli_query($con, $sql);
	
}


//contact
function addMessage($data)
{
    include 'connection.php';

    $name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];


	$sql = "INSERT INTO contact(name, email, subject, message, date_updated) VALUES('$name', '$email', '$subject', '$message', now())";
	return mysqli_query($con, $sql);
}

function addAuthor($data)
{
    include 'connection.php';

    $author_name = $data['author_name'];
    $author_email = $data['author_email'];
    $author_phone = $data['author_phone'];

	$sql = "INSERT INTO author(author_name, author_email, author_phone, is_deleted, date_updated) VALUES('$author_name', '$author_email', '$author_phone', 0, now())";
	return mysqli_query($con, $sql);
}



function addtoCart($pid, $customer_id, $product_price, $qty){
	include 'connection.php';

	$sql = "INSERT INTO cart(pid, customer_id, price, qty, date_updated) VALUES('$pid', '$customer_id', '$product_price', '$qty', now())";
	return mysqli_query($con, $sql);
}

function createCustomer($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$gender = $data['gender'];
	$password = $data['password'];

	$sql = "INSERT INTO customer(name, email, phone, nic, address, gender, password, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', '$password', 0 )";
	return mysqli_query($con, $sql);
	
}

function checkoutOrder($data){
    include 'connection.php';

    $customer_id = $data['customer_id'];
    $total = $data['total'];
    $shipping_address = $data['shipping_address'];
    $billing_address = $data['billing_address'];
    
	$sql = "INSERT INTO product_orders(customer_id, total,shipping_address, billing_address, payment, date_updated, is_deleted, order_status, tracking) VALUES('$customer_id', '$total','$shipping_address','$billing_address', 1 , now(), 0, 1, 'Pending')";
	$res =  mysqli_query($con, $sql);
	$result =  mysqli_insert_id($con);

    $getallcartProducts =  getAllCart($customer_id);

	while($row = mysqli_fetch_assoc($getallcartProducts)){
		$order_id =  $result;
		$pid = $row['pid'];
		$qty = $row['qty'];
		$price = $row['price'];
		addProductItems($order_id, $pid, $qty, $price);
		productQtyReduce($pid, $qty);
	}
	return deleteAllCartItems($customer_id);
}

function addProductItems($order_id, $pid, $qty, $price){
	include 'connection.php';

	$sql = "INSERT INTO order_items(order_id, pid, order_qty, price) VALUES('$order_id', '$pid', '$qty', '$price')";
	return mysqli_query($con, $sql);
}



?>