<?php
$conn = new mysqli("localhost", "root", "", "projecthackthon"); // Change 'recipe_hub' to 'recipe'

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
