<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    a{
        text-decoration: none;
        color: #000000;
    }
</style>
<body>
<table>
    <caption>
        <h1>List Product</h1>
        <button><a href="index.php?page=add-product">Create</a></button>
        <div>
            <form action="" method="post">
                <input type="text" name="search" placeholder="Search name">
                <button type="submit">Search</button>
            </form>
        </div>
    </caption>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Created Date</th>
        <th>Description</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if (isset($products)):?>
        <?php foreach ($products as $product):?>
            <tr>
                <td><?php echo $product->getId()?></td>
                <td><?php echo $product->getName()?></td>
                <td><?php echo $product->getCategoryId()?></td>
                <td><?php echo $product->getPrice()?></td>
                <td><?php echo $product->getAmount()?></td>
                <td><?php echo $product->getCreatedDate()?></td>
                <td><?php echo $product->getDescription()?></td>
                <td>
                    <button><a href="index.php?page=edit&id=<?php echo $product->getId()?>">Edit</a></button>
                </td>
                <td>
                    <button><a href="index.php?page=delete&id=<?php echo $product->getId()?>">Delete</a></button>
                </td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="9"><h3>Không có dữ liệu</h3></td>
        </tr>
    <?php endif;?>
</table>
</body>
</html>