<?php
include 'connect.php';

if (isset($_POST['edit'])) {
    $activityName = $_POST['activityName'];
    $newActivityName = $_POST['newActivityName'];
    $newIconImage = $_FILES['newIconImage'];

    // Check if a new icon image is uploaded
    if ($newIconImage['error'] == UPLOAD_ERR_OK) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($newIconImage["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($newIconImage["tmp_name"]);
        if ($check !== false) {
            // Check file size (limit to 2MB)
            if ($newIconImage["size"] > 2000000) {
                echo "Sorry, your file is too large.";
                exit();
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                exit();
            }
            // Move the file to the target directory
            if (move_uploaded_file($_FILES["newIconImage"]["tmp_name"], $targetFile)) {
                $sql = "UPDATE activity SET activityName = ?, iconImage = ? WHERE activityName = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $newActivityName, $targetFile, $activityName);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        } else {
            echo "File is not an image.";
            exit();
        }
    } else {
        // If no new image is uploaded, just update the activity name
        $sql = "UPDATE activity SET activityName = ? WHERE activityName = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newActivityName, $activityName);
    }

    if ($stmt->execute()) {
        header('Location: activity.php?edit=success');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
        header("location:activity.php?edit=failed");
    }

    $stmt->close();
}

$conn->close();
?>
