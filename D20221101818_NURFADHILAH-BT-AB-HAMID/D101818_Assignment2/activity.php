<?php
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

<?php
include 'footer.php';
?>