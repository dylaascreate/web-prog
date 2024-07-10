<?php
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

<?php
include 'footer.php';
?>
