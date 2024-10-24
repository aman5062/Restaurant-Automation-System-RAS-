
<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingredient_name = $_POST['ingredient_name'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE ingredients SET quantity = ? WHERE name = ?");
    $stmt->bind_param("is", $quantity, $ingredient_name);
    $stmt->execute();
    header("Location: inventory.php");
    exit();
}

$result = $conn->query("SELECT * FROM ingredients");
?>

<div class="container">
    <h1>Update Inventory</h1>
    <form method="POST">
        <label for="ingredient_name">Select Ingredient:</label>
        <select name="ingredient_name" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="quantity">New Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Update Inventory">
    </form>
</div>
