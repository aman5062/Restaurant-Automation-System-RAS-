<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';

// Handle updating inventory
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingredient_id = $_POST['ingredient_id'];
    $new_quantity = $_POST['quantity'];

    // Update the quantity of the ingredient in the database
    $stmt = $conn->prepare("UPDATE inventory SET quantity = ? WHERE id = ?");
    $stmt->bind_param('ii', $new_quantity, $ingredient_id);

    if ($stmt->execute()) {
        $success = "Inventory updated successfully!";
    } else {
        $error = "Error updating inventory. Please try again.";
    }
}

// Fetch inventory data
$result = $conn->query("SELECT * FROM inventory");

?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Manage Inventory</h1>

    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Ingredient Name</th>
                <th>Quantity</th>
                <th>Reorder Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['threshold']; ?></td>
                    <td>
                        <form method="POST" action="manage_inventory.php" class="form-inline">
                            <input type="hidden" name="ingredient_id" value="<?php echo $row['id']; ?>">
                            <input type="number" name="quantity" class="form-control mr-2" value="<?php echo $row['quantity']; ?>" required>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap and jQuery scripts (make sure these are included) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
