<?

/* Overview file contains queries to get information -> overview */

//Overview users
$app->group('/overview', function() {

	$this->get('/users', function() {

		// echo "Yeah";

		//Import database
		require 'database.php';

		try {
			$sql = "SELECT * FROM users";
			$run = $conn->prepare($sql);
			$run = execute();
			$run->setFetchMode(PDO::FETCH_ASSOC);

			if($run == 1) {
				$resultArray = array();
				while ($result == $run->fetch()) {
					$resultArray[] = $result;
				}

				$resultArray = json_encode($resultArray);
				print_r($resultArray);
			}
		} catch(PDOException $e) {
			die($e->getMessage());
		}

	});

});

?>