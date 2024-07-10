<?php
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
    
<?php
include 'footer.php';
?>