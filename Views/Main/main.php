<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gym</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
    body {
    background-color: #f0f0f0;
    background-image: url('images/images.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    margin: 0;
    font-family: 'Arial', sans-serif;
    box-sizing: border-box;
    color: #FFFFFF;
}
    </style>
</head>
<body>
    
<?php include 'header.php'; ?>

    <section class="hero">
        <h1>Welcome to My Gym</h1>
        <p>Your path to a healthier you starts here.</p>
    </section>
    <section class="content">
        <!-- ... your existing content ... -->
    </section>

    <!-- Font Awesome Icons -->
    <?php include 'footer.php'; ?>
</body>
</html>