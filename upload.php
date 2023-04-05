<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizq";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted data
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
    $answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);
    $answer3 = mysqli_real_escape_string($conn, $_POST['answer3']);
    $answer4 = mysqli_real_escape_string($conn, $_POST['answer4']);
    $correct_answer = mysqli_real_escape_string($conn, $_POST['correct_answer']);

    // Insert the data into the database
    $stmt = $conn->prepare("INSERT INTO questions (question, answer1, answer2, answer3, answer4, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $question, $answer1, $answer2, $answer3, $answer4, $correct_answer);

    if ($stmt->execute()) {
        $success = true;
    } else {
        echo 'Error: ' . $stmt->error;
    }
}

if ($success) {
    header("Location: upload.php?success=true");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Upload</title>
    <style>
        /* Your CSS styles here */
        /* Style the form container */
.form-container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

/* Style the form inputs and labels */
label, textarea, input[type=text] {
  display: block;
  margin-bottom: 10px;
  font-size: 18px;
}

textarea {
  width: 100%;
  height: 100px;
  padding: 10px;
}

input[type=text] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border-radius: 5px;
  border: 1px solid #ccc;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #3e8e41;
}
.success-message {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 50px;
  background-color: green;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  font-weight: bold;
  animation: slide-down 1s ease;
}

@keyframes slide-down {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}

    </style>
</head>
<body>
    <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <script>
            alert('Upload successful!');
        </script>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="question">Question:</label>
        <textarea name="question"></textarea>
        <br>
        <label for="answer1">Answer 1:</label>
        <input type="text" name="answer1">
        <br>
        <label for="answer2">Answer 2:</label>
        <input type="text" name="answer2">
        <br>
        <label for="answer3">Answer 3:</label>
        <input type="text" name="answer3">
        <br>
        <label for="answer4">Answer 4:</label>
        <input type="text" name="answer4">
        <br>
        <label for="correct_answer">Correct answer:</label>
        <input type="text" name="correct_answer">
        <br>
        <input type="submit" value="Upload">
    </form>

    <script>
        if (window.location.search.includes('success=true')) {
            // Clear all input fields
            // Clear the form fields
            document.querySelector('form').reset();

           // Show a success message
            const successMessage = document.createElement('div');
            successMessage.classList.add('success-message');
            successMessage.innerText = 'Question added successfully.';
            document.body.appendChild(successMessage);

           // Remove the success message after 3 seconds
            setTimeout(() => {
           successMessage.remove();
           }, 3000);
        }
    </script>    
</body>
</html>

