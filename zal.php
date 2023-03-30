
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
xxxxxxxx
three 
third 
thirteen 




<?php
session_start();

// Check if the product is added to cart
if(isset($_POST["add_to_cart"])) {
    // Get product details
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_qty = $_POST["product_qty"];
    
    // Add product to cart
    $cart_item = array(
        "product_id" => $product_id,
        "product_name" => $product_name,
        "product_price" => $product_price,
        "product_qty" => $product_qty
    );
    
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    $_SESSION["cart"][$product_id] = $cart_item;
}

// Redirect to the cart page
header("Location: cart.php");
exit();
?>


<?php
session_start();
?>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach($_SESSION["cart"] as $cart_item) {
            $product_name = $cart_item["product_name"];
            $product_price = $cart_item["product_price"];
            $product_qty = $cart_item["product_qty"];
            $item_total = $product_price * $product_qty;
            $total += $item_total;
        ?>
            <tr>
                <td><?php echo $product_name; ?></td>
                <td><?php echo $product_price; ?></td>
                <td><?php echo $product_qty; ?></td>
                <td><?php echo $item_total; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total:</td>
            <td><?php echo $total; ?></td>
        </tr>
    </tfoot>
</table>

<form action="index.php">
    <input type="submit" value="Continue Shopping">
</form>
checkdate  
