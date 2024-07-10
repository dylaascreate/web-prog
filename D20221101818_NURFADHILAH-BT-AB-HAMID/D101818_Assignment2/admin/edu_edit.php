<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentEdu = $_POST['currentEdu'];
    $newEduTitle = $_POST['newEduTitle'] ?? null;
    $newEduYears = $_POST['newEduYears'] ?? null;
    $newEduInstitution = $_POST['newEduInstitution'] ?? null;
    $newEduCgpa = $_POST['newEduCgpa'] ?? null;
    $newEduImage = $_FILES['newEduImage'];

    $updateImage = false;
    $imagePath = '';

    // Check if a new image is uploaded
    if ($newEduImage['error'] == UPLOAD_ERR_OK) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($newEduImage["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($newEduImage["tmp_name"]);
        if ($check !== false) {
            // Check file size (limit to 2MB)
            if ($newEduImage["size"] > 2000000) {
                echo "Sorry, your file is too large.";
                exit();
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                exit();
            }
            // Move the file to the target directory
            if (move_uploaded_file($newEduImage["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
                $updateImage = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        } else {
            echo "File is not an image.";
            exit();
        }
    }

    // Prepare the SQL for updating the education entry
    $fields = [];
    $params = [];
    $types = '';

    if ($newEduTitle) {
        $fields[] = 'eduTitle = ?';
        $params[] = $newEduTitle;
        $types .= 's';
    }

    if ($newEduYears) {
        $fields[] = 'eduYears = ?';
        $params[] = $newEduYears;
        $types .= 's';
    }

    if ($newEduInstitution) {
        $fields[] = 'eduInstitution = ?';
        $params[] = $newEduInstitution;
        $types .= 's';
    }

    if ($newEduCgpa) {
        $fields[] = 'eduCGPA = ?';
        $params[] = $newEduCgpa;
        $types .= 's';
    }

    if ($updateImage) {
        $fields[] = 'eduImage = ?';
        $params[] = $imagePath;
        $types .= 's';
    }

    $params[] = $currentEdu;
    $types .= 'i';

    if (!empty($fields)) {
        $sql = "UPDATE education SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);

        // Execute the statement
        if ($stmt->execute()) {
            header('Location: education.php?edit=success');
        } else {
            echo "Error updating record: " . $stmt->error;
            header('Location: education.php?edit=failed');
        }

        $stmt->close();
    } else {
        echo "No fields to update.";
    }
}

$conn->close();
?>
