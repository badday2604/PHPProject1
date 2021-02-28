<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple Books - Contact Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/cover-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
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
								<li class="tm-nav-li"><a href="#" class="tm-nav-link active">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Press Play for Inspiration</h2>
				<p class="col-12 text-center">Sometimes you just need a little encouragement and inspiration. Make a change in your life, learn to appreciate the here and now, and take that first step towards self-care.</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="thankyou.php" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								Kitchener, Ontario, Cananda
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>080-090-0110
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>info@simplebooks.co
							</a>
							<div class="tm-contact-social">
								<a href="http://www.facebook.com" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="http://www.twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="http://www.instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
						<h2 class="text-center tm-section-title">FAQs</h2>
						<p class="text-center">This section comes with different questions and answers about Simple Books website. We'd love to hear your questions and feedbacks.</p>
						<div class="tm-accordion">
							<button class="accordion">1. Is it legible?</button>
							<div class="panel">
							  <p>What does the design look like from a distance? What does it look like as a tiny thumbnail? If you can’t see what it’s about when you’re looking straight at it, you can’t expect your readers to either. Be sure to suitably adjust your design.</p>
							</div>
							
							<button class="accordion">2. Is it intriguing?</button>
							<div class="panel">
							  <p>Does the book cover entice you enough so you want to read on? It’s always difficult to separate yourself from your own design, so enlist the help of friends by asking them for their personal opinion. The more people you ask, the better.</p>
							</div>
							
							<button class="accordion">3. Is it emotive?</button>
							<div class="panel">
							  <p>We tend to think of readers as logical but it’s widely accepted that most purchase decisions are emotional. Again, step back and ask yourself if the design is drawing you in and if it’s compelling enough for you to read on.</p>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</main>

		<footer class="tm-footer text-center">
            <p>Copyright &copy; 2021 Simple Books</p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight) {
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    }
			  });
			}	
		});

		function formClick() {
			alert("Thank you for your feedback! We will send you confirmed email.");
		}
	</script>
</body>
</html>