<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culler Bank - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .slider-container { position: relative; width: 100%; height: 400px; overflow: hidden; }
        .slide { display: none; width: 100%; height: 100%; text-align: center; background-color: aliceblue; flex-direction: column; justify-content: center; align-items: center; }
        .slide.active { display: flex; }
        .slide h1 { font-size: 40px; color: darkblue; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>


    <main>
        <div class="slider-container">
            <div class="slide active">
                <h1>Welcome to Culler Bank</h1>
                <p>Your trusted partner in finance.</p>
                <a href="register.php" style="text-decoration: none;"><button class="butoni_bg" style="width: 200px;">Open Account Today</button></a>
            </div>
            <div class="slide">
                <h1>Secure Banking</h1>
                <p>Safe and reliable transfers.</p>
            </div>
            <div class="slide">
                <h1>Digital Future</h1>
                <p>Banking at your fingertips.</p>
            </div>
        </div>
    </main>


    <?php include 'includes/footer.php'; ?>


    <script>
        let slideIndex = 0;
        const slides = document.getElementsByClassName("slide");
        
        function showSlides() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].classList.add("active");
            setTimeout(showSlides, 3000); 
        }
        showSlides();
    </script>
</body>
</html>
