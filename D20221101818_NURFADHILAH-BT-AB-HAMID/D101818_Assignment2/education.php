<?php
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

            </div>

        </div>
    </section>

   
<?php
include 'footer.php';
?>