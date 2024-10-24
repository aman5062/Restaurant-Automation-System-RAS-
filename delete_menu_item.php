
<?php
include 'include/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: menu.php");
exit();
?>
