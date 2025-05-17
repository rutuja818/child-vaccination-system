<?php
$conn = new mysqli("localhost", "root", "", "projecthackthon",3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the most recent profile
$result = $conn->query("SELECT * FROM child_profiles ORDER BY id DESC LIMIT 1");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Child Vaccination Profile</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; padding: 20px; }
        .container { background: #fff; padding: 20px; max-width: 600px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { background-color: #4CAF50; color: white; padding: 10px; margin-top: 20px; width: 100%; border: none; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Parent and Child Profile</h2>
    <?php if (isset($_GET['saved'])): ?>
        <p style="color: green; text-align: center;">Profile saved successfully!</p>
    <?php endif; ?>
    <form action="save_profile.php" method="POST">
        <h3>Parent Details</h3>
        <label>Parent Name:</label>
        <input type="text" name="parent_name" value="<?= $data['parent_name'] ?? '' ?>" required>

        <label>Parent Age:</label>
        <input type="number" name="parent_age" value="<?= $data['parent_age'] ?? '' ?>" required>

        <label>Blood Group:</label>
        <input type="text" name="parent_blood_group" value="<?= $data['parent_blood_group'] ?? '' ?>" required>

        <label>Phone Number:</label>
        <input type="text" name="parent_phone" value="<?= $data['parent_phone'] ?? '' ?>" required>

        <label>Location:</label>
        <input type="text" name="parent_location" value="<?= $data['parent_location'] ?? '' ?>" required>

        <h3>Child Details</h3>
        <label>Child Name:</label>
        <input type="text" name="child_name" value="<?= $data['child_name'] ?? '' ?>" required>

        <label>Age:</label>
        <input type="number" name="child_age" value="<?= $data['child_age'] ?? '' ?>" required>

        <label>Gender:</label>
        <select name="child_gender" required>
            <option value="">Select Gender</option>
            <option value="Male" <?= ($data['child_gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= ($data['child_gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= ($data['child_gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
        </select>

        <label>Blood Group:</label>
        <input type="text" name="child_blood_group" value="<?= $data['child_blood_group'] ?? '' ?>" required>

        <label>Location:</label>
        <input type="text" name="child_location" value="<?= $data['child_location'] ?? '' ?>" required>

        <button type="submit">Save / Update Profile</button>
    </form>
</div>

</body>
</html>
