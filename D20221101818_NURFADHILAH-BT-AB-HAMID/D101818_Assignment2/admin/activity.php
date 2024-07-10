<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

$title = 'Activity';
include 'header.php';
?>

<section id="activity" class="clearfix scrollto">
    <div class="row clearfix">
        <div class="col-3">
            <div class="section-heading">
                <h3>ACTIVITY</h3>
                <h2 class="section-title">A hobby a day keeps the doldrums away</h2>
                <p class="section-subtitle">Here is few activities that i do as hobby!</p>
                <button class="addbut button"><i class="fa fa-upload fa-1x"></i>&nbsp;Add</button>
                <button class="editbut button"><i class="fa fa-edit fa-1x"></i>&nbsp;Edit</button>
                <button class="delbut button"><i class="fa fa-trash fa-1x"></i>&nbsp;Delete</button>
            </div>
        </div>
        <div class="col-2-3" style="margin-top:10px;">
            <?php
            include 'connect.php';

            // Fetch activity data from the database
            $sql = "SELECT iconImage, activityName FROM activity";
            $result = $conn->query($sql);

            // Check if there are any records
            if ($result->num_rows > 0) {
                // Loop through each record and output the HTML
                while ($row = $result->fetch_assoc()) {
                    $iconImage = htmlspecialchars($row['iconImage']);
                    $activityName = htmlspecialchars($row['activityName']);
                    echo '<a href="#" class="col-3">';
                    echo '<img src="' . $iconImage . '" alt="Activity"/>';
                    echo '<div class="activity-overlay"><span>' . $activityName . '</span></div>';
                    echo '</a>';
                }
            } else {
                echo '<p>No activities found.</p>';
            }
            ?>   
        </div>
    </div>
</section>

<!-- Lightbox for adding new activity -->
<div id="addActivityLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="act_add.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="iconImage">Icon Image:</label>
                <input type="file" class="form-control" id="iconImage" name="iconImage" required>
            </div>
            <div class="form-group">
                <label for="activityName">Activity Name:</label>
                <input type="text" class="form-control" id="activityName" name="activityName" required>
            </div>
            <button type="submit" class="btn btn-block" name="add">Submit</button>
        </form>
    </div>
</div>

<!-- Lightbox for editing activity -->
<div id="editActivityLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="act_edit.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="activityName">Activity Name:</label>
                <select class="form-control" id="activityName" name="activityName" required>
                    <?php
                    // Fetch activity names from the database
                    include 'connect.php';
                    $sql = "SELECT activityName FROM activity";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="'. $row['activityName'] .'">'. $row['activityName'] .'</option>';
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="newActivityName">New Activity Name:</label>
                <input type="text" class="form-control" id="newActivityName" name="newActivityName" required>
                </div>
                <div class="form-group">
                    <label for="newIconImage">New Icon Image (optional):</label>
                    <input type="file" class="form-control" id="newIconImage" name="newIconImage">
                </div>
                <button type="submit" class="btn btn-block" name="edit">Update</button>
        </form>
    </div>
</div>

<!-- Lightbox for deleting activity -->
<div id="deleteActivityLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="act_del.php">
            <div class="form-group">
                <label for="activityName">Activity Name:</label>
                <select class="form-control" id="activityName" name="activityName" required>
                    <?php
                    // Fetch activity names from the database
                    $result = $conn->query($sql); // Reusing previously defined $sql
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="'. $row['activityName'] .'">'. $row['activityName'] .'</option>';
                    }
                    ?>
                </select>
                </div>
                <button type="submit" class="btn btn-block" name="delete">Delete</button>
            </form>
    </div>
</div>

<style>
.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.lightbox-content {
    background: white;
    padding: 20px;
    border-radius: 5px;
}

.closeButton {
    background: red;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}
</style>

<script>
document.querySelector('.addbut').addEventListener('click', function() {
    document.getElementById('addActivityLightbox').style.display = 'flex';
});

document.querySelector('.editbut').addEventListener('click', function() {
    document.getElementById('editActivityLightbox').style.display = 'flex';
});

document.querySelector('.delbut').addEventListener('click', function() {
    document.getElementById('deleteActivityLightbox').style.display = 'flex';
});

document.querySelectorAll('.closeButton').forEach(function(button) {
    button.addEventListener('click', function() {
        document.querySelectorAll('.lightbox').forEach(function(lightbox) {
            lightbox.style.display = 'none';
        });
    });
});
</script>

<?php
include 'footer.php';
?>