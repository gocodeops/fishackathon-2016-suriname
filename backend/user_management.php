<?

$app->group('/users', function() {

	//Register
	$this->post('/add', function() {

		//Import
		require 'database.php';

		try {

			$sql = "INSERT INTO users () VALUES ()";
			$run = $conn->prepare($sql);
			$run = execute();

			if(run == 1) {
				echo 1;
			} else {
				echo 0;
			}

		} catch(PDOException $e) {
			die($e->getMessage());
		}

	});

	//Modify
	$this->post('/edit/{id}', function($request, $response, $args) {

		//Arguments
		$id = $args['id'];

		try {

			$sql = "UPDATE users SET firstname = '$name'";
			$run = $conn->prepare($sql);
			$run = execute();

			if(run == 1) {
				echo 1;
			} else {
				echo 0;
			}

		} catch(PDOException $e) {
			die($e->getMessage());
		}

	});

});

?>