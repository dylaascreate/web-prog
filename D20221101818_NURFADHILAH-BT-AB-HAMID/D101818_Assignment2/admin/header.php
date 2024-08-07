<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>'.$title.'</title>';
    ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" title="Favicon"/>

    <!-- CSS file -->
    <link rel="stylesheet" href="assets/style.css"/>

    <!-- JS file -->

    <!-- Namari Color CSS -->
    <link rel="stylesheet" href="assets/color.css">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="assets/font-awesome.min.css">

    <!-- Animate CSS -->
    <link href="assets/animate.css" rel="stylesheet" type="type/css">

    <!-- Public Libraries -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
</head>

<body>

    <!-- Header -->
    <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
        <div id="header" class="nav-collapse">
            <div class="row clearfix">
                <div class="col-1">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="admin.php">
                            <img src="images/logo.png" id="banner-logo"/>
                        </a>
                    </div>

                    <aside>
                        <!--Social Icons -->
                        <ul class="social-icons">
                            <li>
                                <a target="_blank" title="Facebook" href="">
                                    <i class="fa fa-facebook fa-1x"></i><span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Google+" href="">
                                    <i class="fa fa-google-plus fa-1x"><span>Google+</span></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="twitter" href="">
                                    <i class="fa fa-twitter fa-1x"><span>Twitter</span></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Instagram" href="">
                                    <i class="fa fa-instagram fa-1x"><span>Instagram</span></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="LinkedIn" href="">
                                    <i class="fa fa-linkedin fa-1x"><span>LinkedIn</span></i>
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <nav id="nav-main">
                        <ul>
                            <li>
                                <a href="about.php">About</a>
                            </li>
                            <li>
                                <a href="activity.php">Activity</a>
                            </li>
                            <li>
                                <a href="education.php">Education</a>
                            </li>
                            <li>
                                <a href="interest.php">Interest</a>
                            </li>
                            <li>
                                <a href="qualification.php">Qualification</a>
                            </li>
                            <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i>
                                &nbsp;Logout
                            </a>
                            </li>
                        </ul>
                    </nav>

                    <div id="nav-trigger"><span></span></div>
                    <nav id="nav-mobile"></nav>

                </div>
            </div>
        </div>
    </header>