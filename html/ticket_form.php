<?php
session_start();

$ticketbody = <<<HTML

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KeyKey | Ticket Prenotation</title>

	<link rel="stylesheet" href="../assets/css/ticket_form.css">
</head>

<body>
	<!-- Main Section -->
	<section>
		<form method="post" action="./ticket_submission.php">
			<!-- Central Logo -->
			<div class="logo">
				<a href="../index.html" target="_self">
					<img src="../assets/imgs/logo.png" alt="">
				</a>
			</div>

			<!-- User id chekc -->
			<h1>User Verification</h1> 

			<!-- ID input box -->
			<div class="id-box">
				<div class="input-field id">
					<input type="username" placeholder="User Id" name="user" id="user" autocomplete="off" required>
				</div>
			</div>

			<!-- Plan Choice -->
			<h1>Choose a plan </h1>

			<div class="pricing">
				<div class="column">
					<!-- Order Info -->
					<div class="info">
						<h4>&euro; 2</h4>
						<div class="features">
							<h5><li>1 Refill</li></h5>
							<h5><li>5&euro; credit on the stick</li></h5>
						</div>
					
						<!-- CheckBox -->
						<label class="container"> Select
							<input type="radio" name="radio" value="5">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="column">
					<!-- Order Info -->
					<div class="info">
						<h4>&euro; 5</h4>
						<div class="features">
							<h5><li>1 Refill</li></h5>
							<h5><li>10&euro; credit on the stick</li></h5>
						</div>
					
						<!-- CheckBox -->
						<label class="container"> Select
							<input type="radio" name="radio" value="10">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="column">
					<!-- Order Info -->
					<div class="info">
						<h4>&euro; 9</h4>
						<div class="features">
							<h5><li>1 Refill</li></h5>
							<h5><li>20&euro; credit on the stick</li></h5>
						</div>
					
						<!-- CheckBox -->
						<label class="container"> Select
							<input type="radio" name="radio" value="20">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>

			<!-- Submit Button -->
			<div class="action">
				<button type="submit" name="order">SUBMIT ORDER</button>
			</div>
		</form>
	</section>

	<!-- My js scripts -->
	<script type="text/javascript" src="../js/ticket_form.js"></script>
</body>

</html>

HTML;

if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);
    
	echo $ticketbody;

	
} else {
    header("location: login.php");
}

?>
