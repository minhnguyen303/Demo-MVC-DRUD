<?php
require __DIR__ . "/vendor/autoload.php";

use FinalExam\Controller\ProductController;

$page = null; //(isset($_GET['page'])) ? $_GET['page'] : null;

if(isset($_GET['page'])){
    $page =  $_GET['page'];
}

$productController = new ProductController();

switch ($page){
    case "list-product":
        $productController->viewListProduct();
        break;
    case "add-product":
        $productController->addProduct();
        break;
    case "delete":
        $productController->deleteProduct();
        break;
    case "edit":
        $productController->editProduct();
        break;
    default:
        $productController->viewListProduct();
}