<?php

namespace FinalExam\Controller;

use FinalExam\Model\Product;
use FinalExam\Model\ProductManager;

class ProductController
{
    protected $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function viewListProduct()
    {
        $products = null;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $products = $this->productManager->getAllProduct();
        } else {
            $products = $this->productManager->getListProductByName($_POST['search']);
        }
        include "src/View/list-product.php";
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include "src/View/add-product.php";
        } else {
            $name = $_POST['product-name'];
            $categoryId = $_POST['product-categoryId'];
            $price = $_POST['product-price'];
            $amount = $_POST['product-amount'];
            $desc = $_POST['product-desc'];

            $product = new Product(null,$name,$categoryId,$price,$amount,null,$desc);
            $this->productManager->createProduct($product);
            header("Location: index.php");
        }
    }

    public function deleteProduct()
    {
        $id = $_GET['id'];
        $this->productManager->deleteProduct($id);
        header("Location: index.php");
    }

    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $product = $this->productManager->getProduct($_GET['id']);
            include "src/View/edit-product.php";
        } else {
            $name = $_POST['product-name'];
            $categoryId = $_POST['product-categoryId'];
            $price = $_POST['product-price'];
            $amount = $_POST['product-amount'];
            $desc = $_POST['product-desc'];

            $product = new Product($_GET['id'],$name,$categoryId,$price,$amount,null,$desc);
            $this->productManager->updateProduct($product);
            header("Location: index.php");
        }
    }

}