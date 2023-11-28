<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="col-md-6 offset-md-3 bg-white p-4 rounded">
            <h1 class="text-center mb-4">Register</h1>
            <form method="post" action="index.php?controller=register&action=register">

                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="postalCode">Postal Code:</label>
                    <input type="text" id="postalCode" name="postalCode" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone No:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <a href="index.php?controller=login&action=login" class="btn btn-secondary btn-block mt-3">Go Back To Login</a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
