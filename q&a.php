<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
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

		.question {
			margin-bottom: 20px;
		}

		.answers {
			margin-left: 20px;
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
		<h1>Quiz</h1>
		<form method="post" action="score.php">
			<?php
			$servername = "localhost"; // Replace with your server name
			$username = "root"; // Replace with your username
			$password = ""; // Replace with your password
			$dbname = "quizq"; // Replace with your database name

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT * FROM questions";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$question_id = $row['id'];
					$question = $row['question'];
					$answer1 = $row['answer1'];
					$answer2 = $row['answer2'];
					$answer3 = $row['answer3'];
					$answer4 = $row['answer4'];
					$answer = $row['correct_answer'];

					echo '<div class="question">';
					echo '<h2>'.$question.'</h2>';
					echo '<div class="answers">';
          echo '<input type="radio" name="'.$question_id.'" value="'.$answer1.'"> <label>A.</label> '.$answer1.'<br>';
          echo '<input type="radio" name="'.$question_id.'" value="'.$answer2.'"> <label>B.</label> '.$answer2.'<br>';
          echo '<input type="radio" name="'.$question_id.'" value="'.$answer3.'"> <label>C.</label> '.$answer3.'<br>';
          echo '<input type="radio" name="'.$question_id.'" value="'.$answer4.'"> <label>D.</label> '.$answer4.'<br>';
          echo '</div>';
          echo '</div>';
          }
        }
          
          echo '<button type="submit" name="submit">Submit</button>';
          echo '</form>';
          echo '</div>';
          
          $conn->close();
          ?>
          
          <script>
            document.querySelector('form').addEventListener('submit', function(e) {
              e.preventDefault(); // prevent the form from submitting normally
          
              // submit the form via AJAX instead
              let form = this;
              let formData = new FormData(form);
              let xhr = new XMLHttpRequest();
              xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) { // request finished and response is ready
                  if (xhr.status === 200) { // request succeeded
                    window.location.href = 'score.php?score=' + encodeURIComponent(xhr.responseText); // redirect to score page with the score as a parameter
                  } else { // request failed
                    console.error(xhr.statusText);
                  }
                }
              };
              xhr.open(form.method, form.action, true);
              xhr.send(formData);
            });
          </script>
          
          </body>
          </html>
          