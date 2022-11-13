<?php
if (session_id() == '') {
    session_start();
}

include 'inc/get.php';
include 'inc/connection.php';
include 'inc/update.php';
include 'inc/delete.php';
include 'inc/add.php';

if (isset($_GET['function_code']) && $_GET['function_code'] == 'getCustomerTbleData') {
    echo json_encode(getAllCustomer());
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'getCategoryTbleData') {
    echo json_encode(getAllCategory());
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'getAllData') {
    $data = getAllData($_POST);
    echo json_encode($data);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateData') {
    updateDataTable($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'imageUploadCategory') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/category/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editImages($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'imageUploadProducts') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editImages($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addProducts') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        addProduct($_POST, $img);
    }
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'deleteData') {
    deleteDataTables($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'permanantDeleteData') {
    permanantDeleteDataTable($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'changesettings') {
    changePageSettings($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'SettingImage') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/settings/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");
    
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editSettingImage($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'login') {
	echo getLoginAdmin($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addCategory') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/category/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");
    
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        addCategory($_POST, $img);
    }

}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPasswordByEmail') {
    checkPasswordByName($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'editQty') {
	editQtyinCart($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkoutOrder') {
    checkoutOrder($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addcontact') {
	addMessage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addAuthor') {
	addAuthor($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addCustomer') {
    createCustomer($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkEmail') {
    checkUserEmail($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPassword') {
    checkuserPassword($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addEmployee') {
    addEmployee($_POST);
}



?>