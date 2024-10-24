
<?php
include 'include/db.php';
include 'include/navbar.php';

$order_id = $_GET['id'];

// Fetch order details
$result = $conn->query("SELECT o.id, u.username, m.name AS menu_item, o.quantity, o.total_amount 
                         FROM orders o 
                         JOIN users u ON o.user_id = u.id 
                         JOIN menu_items m ON o.item_id = m.id 
                         WHERE o.id = $order_id");
$order = $result->fetch_assoc();
?>

<div class="container">
    <h1>Bill for Order ID: <?php echo $order['id']; ?></h1>
    <p>User: <?php echo $order['username']; ?></p>
    <p>Menu Item: <?php echo $order['menu_item']; ?></p>
    <p>Quantity: <?php echo $order['quantity']; ?></p>
    <p>Total Amount: <?php echo $order['total_amount']; ?></p>
</div>
