<?php

	$app->post('/area/new/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			// posts
			$name = htmlspecialchars($_POST['name']);
			$type = htmlspecialchars($_POST['type']);
			$lat = htmlspecialchars($_POST['lat']);
			$lng = htmlspecialchars($_POST['lng']);
			$radius = htmlspecialchars($_POST['radius']);
			$content = htmlspecialchars($_POST['content']);

			$sql = "INSERT INTO areas (name, type, lat, lng, radius, content) VALUES ('$name', '$type', '$lat', '$lng', '$radius', '$content')";
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
	
	$app->get('/area/getall/', 
		function($request, $response, $args){
		require 'database.php';

		try {	
			$sql = "SELECT areas.name, areas.lat, areas.lng, areas.radius, area_type.color, areas.content FROM areas INNER JOIN area_type 
				ON areas.type = area_type.id";
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

	// $app->get('/area/getbyid/{id}/', 
	// 	function($request, $response, $args){
	// 	require 'database.php';

	// 	// get header
	// 	$id = $args['id'];

	// 	try {
	// 		$sql = "SELECT * FROM areas WHERE id = '$id'";
	// 		$run = $conn->prepare($sql);
	// 		$run->execute();
	// 		$run->setFetchMode(PDO::FETCH_ASSOC);
			
	// 		// send response
	// 		if ($run == 1) {
	// 			$resultarray = array();
	// 			while ($result = $run->fetch()) {
	// 				$resultarray[] = $result;
	// 			}
	// 			$resultarray = json_encode($resultarray);
	// 			print_r($resultarray);	

	// 		} else {
	// 			echo 0;
	// 		}
	// 	} catch (PDOException $e) {
	// 		die($e->getMessage());
	// 	}
	// });

	$app->post('/area/delete/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);

			$sql = "DELETE FROM areas WHERE id = '$id'";
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

	$app->post('/area/update/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);
			$name = htmlspecialchars($_POST['name']);
			$lat = htmlspecialchars($_POST['lat']);
			$lng = htmlspecialchars($_POST['lng']);
			$radius = htmlspecialchars($_POST['radius']);
			$content = htmlspecialchars($_POST['content']);

			$sql = "UPDATE areas SET name='$name', lat='$lat', lng='$lng', radius='$radius', content='$content' WHERE id = '$id'";
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