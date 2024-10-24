
<?php
include 'include/db.php';
include 'include/navbar.php';

// Logic to update settings can be added here.
?>

<div class="container">
    <h1>Settings</h1>
    <form method="POST">
        <label for="app_name">Application Name:</label>
        <input type="text" name="app_name" required>
        <br>
        <input type="submit" value="Update Settings">
    </form>
</div>
