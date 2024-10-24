<?php
include 'include/db.php';
include 'include/navbar.php';

$order_id = $_GET['id'];

// Fetch order details
$result = $conn->query("SELECT o.id, u.username, m.name AS menu_item, o.quantity, o.total_amount, o.created_at 
                         FROM orders o 
                         JOIN users u ON o.user_id = u.id 
                         JOIN menu_items m ON o.item_id = m.id 
                         WHERE o.id = $order_id");
$order = $result->fetch_assoc();
?>

<div class="container">
    <h1>Order Details</h1>
    <p>Order ID: <?php echo $order['id']; ?></p>
    <p>User: <?php echo $order['username']; ?></p>
    <p>Menu Item: <?php echo $order['menu_item']; ?></p>
    <p>Quantity: <?php echo $order['quantity']; ?></p>
    <p>Total Amount: <?php echo $order['total_amount']; ?></p>
    <p>Date: <?php echo $order['created_at']; ?></p>
</div>
