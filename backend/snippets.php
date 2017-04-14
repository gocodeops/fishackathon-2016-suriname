<?php
	$app->get('/area/getall/', 
		function($request, $response, $args){
		require 'database.php';

		try {
			$sql = "SELECT * FROM areas";
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
?>