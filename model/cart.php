<?php
// Thêm sản phẩm vào giỏ hàng
function add_to_cart($product_id, $product_name, $product_price, $quantity)
{
    // Kiểm tra xem giỏ hàng đã được tạo chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$product_id])) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng lên
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
        $_SESSION['cart'][$product_id] = array(
            'product_name' => $product_name,
            'product_price' => $product_price,
            'quantity' => $quantity
        );
    }
}

// Xóa sản phẩm khỏi giỏ hàng
function remove_from_cart($product_id)
{
    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (isset($_SESSION['cart'][$product_id])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart'][$product_id]);
    }
}

// Xóa toàn bộ giỏ hàng
function clear_cart()
{
    // Xóa toàn bộ giỏ hàng
    unset($_SESSION['cart']);
}

// Tính tổng giá trị của giỏ hàng
function calculate_total()
{
    $total = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $subtotal = $product['product_price'] * $product['quantity'];
            $total += $subtotal;
        }
    }

    return $total;
}
?>