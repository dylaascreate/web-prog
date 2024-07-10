<?php
include 'connect.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eduTitle'])) {
    // Retrieve the posted data
    $eduTitle = $_POST["eduTitle"];
    $eduYears = $_POST["eduYears"];
    $eduInstitution = $_POST["eduInstitution"];
    $eduCgpa = $_POST["eduCgpa"];
    $eduImage = $_FILES["eduImage"]["name"];

    // Define the target directory for image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($eduImage);
    move_uploaded_file($_FILES["eduImage"]["tmp_name"], $target_file);

    // Check if the file is uploaded successfully
    // if (move_uploaded_file($_FILES["eduImage"]["tmp_name"], $target_file)) {
        // Insert the data into the database
        $sql = "INSERT INTO education (eduTitle, eduYears, eduInstitution, eduCgpa, eduImage) 
                VALUES ('$eduTitle', '$eduYears', '$eduInstitution', '$eduCgpa', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            $message = "New education entry added successfully.";
            header("location:education.php?add=success");
            exit();
        } else {
            $message = "Error: " . $conn->error;
            header("location:education.php?add=failed&message=" . urlencode($message));
        }
    // } else {
    //     $message = "Error uploading image.";
    //     header("location:education.php?add=failed&message=" . urlencode($message));
    // }
}
?>
