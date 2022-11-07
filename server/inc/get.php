<?php


//category
function getAllCategory()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' ORDER BY date_updated DESC ";
    return mysqli_query($con, $viewcat);
}

function getAllCategoryByID($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' AND cat_id = '$cat_id' ORDER BY date_updated DESC ";
    return mysqli_query($con, $viewcat);
}

function getAllAuthor()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM author WHERE is_deleted = '0' ORDER BY date_updated DESC ";
    return mysqli_query($con, $viewcat);
}

function getAllAuthorBYID($author_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM author WHERE is_deleted = '0' AND author_id = '$author_id' ORDER BY date_updated DESC ";
    return mysqli_query($con, $viewcat);
}

function getAllCategories()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = 0 ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

//product

function getAllItems()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM products WHERE is_deleted = 0 ";
    return mysqli_query($con, $viewcat);
}

function getAllProductItems()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = 1 ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function getAllProductItemsByCategory($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = 1 AND cat_id = '$cat_id' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function checkProductByName($product_name)
{
	include 'connection.php';

	$product = "SELECT * FROM products WHERE product_name = '$product_name' AND is_deleted = 0";
	$result = mysqli_query($con, $product);
	return mysqli_num_rows($result);
}

function getAllItemsByID($pid)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND pid = '$pid' ";
	return mysqli_query($con, $viewcat);
}

function getCountItemsByID($pid)
{
	include 'connection.php';

	$view = "SELECT * FROM products WHERE is_deleted = 0 AND pid = '$pid' ";
	return  mysqli_query($con, $view);
}


//customer


function checkuserPassword($data)
{
    include 'connection.php';
    $customer_id = $data['customer_id'];
    $password = $data['password'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND password = '$password' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function checkUserEmail($data)
{
    include 'connection.php';

    $customer_id = $data['customer_id'];
    $email = $data['email'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND email = '$email' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function getAllcustomerById($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND customer_id = '$customer_id'";
    return mysqli_query($con, $q1);
}

function getAllcustomers()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getLoginAdmin($data)
{
    include 'connection.php';

    $email = $data['email'];
    $password = $data['password'];

    $loginAdmin = "SELECT * FROM customer WHERE email = '$email' AND password ='$password'";
    $count_loginAdmin = mysqli_query($con, $loginAdmin);

    if ($email == 'admin') {
        $_SESSION['admin'] = $email;
    }
    else {
        $res = checkCustomerByEmail($email);
        $row = mysqli_fetch_assoc($res);
        $_SESSION['customer'] = $row['customer_id'];
    }
    return mysqli_num_rows($count_loginAdmin);
}

function checkCustomerByEmail($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}


function checkCustomerByID($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE customer_id='$customer_id' AND is_deleted = '0'";
    return mysqli_query($con, $q1);
}

function getAllCustomer()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND email != 'admin'";
    $table = mysqli_query($con, $q1);
    $columns = mysqli_fetch_all ($table, MYSQLI_ASSOC);

    return $columns;

}


//contact

function getAllMessages(){
	include 'connection.php';

	$messages = "SELECT * FROM contact";
	return mysqli_query($con,$messages);
}

//count

function dataCount($table){
	include 'connection.php';

	$counts = "SELECT * FROM $table";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataCountWhere($table, $where){
	include 'connection.php';

	$counts = "SELECT * FROM $table WHERE $where";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataforCount($table){
	include 'connection.php';

	$counts = "SELECT sum(total) as sum FROM $table";
    return mysqli_query($con,$counts);
}

function dataforCountToday($table){
	include 'connection.php';

	$counts = "SELECT sum(total) as sum FROM $table WHERE month(now()) = month(date_updated)";
    return mysqli_query($con,$counts);
}


//settings

function getAllSettings(){
	include 'connection.php';

	$settings = "SELECT * FROM settings";
	return mysqli_query($con,$settings);
}

function checkPasswordByName($data){
	include 'connection.php';
	$email = $data['email'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM customer WHERE password = '$password' AND email = '$email' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}

function getAllCart($customer_id){
	include 'connection.php';

	$q1= "SELECT * FROM cart join products on products.pid = cart.pid join customer on customer.customer_id = cart.customer_id WHERE cart.customer_id = '$customer_id'";
	return mysqli_query($con,$q1);
}


function getAllOrdersByCustomer($customer_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders WHERE customer_id = '$customer_id' AND is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrderItemsBYOrder($order_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM order_items join products on order_items.pid = products.pid WHERE order_items.order_id = '$order_id'";
	return mysqli_query($con,$viewcat);
}

function getAllOrders(){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrdersPending(){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' AND product_orders.order_status = '1' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrderItems($order_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM order_items join products on order_items.pid = products.pid WHERE order_items.order_id = '$order_id'";
	return mysqli_query($con,$viewcat);
}


?>