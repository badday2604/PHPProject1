<?php 
// Need the database connection:
require('mysqli_connect.php');
$qry_str = "SELECT * FROM books WHERE quantity > 0 LIMIT 10";
$r = mysqli_query($dbc, $qry_str);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//echo "Book ID:".$_POST['bookid'];
	// Set session variables
	session_start();
	$_SESSION["bookid"] = $_POST['bookid'];
	$newURL = "checkout.php";
	header("Location: ".$newURL);
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Simple Books</title>
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
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Simple Books</h1>
								<h6 class="tm-site-description">feel difference everyday</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="#" class="tm-nav-link active">Home</a></li>
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
				<h2 class="col-12 text-center tm-section-title">Welcome to Simple Books</h2>
				<p class="col-12 text-center">Reading lists begin as a shelf full of hope until the year flies by, and you find yourself flooded with procrastination. Cheers to the books we’ve been meaning to read all these years and should probably start at some point.</p>
			</header>
			
			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Novel</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Comic</a></li>
					</ul>
				</nav>
			</div>

			<!-- Gallery -->
			<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-novel" class="tm-gallery-page">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/10.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Through the Breaking</h4>
								<p class="tm-gallery-description">Romance novels are all about relationships.</p>
								<p class="tm-gallery-price">$45 / $55</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/09.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">At the Going Down of the Sun...</h4>
								<p class="tm-gallery-description">It's important to find an art style that's relevant to the content.</p>
								<p class="tm-gallery-price">$65 / $70</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/11.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Now what?</h4>
								<p class="tm-gallery-description">Business books make bold statements.</p>
								<p class="tm-gallery-price">$30.50</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/12.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">The Good Guy</h4>
								<p class="tm-gallery-description">Cookbooks should always engage the senses. In the absence of taste and smell, lean on the visual with image and type that are most equally appetizing.</p>
								<p class="tm-gallery-price">$25.50</p>
							</figcaption>
						</figure>
					</article>
				</div> <!-- gallery page 1 -->
				
				<!-- gallery page 2 -->
				<div id="tm-gallery-page-comic" class="tm-gallery-page hidden">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/13.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Spider Man</h4>
								<p class="tm-gallery-description">When it comes to small people, colour and imagination play the biggest role.</p>
								<p class="tm-gallery-price">$25</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/14.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Western Comics</h4>
								<p class="tm-gallery-description">Often photography is used to depict a story that's real and true. From how-to or intimate stories.</p>
								<p class="tm-gallery-price">$30</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/15.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Captain America</h4>
								<p class="tm-gallery-description">Art and Design books lead with the image, giving readers a clear idea of what to expect.</p>
								<p class="tm-gallery-price">$45</p>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="img/gallery/16.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">The Mandalorian</h4>
								<p class="tm-gallery-description">Take minds to a parallel universe, a different time, or even far from this world with designs that leave plenty to the imagination.</p>
								<p class="tm-gallery-price">$50</p>
							</figcaption>
						</figure>
					</article>
				</div> <!-- gallery page 2 -->
			</div>

			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="img/img-02.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box"> 
							<h4 class="tm-gallery-title">View our newest books</h4>
							<p class="tm-mb-45">It only takes six minutes of reading to lower your blood pressure, so we suggest these short but sweet reads.<br/><br/>
							Banish screens from your bedroom and pick up a healthier habit. These books help you destress and decompress. Journal, reflect, and dream your way to a better tomorrow.</p>
							<a href="#books-tb" class="tm-btn tm-btn-default tm-right">Read More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="tm-section tm-container-inner" id="books-tb">
				<h2>Our library</h2>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Author</th>
							<th scope="col">Description</th>
							<th scope="col">Price</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						if($r) {
							$count = 1;
							while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								echo "<tr><th>".$count++."</th><td><span data-toggle='tooltip' title='Stock: ".$row['quantity']."'><div class='book-title'>".$row['name']."</div></span></td><td>".$row['author']."</td><td style=''>".
								$row['description']."</td><td>$".number_format($row['unit_price'], 2).
								"</td><td><i class='fas fa-cart-plus icon-cart' data-toggle='tooltip' title='Add to Cart' onclick='getBookID(".$row['id'].");return false;'></i></td></tr>";
							}
							echo "<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>";
						} else {
							echo "<tr><th></th><td></td><td></td><td></td><td></td><td></td></tr>";
						}
					?>
					</tbody>
				</table>
				<br/><br/>
				<a href="product.php" class="tm-btn tm-btn-success tm-right">View Book Store</a>
			</div>
	</main>
    <?php 
    /* free result set */
    mysqli_free_result($r);

    /* close connection */
    mysqli_close($dbc);
    
    ?>
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

		function getBookID(bookid) {
			var form = document.createElement('form');
			form.setAttribute('method', 'post');
			form.setAttribute('action', 'product.php');
			form.style.display = 'hidden';

			var input = document.createElement("input");
			input.setAttribute("type", "hidden");
			input.setAttribute("name", "bookid");
			input.setAttribute("value", bookid);
			form.appendChild(input);

			document.body.appendChild(form);
			form.submit();
		};

	</script>
	</body>
</html>