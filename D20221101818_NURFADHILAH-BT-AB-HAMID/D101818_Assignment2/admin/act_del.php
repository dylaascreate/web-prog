<?php
include 'connect.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activityName']) && isset($_POST['delete'])) {
    // Get the activity name to be deleted
    $activityNameToDelete = $conn->real_escape_string(trim($_POST['activityName']));

    // Prepare SQL for deleting the activity
    $sql = "DELETE FROM activity WHERE activityName='$activityNameToDelete'";

    if ($conn->query($sql) === TRUE) {
        $message = "Activity deleted successfully.";
        header("location:activity.php?delete=success");
        exit();
    } else {
        $message = "Error deleting activity: " . $conn->error;
        header("location:activity.php?delete=failed");
        exit();
    }
}
?>

