<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeyKey | SignUp</title>

    <link rel="stylesheet" href="../assets/css/signup.css">
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
			<h1>Program registration form</h1>
			
			<div class="content">
				<div class="input-field name">
					<input type="username" placeholder="Name" name="username" id="username" required>
				</div>
				<div class="input-field class">
					<input type="text" placeholder="Class" name="class" id="class" required>
				</div>
				<div class="input-field section">
					<input type="text" placeholder="Section" name="section" id="section" required>
				</div>
			</div>

			<div class="err-msg">
				<!-- PHP code -->
				<?php
				require_once('../database/database.php');

				if (isset($_POST['register'])) {
					$username = $_POST['username'] ?? '';
					$class = $_POST['class'] ?? '';
					$section = $_POST['section'] ?? '';
					
					$isUsernameValid = filter_var(
						$username,
						FILTER_VALIDATE_REGEXP, [
							"options" => [
								"regexp" => "/^[a-z\d_]{3,20}$/i"
							]
						]
					);

					$isClassValid = filter_var(
						$class,
						FILTER_VALIDATE_REGEXP, [
							"options" => [
								"regexp" => "/^[1-5\d_]{1,1}$/i"
							]
						]
					);

					$isSectionValid = filter_var(
						$section,
						FILTER_VALIDATE_REGEXP, [
							"options" => [
								"regexp" => "/^[a-n\d_]{1,1}$/i"
							]
						]
					);
					
					if (empty($username) || empty($class) || empty($section)) {
						$msg = 'Missing fields...';
					} elseif ($isUsernameValid === false) {
						$msg = 'Username invalid...';
					} elseif ($isClassValid === false) {
						$msg = 'Invalid Class...';
					} elseif ($isSectionValid === false) {
						$msg = 'Invalid Section...';
					} else {
						$query = "
							SELECT id
							FROM requests
							WHERE username = :username
						";
						
						$check = $pdo->prepare($query);
						$check->bindParam(':username', $username, PDO::PARAM_STR);
						$check->execute();
						
						$user = $check->fetchAll(PDO::FETCH_ASSOC);
						
						if (count($user) > 0) {
							$msg = 'This username is already registered.';
						} else {
							$query = "
								INSERT INTO requests
								VALUES (0, :username, :class, :section)
							";
						
							$check = $pdo->prepare($query);
							$check->bindParam(':username', $username, PDO::PARAM_STR);
							$check->bindParam(':class', $class, PDO::PARAM_STR);
							$check->bindParam(':section', $section, PDO::PARAM_STR);
							$check->execute();
							
							if ($check->rowCount() > 0) {
								$msg = '<script>window.location.href="../html/request_success.html"</script>';
							} else {
								$msg = 'Data pull failed.';
							}
						}
					}	
					echo "Error: *";		
					echo $msg;
				}
				?>
			</div>

            <!-- Submit Button -->
			<div class="action">
				<button type="submit" name="register">PARTICIPATE</button>
			</div>
        </form>
    </section>
</body>

</html>