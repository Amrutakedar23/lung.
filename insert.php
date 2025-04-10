<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cancerdetection";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];

$smoking = isset($_POST['smoking']) ? 1 : 0;
$yellowFingers = isset($_POST['yellowFingers']) ? 1 : 0;
$allergy = isset($_POST['allergy']) ? 1 : 0;
$alcoholConsuming = isset($_POST['alcoholConsuming']) ? 1 : 0;
$coughing = isset($_POST['coughing']) ? 1 : 0;
$chestPain = isset($_POST['chestPain']) ? 1 : 0;

$imagePath = '';
if (isset($_FILES['lung_image']) && $_FILES['lung_image']['error'] == 0) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imagePath = $targetDir . basename($_FILES["lung_image"]["name"]);
    move_uploaded_file($_FILES["lung_image"]["tmp_name"], $imagePath);
}

$sql = "INSERT INTO patients (name, age, image_path, smoking, yellow_fingers, allergy, alcohol_consuming, coughing, chest_pain)
        VALUES ('$name', $age, '$imagePath', $smoking, $yellowFingers, $allergy, $alcoholConsuming, $coughing, $chestPain)";

if ($conn->query($sql) === TRUE) {
    echo "✅ Data saved successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>