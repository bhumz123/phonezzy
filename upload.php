<?php
// Check if a file was uploaded successfully
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Get the temporary location of the uploaded file
    $tempFilePath = $_FILES['file']['tmp_name'];

    // Check if the uploaded file is a PDF
    $fileType = $_FILES['file']['type'];
    if ($fileType === 'application/pdf') {
        // Specify the directory where you want to save the uploaded file
        $uploadDir = 'uploads/';

        // Generate a unique filename to prevent overwriting existing files
        $fileName = uniqid() . '_' . $_FILES['file']['name'];

        // Construct the final path where the file will be saved
        $destination = $uploadDir . $fileName;

        // Move the temporary file to the desired destination
        if (move_uploaded_file($tempFilePath, $destination)) {
            // File upload successful
            echo "File uploaded successfully.";
        } else {
            // File upload failed
            echo "File upload failed.";
        }
    } else {
        // File is not a PDF
        echo "Only PDF files are allowed.";
    }
} else {
    // Error occurred during file upload
    echo "An error occurred during file upload.";
}
?>

