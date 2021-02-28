<?php 
session_start();
if(isset($_SESSION["bookid"])) {
    $bookid = $_SESSION["bookid"];
} else {
    $bookid = 0;
}

?>

<?php 
// Need the database connection:
require('mysqli_connect.php');
$qry_str = "SELECT * FROM books WHERE id = $bookid && quantity > 0";
$r = mysqli_query($dbc, $qry_str);

//define variable and set empty values
$email = $firstName = $lastName = $phone = $payment = $cardNo = "";
$emailErr = $firstNameErr = $lastNameErr = $phoneErr = $paymentErr = $cardNoErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process payment
	$errors = [];

    // Validate email
    if(empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST['email']);

        // check if email address is well-formated
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } 
    }
    // Validate first name
    if(empty($_POST['first_name'])) {
        $firstNameErr = "First Name is required";
    } else {
        $firstName = test_input($_POST['first_name']);

        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {  
            $firstNameErr = "Only alphabets and white space are allowed";  
        }
    }
    // Validate last name
    if(empty($_POST['last_name'])) {
        $lastNameErr = "Last Name is required";
    } else {
        $lastName = test_input($_POST['last_name']);

        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {  
            $lastNameErr = "Only alphabets and white space are allowed";  
        }
    }
    // Validate phone
    if(empty($_POST['phone'])) {
        $phoneErr = "Phone Number is required";
    } else {
        $phone = test_input($_POST['phone']);

        if (!preg_match("/^[0-9]*$/", $phone) ) {  
            $phoneErr = "Only numeric value is allowed.";  
        }
    }
    // Validate payment
    if(empty($_POST['payment'])) {
        $paymentErr = "Payment Method is required";
    } else {
        $payment = test_input($_POST['payment']);
    }
    // Validate card number
    if(empty($_POST['card_no'])) {
        $cardNoErr = "Card Number is required";
    } else {
        $cardNo = test_input($_POST['card_no']);

        if (!preg_match("/^[0-9]*$/", $cardNo) ) {  
            $cardNoErr = "Only numeric value is allowed.";  
        }
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple Books - Checkout Page</title>
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
				<h2 class="col-12 text-center tm-section-title">Checkout</h2>
                <h3 class="col-12 text-center">Purchase Detail</h3>
				<p class="col-12 text-center">
                    <?php 
                        if($r) {
                            $el = mysqli_fetch_array($r, MYSQLI_ASSOC);
                            $quantity = (int)$el['quantity'];
                            echo "Book Name: <strong>".$el['name']."</strong><br/>";
                            echo "Author: <strong>".$el['author']."</strong><br/>";
                            echo "Price: <strong>$".number_format($el['unit_price'], 2)."</strong><br/>";
                            echo "In Stock: <strong>".$el['quantity']."</strong><br/>";
                        }
                
                    ?>
                </p>
			</header>

            <div class="tm-section tm-container-inner">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                        <span class="error"><?php echo $firstNameErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                        <span class="error"><?php echo $lastNameErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        <span class="error"><?php echo $phoneErr; ?></span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="paypal" value="paypal" <?php if($payment === 'paypal') echo "checked"; ?> >
                        <label class="form-check-label" for="paypal">Paypal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="visa" value="visa" <?php if($payment === 'visa') echo "checked"; ?> >
                        <label class="form-check-label" for="visa">Visa/Debit</label>
                    </div>
                    <span class="error"><?php echo $paymentErr; ?></span>
                    <br/><br/>
                    <div class="form-group">
                        <label for="card_no">Card Number</label>
                        <input type="text" class="form-control" id="card_no" name="card_no" value="<?php if(isset($_POST['card_no'])) echo $_POST['card_no']; ?>">
                        <span class="error"><?php echo $cardNoErr; ?></span>
                    </div>
                    <button type="submit" class="tm-btn tm-btn-success tm-btn-right" name="submit">Submit</button>
                </form>
			</div>
		</main>

        <?php 
        
        if(isset($_POST['submit'])) {
            if($emailErr == "" && $firstNameErr == "" && $lastNameErr == "" && $phoneErr == "" && $paymentErr == "" && $cardNoErr == "") {
                // Make the query:
                $qry_str = "INSERT INTO users (email, first_name, last_name, phone, card_no) values (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($dbc, $qry_str);
                
                mysqli_stmt_bind_param($stmt, "sssss", $email, $firstName, $lastName, $phone, $cardNo);
                // Run the query.
                mysqli_stmt_execute($stmt);

                if(mysqli_affected_rows($dbc) == 1) {
                    // fetch the record
                    $row = mysqli_stmt_store_result($stmt);
                    $q2 = "UPDATE books SET quantity = ($quantity-1) WHERE id = $bookid";
                    $res = mysqli_query($dbc, $q2);
                    if($res) {
                        $newURL = "thankyou.php";
                        header("Location: ".$newURL);
                    }
                }
            }
        }
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
        </script>
    </body>
</html>