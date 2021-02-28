<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple Books - Thank you</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" /> 
    <link href="css/all.min.css" rel="stylesheet" />   
    <link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<body> 
	<div class="container">
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/cover-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-books-logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Simple Books</h1>
								<h6 class="tm-site-description">feel difference everyday</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="product.php" class="tm-nav-link">Store</a></li>
                                <li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Thank You</h2>
				<p class="col-12 text-center">Thank you for choosing us. We hope you find interesting time with our book store.</p>
			</header>

            <div class="tm-container-inner text-center">
				<div class="row">
					<div class="col-12">
                        <h4 class="tm-history-title"><a href="index.php" target="_self">Back to Home Page</a></h4>	
					</div>
				</div>
			</div>

		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 Simple Books</p>
		</footer>
        <script src="js/jquery.min.js"></script>
        <script src="js/parallax.min.js"></script>
        <script>
            $(document).ready(function(){
                // Handle click on paging links
                $('.tm-paging-link').click(function(e){
                    e.preventDefault();
                    
                    var page = $(this).text().toLowerCase();
                    $('.tm-gallery-page').addClass('hidden');
                    $('#tm-gallery-page-' + page).removeClass('hidden');
                    $('.tm-paging-link').removeClass('active');
                    $(this).addClass("active");
                });
            });
        </script>
    </body>
</html>