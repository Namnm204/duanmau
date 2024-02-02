<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Example</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
        }

        .product-list {
            width: 25%;
            padding: 20px;
            box-sizing: border-box;
        }

        .cart {
            width: 75%;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <h1>GIỎ HÀNG</h1>

    <div class="product-list">
        <h2>Product List</h2>
        <ul>
    <li>
        <form action="index.php" method="post">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Product 1">
            <input type="hidden" name="product_price" value="10">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </li>
    <li>
        <form action="index.php" method="post">
            <input type="hidden" name="product_id" value="2">
            <input type="hidden" name="product_name" value="Product 2">
            <input type="hidden" name="product_price" value="20">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </li>
</ul>
    </div>

    <div class="cart">
        <h2>Cart</h2>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $product_id => $product) : ?>
                <tr>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['product_price']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['product_price'] * $product['quantity']; ?></td>
                    <td>
                        <a href="index.php?action=remove&product_id=<?php echo $product_id; ?>">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total:</td>
                <td><?php echo calculate_total(); ?></td>
            </tr>
        </tfoot>
    </table>

    <a href="index.php?action=clear">Clear Cart</a>
<?php else : ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
    </div>

</body>

</html>