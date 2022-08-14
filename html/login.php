
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KeyKey | LogIn</title>

	<link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
	<section>
		<form method="post" action="">
			<!-- Central Logo -->
			<div class="logo">
				<a href="../index.html" target="_self">
					<img src="../assets/imgs/logo.png" alt="">
				</a>
			</div>

			<!-- User info form -->
			<h1>Login</h1>

			<div class="content">
				<div class="input-field username">
					<input type="username" placeholder="Username" id="username" name="username" autocomplete="off" required>
				</div>
				<div class="input-field pwd">
					<input type="password" placeholder="Password" id="password" name="password" required>
				</div>
			</div>

			<div class="err-msg">
				<!-- PHP Code -->
				<?php
				session_start();
				require_once('../database/config.php');

				if (isset($_SESSION['session_id'])) {
					header('Location: ticket_form.php');
					exit;
				}

				if (isset($_POST['login'])) {
					$username = $_POST['username'] ?? '';
					$password = $_POST['password'] ?? '';
					
					if (empty($username) || empty($password)) {
						$msg = 'Inserisci username e password.';
					} else {
						$query = "
							SELECT username, password
							FROM users
							WHERE username = :username
						";
						
						$check = $pdo->prepare($query);
						$check->bindParam(':username', $username, PDO::PARAM_STR);
						$check->execute();
						
						$user = $check->fetch(PDO::FETCH_ASSOC);
						
						if (!$user || password_verify($password, $user['password']) === false) {
							$msg = 'Credenziali utente errate.';
						} else {
							session_regenerate_id();
							$_SESSION['session_id'] = session_id();
							$_SESSION['session_user'] = $user['username'];
							
							header('Location: ticket_form.php');
							exit;
						}
					}	
					echo "Error: *";				
					echo $msg;
				}
				?>
			</div>

			<!-- Submit Button -->
			<div class="action">
				<button type="submit" name="login">LOGIN</button>
			</div>
		</form>
	</section>

</body>

</html>