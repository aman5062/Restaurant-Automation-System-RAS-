
<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic to generate purchase order
    // Fetch and process ingredients to be ordered
    echo "Purchase order generated.";
}
?>

<div class="container">
    <h1>Generate Purchase Order</h1>
    <form method="POST">
        <label for="ingredient_id">Select Ingredient:</label>
        <select name="ingredient_id" required>
            <?php
            $result = $conn->query("SELECT * FROM ingredients");
            while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Generate Purchase Order">
    </form>
</div>
