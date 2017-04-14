<?php
	$app->post('/marker/new/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			// posts
			$name = htmlspecialchars($_POST['name']);
			$lat = htmlspecialchars($_POST['lat']);
			$lng = htmlspecialchars($_POST['lng']);
			$content = htmlspecialchars($_POST['content']);

			$sql = "INSERT INTO markers (name, lat, lng, content) VALUES ('$name', '$lat', '$lng', '$content')";
			$run = $conn->prepare($sql);
			$run->execute();

			if ($run == 1) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});
	
	$app->get('/marker/getall/', 
		function($request, $response, $args){
		require 'database.php';

		try {
			$sql = "SELECT * FROM markers";
			$run = $conn->prepare($sql);
			$run->execute();
			$run->setFetchMode(PDO::FETCH_ASSOC);
			
			// send response
			if ($run == 1) {
				$resultarray = array();
				while ($result = $run->fetch()) {
					$resultarray[] = $result;
				}
				$resultarray = json_encode($resultarray);
				print_r($resultarray);	

			} else {
				echo 0;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});

	$app->get('/marker/getbyid/{id}/', 
		function($request, $response, $args){
		require 'database.php';

		// get header
		$id = $args['id'];

		try {
			$sql = "SELECT * FROM markers WHERE id = '$id'";
			$run = $conn->prepare($sql);
			$run->execute();
			$run->setFetchMode(PDO::FETCH_ASSOC);
			
			// send response
			if ($run == 1) {
				$resultarray = array();
				while ($result = $run->fetch()) {
					$resultarray[] = $result;
				}
				$resultarray = json_encode($resultarray);
				print_r($resultarray);	

			} else {
				echo 0;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});

	$app->post('/marker/delete/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);

			$sql = "DELETE FROM markers WHERE id = '$id'";
			$run = $conn->prepare($sql);
			$run->execute();

			if ($run == 1) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});

	$app->post('/marker/update/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);
			$name = htmlspecialchars($_POST['name']);
			$lat = htmlspecialchars($_POST['lat']);
			$lng = htmlspecialchars($_POST['lng']);
			$content = htmlspecialchars($_POST['content']);

			$sql = "UPDATE areas SET name='$name', lat='$lat', lng='$lng', content='$content' WHERE id = '$id'";
			$run = $conn->prepare($sql);
			$run->execute();

			if ($run == 1) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	});	
?>