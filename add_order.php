<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];
    $order_date = date('Y-m-d'); // Automatically sets today's date for the order

    // Insert the new order into the database
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, total_amount, status, order_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('sdss', $customer_name, $total_amount, $status, $order_date);
    
    if ($stmt->execute()) {
        $success = "Order added successfully!";
    } else {
        $error = "Error adding order. Please try again.";
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center">Add New Order</h1>

    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="add_order.php">
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount (₹)</label>
            <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="status">Order Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add Order</button>
    </form>
</div>

<!-- Bootstrap and jQuery scripts (make sure these are included) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
