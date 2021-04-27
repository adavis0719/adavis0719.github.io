<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

$query2 = 'SELECT * FROM products
                  WHERE productID = :product_id';
$statement2 = $db->prepare($query2);
$statement2->bindValue(':product_id', $product_id);
$statement2->execute();
$product = $statement2->fetch();
$statement2->closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product_form.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                
                <option value="<?php echo $category['categoryID']; ?>" <?php
                 if($category['categoryID']== $category_id)
                    echo "selected";
                            ?>
                        >
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code" values="<?php echo $product['productCode']?>"><br>

            <label>Name:</label>
            <input type="text" name="name" values="<?php echo $product['productName']?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" values="<?php echo $product['listPrice']?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Update Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>