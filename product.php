<?php 
// Need the database connection:
require('mysqli_connect.php');
$qry_str = "SELECT * FROM books WHERE quantity > 0";
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
    <title>Simple Books - Product Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" /> 
    <link href="css/all.min.css" rel="stylesheet" />   
    <link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<body> 
	<div class="container">
	<!-- Top box -->
    <!-- <div class="login-box">
    <span>asdasdasd</span>
    </div> -->
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
								<li class="tm-nav-li"><a href="#" class="tm-nav-link active">Store</a></li>
                                <li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Our Library</h2>
			</header>

            <div class="tm-section tm-container-inner" id="books-tb">
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
						} else {
                            echo "<tr><th></th><td></td><td></td><td></td><td></td><td></td></tr>";
						}
					
					?>
					</tbody>
				</table>
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
	</div>
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