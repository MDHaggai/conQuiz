<?php
if(isset($_GET['score'])) {
    $score = $_GET['score'];
    $response = array('score' => $score);
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo "Score not found";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Quiz - Score</title>
	<style>
		body {
			background-color: #f7f7f7;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.6;
			margin: 0;
			padding: 0;
		}

		.container {
			margin: 20px auto;
			max-width: 600px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		h1, h2 {
			font-weight: normal;
			margin-top: 0;
		}

		h1 {
			font-size: 36px;
			text-align: center;
			margin-bottom: 30px;
		}

		h2 {
			font-size: 24px;
			margin-top: 30px;
		}

		.score {
			margin-top: 50px;
			font-size: 30px;
			text-align: center;
		}

		.score span {
			font-weight: bold;
			color: #007bff;
		}

		button {
			margin-top: 30px;
			padding: 10px 20px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
		}

		button:hover {
			background-color: #0062cc;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Quiz - Score</h1>

		<?php
		if (isset($_GET['score'])) {
			$score = $_GET['score'];

			echo '<div class="score">Your score is: <span>'.$score.'</span></div>';
		} else {
			echo '<div class="score">No score found</div>';
		}
        document.querySelector('form').addEventListener('submit', function (e)) {
            e.preventDefault(); // prevent the form from submitting normally
        
            // submit the form via AJAX instead
            let form = this;
            let formData = new FormData(form);
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) { // request finished and response is ready
                    if (xhr.status === 200) { // request succeeded
                        let response = JSON.parse(xhr.responseText);
                        let score = response.score;
                        window.location.href = 'score.php?score=' + encodeURIComponent(score); // redirect to score page with the score as a parameter
                    } else { // request failed
                        console.error(xhr.statusText);
                    }
                }
            };
            xhr.open(form.method, form.action, true);
            xhr.send(formData);
        });
        
		?>
	</div>
</body>
</html>