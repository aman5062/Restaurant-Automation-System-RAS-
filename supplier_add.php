<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];

    $stmt = $conn->prepare("INSERT INTO suppliers (name, contact_info) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $contact_info);
    $stmt->execute();
    header("Location: suppliers.php");
    exit();
}
?>

<div class="container">
    <h1>Add Supplier</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" required>
        <br>
        <input type="submit" value="Add Supplier">
    </form>
</div>
