<?php
$conn = new mysqli("localhost", "root", "", "projecthackthon",3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$parent_name = $_POST['parent_name'];
$parent_age = $_POST['parent_age'];
$parent_blood_group = $_POST['parent_blood_group'];
$parent_phone = $_POST['parent_phone'];
$parent_location = $_POST['parent_location'];

$child_name = $_POST['child_name'];
$child_age = $_POST['child_age'];
$child_gender = $_POST['child_gender'];
$child_blood_group = $_POST['child_blood_group'];
$child_location = $_POST['child_location'];

// Save data
$sql = "INSERT INTO child_profiles (parent_name, parent_age, parent_blood_group, parent_phone, parent_location,
    child_name, child_age, child_gender, child_blood_group, child_location)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sissssisss", $parent_name, $parent_age, $parent_blood_group, $parent_phone, $parent_location,
    $child_name, $child_age, $child_gender, $child_blood_group, $child_location);

if ($stmt->execute()) {
    // Redirect with a flag to show success
    header("Location: profile.php?saved=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
