<?php
if(!isset($product)){
    $product=null;
}
?>
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
    input, textarea{
        width: 90%;
        margin-bottom: 10px;
    }
</style>
<body>
<form action="" method="post" style="width: 300px; margin: auto">
    <fieldset>
        <legend>Edit Product</legend>
        <input type="text" id="name" name="product-name" placeholder="Name" value="<?php echo $product->getName();?>">
        <input type="number" name="product-categoryId" placeholder="Category Id" value="<?php echo $product->getCategoryId();?>">
        <input type="number" min="0" name="product-price" placeholder="Price" value="<?php echo $product->getPrice();?>">
        <input type="number" min="0" name="product-amount" placeholder="Amount" value="<?php echo $product->getAmount();?>">
        <textarea name="product-desc" placeholder="Description"><?php echo $product->getDescription();?></textarea>
        <button type="submit">Update</button>
        <button type="button"><a href="index.php">Cancel</a></button>
    </fieldset>
</form>
</body>
</html>