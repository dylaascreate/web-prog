<?php
// ADD
include 'connect.php';
$message = '';

if (isset($_POST['add'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iconImage = $_FILES["iconImage"]["name"];
    $activityName = $_POST["activityName"];

    // Save the uploaded file
    $target_dir = "images/";
    $target_file = $target_dir . basename($iconImage);
    move_uploaded_file($_FILES["iconImage"]["tmp_name"], $target_file);

    $sql = "INSERT INTO activity (iconImage, activityName) VALUES ('$target_file', '$activityName')";

    if ($conn->query($sql) === TRUE) {
        $message = "New activity added successfully.";
        header("location:activity.php?add=success");
    } else {
        $message = "Error: ". $conn->error;
        header("location:activity.php?add=failed");
    }
}
}
?>