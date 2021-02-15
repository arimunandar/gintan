<?php

include_once('../common/connection.php');
include_once('customer/customer.php');
include_once('product/product.php');
include_once('transaction/transaction.php');

$user           = new Customer();
$product        = new Product();
$transaction    = new Transaction();

// User Register
if (isset($_POST['register'])) {
    $user->addNewCustomer($_POST);
}

// User Login
if (isset($_POST['login'])) {
    $user->loginCustomer($_POST);
}

// User Edit
if (isset($_GET['user-edit'])) {
    $user->userUpdate($_GET['user-edit'], $_POST);
}

// User Edit
if (isset($_GET['user-delete'])) {
    $user->deleteUsersById($_GET['user-delete']);
}

// Add Product
if (isset($_POST['add-product'])) {
    $tmp_name 		= 	$_FILES["foto"]["tmp_name"];
    $product->addNewProduct($_POST, $_FILES["foto"]["name"], $tmp_name);
}

// Edit Product
if (isset($_GET['product-edit'])) {
    if (isset($_POST['product-update'])) {
        $tmp_name = $_FILES["foto"]["tmp_name"];
        $product->productUpdate($_GET['product-edit'], $_POST, $_FILES["foto"]["name"], $tmp_name);
    }
}

// User Edit
if (isset($_GET['product-delete'])) {
    $product->deleteProductsById($_GET['product-delete']);
}

// User Edit
if (isset($_GET['transaction-delete'])) {
    $transaction->deleteTransactionsById($_GET['transaction-delete']);
}

// User Edit
if (isset($_GET['transaction-add'])) {
    echo "Hello";
}

// Edit Product
if (isset($_GET['transaction-edit'])) {
    if (isset($_POST['transaction-update'])) {
        $transaction->transactionUpdate($_GET['transaction-edit'], $_POST);
    }
}

?>