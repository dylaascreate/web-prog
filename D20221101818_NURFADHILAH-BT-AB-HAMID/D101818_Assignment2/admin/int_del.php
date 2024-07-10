<?php
include 'connect.php';

if (isset($_POST['delete'])) {
    $interestId = $_POST['interestIdDel'];

    $sql = "DELETE FROM interest WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $interestId);

    if ($stmt->execute()) {
        header("location:interest.php?delete=success");
    } else {
        echo "Error deleting record: " . $conn->error;
        header("location:interest.php?delete=failed");
    }

    $stmt->close();
}

$conn->close();
?>
