<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Fetch order details from the 'orders' table
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the order data
        $order = $result->fetch_assoc();
    } else {
        $error = "Order not found!";
    }
} else {
    $error = "No order ID provided!";
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Order Details</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-header">
                <h3>Order #<?php echo $order['id']; ?></h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Customer: <?php echo $order['user_id']; ?></h5>
                <p class="card-text"><strong>Date:</strong> <?php echo $order['created_at']; ?></p>
                <p class="card-text"><strong>Total Amount:</strong> ₹<?php echo $order['total_amount']; ?></p>
                

                <!-- Add further details here, such as items in the order, if applicable -->
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap and jQuery scripts (make sure these are included) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
