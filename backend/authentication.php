<?php
	$app->post('/login/', 
		function($request, $response, $args){
		require 'database.php';

		$username = htmlspecialchars($_POST['username']);
		$password = sha1(htmlspecialchars($_POST['password']));

		try {
			$sql = 'SELECT * FROM users WHERE username = $username AND password = $password';
			$run = $conn->prepare($sql);
			$run->execute();

			if ($run == 1) {
				echo 1;
			} else {
				echo "Your password or username is not correct, please try again";
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});
?>