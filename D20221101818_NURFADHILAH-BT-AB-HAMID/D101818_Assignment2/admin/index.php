<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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

    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
        <div class="pricing-block featured col-12 wow fadeInUp" data-wow-delay="0.6s">
            <div class="">
                <div class="login-form">
        
        <i class="fa fa-sign-up" id="register"></i><h2>Admin Login</h2>
        <?php	
        if(isset($_GET['login'])){
		if($_GET['login']=="gagal"){
			echo "<div class='alert'>Username and Password are not match !</div>";
		}
	    }?>
        <form action="login.php" method="POST">
        <div class="form-group">
        <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="admin112" required>
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="adminpasskey" required>
            </div>
            <button class="loginbut btn btn-block" type="submit">Login</button>
        </form>
        </div>
            </div>
        </div>
    </div>

<style>
.loginbut {
    background-color: #A020F0; 
    border-color: #A020F0;  
    color: #fff; 
}
</style>

</body>
</html>
