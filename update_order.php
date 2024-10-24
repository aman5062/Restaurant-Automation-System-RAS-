<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch order details from the 'orders' table
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];
    $new_total_amount = $_POST['total_amount'];

    // Update the order in the database
    $update_stmt = $conn->prepare("UPDATE orders SET status = ?, total_amount = ? WHERE id = ?");
    $update_stmt->bind_param("sdi", $new_status, $new_total_amount, $id);

    if ($update_stmt->execute()) {
        $success = "Order updated successfully!";
        // Refresh the page to show the updated data
        header("Location: update_order.php?id=" . $id);
        exit;
    } else {
        $error = "Error updating order. Please try again.";
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Update Order #<?php echo isset($order['id']) ? $order['id'] : ''; ?></h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php elseif (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
    <?php else: ?>
        <form method="POST" action="update_order.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" value="<?php echo $order['user_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" class="form-control" id="order_date" value="<?php echo $order['created_at']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount (₹)</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" value="<?php echo $order['total_amount']; ?>" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="status">Order Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Completed" <?php echo $order['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="Cancelled" <?php echo $order['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    <?php endif; ?>
</div>

<!-- Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
