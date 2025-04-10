<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the image upload
    if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
        $uploadedImage = $_FILES[lungg.html];
        $imageName = $uploadedImage['name'];
        $imageTmpName = $uploadedImage['tmp_name'];
        $imageSize = $uploadedImage['size'];
        $imageType = $uploadedImage['type'];
        
        // Define allowed image formats (for simplicity, only JPEG, PNG, and GIF)
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        
        if (in_array($imageType, $allowedImageTypes)) {
            // Move the uploaded image to a specific folder
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Create folder if it doesn't exist
            }
            $uploadPath = $uploadDir . basename($imageName);
            
            if (move_uploaded_file($imageTmpName, $uploadPath)) {
                echo "Image uploaded successfully!<br>";
            } else {
                echo "Error uploading image.<br>";
            }
        } else {
            echo "Invalid image format. Only JPEG, PNG, and GIF are allowed.<br>";
        }
    } else {
        echo "No image uploaded or error with image upload.<br>";
    }

    // Process the patient data (CSV)
    if (isset($_POST['patientData'])) {
        $patientData = $_POST['patientData'];
        // Convert CSV data to an array
        $rows = explode("\n", $patientData);
        $csvData = [];
        foreach ($rows as $row) {
            $csvData[] = str_getcsv($row);
        }
        
        // Example: Display CSV data for debugging
        echo "Patient Data (CSV format):<br>";
        echo "<pre>";
        print_r($csvData);
        echo "</pre>";

        // Further processing logic for the data (e.g., calling AI model for cancer detection) can be added here.
        // For now, just return a simple message as an example.
        echo "Processing patient data for cancer detection...<br>";
    } else {
        echo "No patient data received.<br>";
    }
}
?>
