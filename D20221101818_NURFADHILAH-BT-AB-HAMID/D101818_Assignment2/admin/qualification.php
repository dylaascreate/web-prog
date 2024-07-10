<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}

$title = 'Qualification';
include 'header.php';
?>

<section id="pricing" class="secondary-color scrollto clearfix ">
    <div class="row clearfix">
        <div class="col-3">
            <div class="section-heading">
                <h3>QUALIFICATION</h3>
                <h2 class="section-title">Less perfection, more authenticity</h2>
                <p class="section-subtitle">Here is my qualification!</p>
                <button class="addbut button"><i class="fa fa-upload fa-1x"></i>&nbsp;Add</button>
                <button class="editbut button"><i class="fa fa-edit fa-1x"></i>&nbsp;Edit</button>
            </div>
        </div>
        <div class="col-2-3 text-center" style="margin-top:10px;">
            <?php
            include 'connect.php';

            // Fetch activity data from the database
            $sql = "SELECT id, degree, year, abbreviation, university FROM qualification";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="pricing-block featured col-2 wow fadeInUp" data-wow-delay="0.6s">';
                    echo '<div class="pricing-block-content">';
                    echo '<h3>' .  $row['degree']  . '</h3>';
                    echo '<p class="pricing-sub">' . $row['year'] . '</p>';
                    echo '<div class="pricing">';
                    echo '<div class="price"><span></span>' . $row['abbreviation'] . '</div>';
                    echo '<p>' . $row['university'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No qualifications found.</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Lightbox for adding new qualification -->
<div id="addQualificationLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="qual_add.php"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="degree">Degree:</label>
                <input type="text" class="form-control" id="degree" name="degree" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="abbreviation">Abbreviation:</label>
                <input type="text" class="form-control" id="abbreviation" name="abbreviation" required>
            </div>
            <div class="form-group">
                <label for="university">University:</label>
                <input type="text" class="form-control" id="university" name="university" required>
            </div>
            <button type="submit" class="btn btn-block" name="add">Submit</button>
        </form>
    </div>
</div>

<!-- Lightbox for editing qualification -->
<div id="editQualificationLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="qual_edit.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="degree">Qualification Name:</label>
                <select class="form-control" id="degree" name="degree" required>
                    <?php
                    include 'connect.php';
                    $sql = "SELECT degree FROM qualification";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="'. $row['degree'] .'">'. $row['degree'] .'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="newQualificationName">New Qualification Name:</label>
                <input type="text" class="form-control" id="newQualificationName" name="newQualificationName" required>
            </div>
            <div class="form-group">
                <label for="newQualificationYear">New Year:</label>
                <input type="text" class="form-control" id="newQualificationYear" name="newQualificationYear" required>
            </div>
            <div class="form-group">
                <label for="newQualificationAbbreviation">New Abbreviation:</label>
                <input type="text" class="form-control" id="newQualificationAbbreviation" name="newQualificationAbbreviation" required>
            </div>
            <div class="form-group">
                <label for="newQualificationInstitution">New Institution:</label>
                <input type="text" class="form-control" id="newQualificationInstitution" name="newQualificationInstitution" required>
            </div>
            <button type="submit" class="btn btn-block" name="edit">Update</button>
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
    document.getElementById('addQualificationLightbox').style.display = 'flex';
});

document.querySelector('.editbut').addEventListener('click', function() {
    document.getElementById('editQualificationLightbox').style.display = 'flex';
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
