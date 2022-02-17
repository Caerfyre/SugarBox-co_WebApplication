<?php

// Toggle nav functions
if (!isset($_SESSION['functions'])) {
    $_SESSION['functions'] = array(
        "toggleCart" => false,
        "toggleOptions" => false,
        "toggleSearch" => false
    );
}

// Add to cart
if (isset($_POST['addToCart'])) {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    array_push($_SESSION['cart'], [
        "id" => $_GET['id'],
        "price" => $_POST['price'],
        "quantity" => $_POST['qty']
    ]);
    header("Location: ./menu.php");
}

// Delete from cart
if (isset($_POST['delOrder'])) {
    array_splice($_SESSION['cart'], $_GET['item'], 1);
    if (count($_SESSION['cart']) == 0) {
        unset($_SESSION['cart']);
    }
    header("Refresh: 0");
}

// Increment cart product count
if (isset($_POST['incCount'])) {
    $_SESSION['cart'][$_GET['item']]['quantity']++;
    header("Refresh: 0");
}

// Decrement cart product count
if (isset($_POST['decCount'])) {
    $_SESSION['cart'][$_GET['item']]['quantity']--;
    header("Refresh: 0");
}

if (!function_exists("getProduct")) {
    /**
     * Returns information of the product with the passed id.
     * @param int $id The ID of the product.
     * @return array Information of the target product.
     */
    function getProduct($id) {
        $conn = db_connect();

        $query = "SELECT * FROM `side_products` LEFT JOIN `sideproduct_sizes`
                ON `side_products`.`SideProd_ID` = `sideproduct_sizes`.`Prod_ID`
                WHERE `side_products`.`SideProd_ID` = '$id'
                ORDER BY `sideproduct_sizes`.`Size_Price` ASC";
        $result = mysqli_query($conn, $query);
        $product = array();
        while ($row = mysqli_fetch_array($result)) {
            $product[] = $row;
        }

        mysqli_close($conn);
        return $product;
    }
}

?>