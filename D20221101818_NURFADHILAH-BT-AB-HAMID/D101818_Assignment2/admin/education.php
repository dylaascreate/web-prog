<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}

$title = 'Education';
include 'header.php';
?>

    <section id="education" class="introduction scrollto">

        <div class="row clearfix">

            <div class="col-3">
                <div class="section-heading">
                    <h3>EDUCATION</h3>
                    <h2 class="section-title">A learning curve is essential to growth</h2>
                    <p class="section-subtitle">Here is my education background!</p>
                
                <button class="addbut button"><i class="fa fa-upload fa-1x"></i>&nbsp;Add</button>
                <button class="editbut button"><i class="fa fa-edit fa-1x"></i>&nbsp;Edit</button>
                </div>
            </div>
            
            <div class="polaroid col-2-3" style="margin-top: 10px;">

            <?php
            include 'connect.php';
            // Fetch education data from the database
            $sql = "SELECT * FROM education";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    $eduTitle = $row['eduTitle'];
                    $eduYears = $row['eduYears'];
                    $eduInstitution = $row['eduInstitution'];
                    $eduCgpa = $row['eduCgpa'];
                    $eduImage = $row['eduImage'];

                    echo '<div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">';
                    echo '<div class="icon-block-description">';
                    echo '<h4>' . $eduTitle . '</h4>';
                    echo '<b>' . $eduYears . '</b>';
                    echo '<p>' . $eduInstitution . '<br>CGPA of ' . $eduCgpa . '</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.3s">';
                    echo '<img style="width:100%" src="' . $eduImage . '">';
                    echo '<div class="container">';
                    echo '<p>' . $eduInstitution . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No education records found.</p>";
            }
            ?>


                <!-- <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon-block-description">
                        <h4>Diploma of Science Computer</h4>
                        <b>2019 - 2021</b>
                        <p>Sultan Idris Education University<br>CGPA of 3.86</p>
                    </div>
                </div>
                <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.3s">
                    <img style="width:100%" src="images/upsi.jpeg">
                    <div class="container">
                    <p>Sultan Idris Education University</p>
                    </div>
                </div> -->

            </div>

        </div>
    </section>

    <!-- Lightbox for adding new education entry -->
<div id="addEducationLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="edu_add.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eduTitle">Title:</label>
                <input type="text" class="form-control" id="eduTitle" name="eduTitle" required>
            </div>
            <div class="form-group">
                <label for="eduYears">Years:</label>
                <input type="text" class="form-control" id="eduYears" name="eduYears" required>
            </div>
            <div class="form-group">
                <label for="eduInstitution">Institution:</label>
                <input type="text" class="form-control" id="eduInstitution" name="eduInstitution" required>
            </div>
            <div class="form-group">
                <label for="eduCgpa">CGPA:</label>
                <input type="text" class="form-control" id="eduCgpa" name="eduCgpa" required>
            </div>
            <div class="form-group">
                <label for="eduImage">Image:</label>
                <input type="file" class="form-control" id="eduImage" name="eduImage" required>
            </div>
            <button type="submit" class="btn btn-block">Submit</button>
        </form>
    </div>
</div>

<!-- Lightbox for editing education entry -->
<div id="editEducationLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="edu_edit.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="currentEdu">Select Education:</label>
                <select class="form-control" id="currentEdu" name="currentEdu" required>
                    <?php
                    // Fetch education titles from the database
                    include 'connect.php';
                    $sql = "SELECT id, eduTitle FROM education";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['eduTitle'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="newEduTitle">New Title (optional):</label>
                <input type="text" class="form-control" id="newEduTitle" name="newEduTitle">
            </div>
            <div class="form-group">
                <label for="newEduYears">New Years (optional):</label>
                <input type="text" class="form-control" id="newEduYears" name="newEduYears">
            </div>
            <div class="form-group">
                <label for="newEduInstitution">New Institution (optional):</label>
                <input type="text" class="form-control" id="newEduInstitution" name="newEduInstitution">
            </div>
            <div class="form-group">
                <label for="newEduCgpa">New CGPA (optional):</label>
                <input type="text" class="form-control" id="newEduCgpa" name="newEduCgpa">
            </div>
            <div class="form-group">
                <label for="newEduImage">New Image (optional):</label>
                <input type="file" class="form-control" id="newEduImage" name="newEduImage">
            </div>
            <button type="submit" class="btn btn-block">Update</button>
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
    document.getElementById('addEducationLightbox').style.display = 'flex';
});

document.querySelector('.editbut').addEventListener('click', function() {
    document.getElementById('editEducationLightbox').style.display = 'flex';
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