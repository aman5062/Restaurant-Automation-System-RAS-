
<?php
include 'include/db.php';
include 'include/navbar.php';

$order_id = $_GET['id'];
// Fetch order details for the check
$result = $conn->query("SELECT * FROM orders WHERE id = $order_id");
$order = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic to generate the check
    // You can implement check printing logic here
    echo "Check generated for Order ID: " . $order['id'];
}
?>

<div class="container">
    <h1>Generate Check</h1>
    <form method="POST">
        <p>Order ID: <?php echo $order['id']; ?></p>
        <p>Total Amount: <?php echo $order['total_amount']; ?></p>
        <input type="submit" value="Generate Check">
    </form>
</div>
