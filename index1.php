
<!DOCTYPE html>
<html>
<head>
    <script>
        var slides = document.getElementsByClassName("slide");
        var currentSlide = 0;
        var slideInterval = setInterval(nextSlide, 3000);

       function nextSlide() {
       slides[currentSlide].classList.remove("active");
       currentSlide = (currentSlide + 1) % slides.length;
       slides[currentSlide].classList.add("active");
       }

    </script>
	<title>Welcome</title>
	<style>
		/* Navigation bar */
		nav {
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: grey;
			color: #fff;
			padding: 10px;
		}
        .slideshow {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
          }
          
          .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 3s ease-in-out;
          }
          
          .active {
            opacity: 1;
          }
          

		nav a {
			color: #fff;
			text-decoration: none;
			margin: 0 10px;
		}

		nav a:hover {
			text-decoration: underline;
		}

		/* Welcome section */
		#welcome-section {
			height: 100vh;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			font-size: 4rem;
         
		}
        h1{
            margin-top: 10px;
            text-align: center;
        }
	</style>
</head>
<body>
    <div class="slideshow">
        <img src="home-page/BG3.jpg" class="slide">
        <img src="home-page/BG1.jpg" class="slide">
        <img src="home-page/BG2.jpg" class="slide">
        <img src="home-page/BG4.jpg" class="slide">
      </div>
      
	<nav>
		<h2>NetQuiz</h2>
		<div>
			<a href="#">Home</a>
			<a href="#">About</a>
			<a href="#">Contact</a>
			<a href="login.php">Login</a>
            <a href="admin-login.php">Admin login</a>
			<a href="register.php">Signup</a>
			<a href="upload.php">upload</a>
		</div>
	</nav>

	<section id="welcome-section">
		<h1>Welcome to Computer Networking Quiz</h1>
		<p>Thanks for visiting our site!</p>
	</section>
</body>
</html>
