<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}

$title = 'Interest';
include 'header.php';
?>
    
    <section id="activity" class="clearfix scrollto">
        <div class="row clearfix">

            <div class="col-3">

                <div class="section-heading">
                    <h3>INTEREST</h3>
                    <h2 class="section-title">Interest is the most important thing in life</h2>
                    <p class="section-subtitle">Here is one of my interest!</p>
                    
                <button class="editbut button"><i class="fa fa-edit fa-1x"></i>&nbsp;Edit</button>
                <button class="delbut button"><i class="fa fa-trash fa-1x"></i>&nbsp;Delete</button>
                </div>

            </div>

            <div class="col-2-3" style="margin-top: 50px;">
                <?php
                include 'connect.php';

                //Fetch interest data from database
                $sql ="SELECT * FROM interest";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()){
                        $interest_name = $row['interest_name'];
                        $description = $row['description'];
                        // $icon_class = $row ['icon_class'];

                        echo '<div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">';
                        // echo '<div class="icon">';
                        // echo '<i class="' . $icon_class . '"></i></div>';
                        echo '<div class="icon-block-description">';
                        echo '<h4>' . $interest_name . '</h4>';
                        echo '<p>' . $description . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }

                ?>
            </div>
    </section>
    
<!-- Lightbox for editing interest -->
<div id="editInterestLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="int_edit.php">
            <div class="form-group">
                <label for="interestName">Interest:</label>
                <select class="form-control" id="interestName" name="interestId" required>
                    <?php 
                    // Fetch education titles from the database
                    include 'connect.php';
                    $sql = "SELECT id, interest_name FROM interest";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['interest_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="newInterestName">New Interest Name:</label>
                <input type="text" class="form-control" id="newInterestName" name="newInterestName" required>
            </div>
            <div class="form-group">
                <label for="interestDesc">Interest Description:</label>
                <textarea class="form-control" id="interestDesc" name="interestDesc" required></textarea>
            </div>
            <button type="submit" class="btn btn-block" name="edit">Update</button>
        </form>
    </div>
</div>

<!-- Lightbox for deleting interest -->
<div id="deleteInterestLightbox" class="lightbox">
    <div class="lightbox-content">
        <button class="closeButton"><i class="fa fa-close"></i></button>
        <form method="POST" action="int_del.php">
            <div class="form-group">
                <label for="interestNameDel">Interest:</label>
                <select class="form-control" id="interestNameDel" name="interestIdDel" required>
                    <?php 
                    // Fetch education titles from the database
                    include 'connect.php';
                    $sql = "SELECT id, interest_name FROM interest";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['interest_name'] . '</option>';
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
document.querySelector('.editbut').addEventListener('click', function() {
    document.getElementById('editInterestLightbox').style.display = 'flex';
});

document.querySelector('.delbut').addEventListener('click', function() {
    document.getElementById('deleteInterestLightbox').style.display = 'flex';
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