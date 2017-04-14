<?php

	$app->post('/law/new/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			// posts
			$title = htmlspecialchars($_POST['title']);
			$body = htmlspecialchars($_POST['body']);

			$sql = "INSERT INTO laws (title, body) VALUES ('$title', '$body')";
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
	
	$app->get('/law/getall/', 
		function($request, $response, $args){
		require 'database.php';

		try {
			$sql = 'SELECT * FROM laws';
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

	$app->get('/law/getbyid/{id}/', 
		function($request, $response, $args){
		require 'database.php';

		// get header
		$id = $args['id'];

		try {
			$sql = "SELECT * FROM laws WHERE id='$id'";
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

	$app->post('/law/delete/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);

			$sql = "DELETE FROM laws WHERE id = '$id'";
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

	$app->post('/law/update/', 
		function($request, $response, $args){
		require 'database.php';
		try {
			$id = htmlspecialchars($_POST['id']);
			$title = htmlspecialchars($_POST['title']);
			$body = htmlspecialchars($_POST['body']);

			$sql = "UPDATE laws SET title='$title', body='$body' WHERE id = '$id'";
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