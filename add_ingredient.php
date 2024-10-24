<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingredient_name = $_POST['ingredient_name'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO ingredients (name, quantity) VALUES (?, ?)");
    $stmt->bind_param("si", $ingredient_name, $quantity);
    $stmt->execute();
    header("Location: inventory.php");
    exit();
}
?>

<div class="container">
    <h1>Add Ingredient</h1>
    <form method="POST">
        <label for="ingredient_name">Ingredient Name:</label>
        <input type="text" name="ingredient_name" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Add Ingredient">
    </form>
</div>
