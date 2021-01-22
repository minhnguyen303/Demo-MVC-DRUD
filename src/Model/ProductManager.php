<?php
namespace FinalExam\Model;

class ProductManager
{
    protected $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function getAllProduct(): array
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->dbConnect->connect()->query($sql);
        $data = $stmt->fetchAll();
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item['id'],$item['name'],$item['categoryId'],$item['price'],$item['amount'],$item['createdDate'],$item['description']);
            array_push($products, $product);
        }
        return $products;
    }

    // Phương thức tạo sản phẩm
    public function createProduct(Product $product)
    {
        $sql = "INSERT INTO products(name, categoryId, price, amount, description) VALUES (?,?,?,?,?)";
        $go = $this->dbConnect->connect()->prepare($sql);
        /** @var mixed $product */
        $go->bindParam(1,$product->getName());
        $go->bindParam(2,$product->getCategoryId());
        $go->bindParam(3,$product->getPrice());
        $go->bindParam(4,$product->getAmount());
        $go->bindParam(5,$product->getDescription());
        $go->execute();
    }

    public function getProduct($id): Product
    {
        $sql = "SELECT * FROM products where id=$id";
        $data = $this->dbConnect->query($sql)[0];
        return new Product($data['id'],$data['name'],$data['categoryId'],$data['price'],$data['amount'],$data['createdDate'],$data['description']);
    }

    public function getListProductByName($name): array
    {
        $sql = "SELECT * FROM products WHERE name LIKE '$name%'";
        $data = $this->dbConnect->query($sql);
        $list = [];
        foreach ($data as $item) {
            $list[] = new Product($item['id'],$item['name'],$item['categoryId'],$item['price'],$item['amount'],$item['createdDate'],$item['description']);
        }
        return $list;
    }

    public function updateProduct(Product $product)
    {
        $sql = "UPDATE products SET name=?,categoryId=?,price=?,amount=?,description=? where id=?";
        $go = $this->dbConnect->connect()->prepare($sql);
        /** @var mixed $product */
        $go->bindParam(1,$product->getName());
        $go->bindParam(2,$product->getCategoryId());
        $go->bindParam(3,$product->getPrice());
        $go->bindParam(4,$product->getAmount());
        $go->bindParam(5,$product->getDescription());
        $go->bindParam(6,$product->getId());
        $go->execute();
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products where id=$id";
        $go = $this->dbConnect->connect()->prepare($sql);
        $go->execute();
    }

}