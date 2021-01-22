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
        <legend>Create Product</legend>
        <input type="text" id="name" name="product-name" placeholder="Name">
        <input type="number" name="product-categoryId" placeholder="Category Id">
        <input type="number" min="0" name="product-price" placeholder="Price">
        <input type="number" min="0" name="product-amount" placeholder="Amount">
        <textarea name="product-desc" placeholder="Description"></textarea>
        <button type="submit">Create</button>
        <button type="button"><a href="index.php">Cancel</a></button>
    </fieldset>
</form>
</body>
</html>