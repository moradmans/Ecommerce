<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!-- Views/Register/register_form.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="index.php?controller=register&action=register" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Register</h5>
                        </div>
                        <div class="card-body">
                            <!-- Include registration form fields (e.g., first name, last name, email, etc.) -->
                            <div class="form-group">
                                <label for="fName">First Name</label>
                                <input type="text" class="form-control" name="fName" required>
                            </div>
                            <div class="form-group">
                                <label for="lName">Last Name</label>
                                <input type="text" class="form-control" name="lName" required>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control" name="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" class="form-control" name="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="Adress">Adress</label>
                                <input type="text" class="form-control" name="Address" required>
                            </div>
                            <div class="form-group">
                                <label for="Postal_Code">Postal Code</label>
                                <input type="text" class="form-control" name="Postal_Code" required>
                            </div>
                            <div class="form-group">
                                <label for="Phone_No">Phone Number</label>
                                <input type="text" class="form-control" name="Phone_No" required>
                            </div>
                            <!-- Add more form fields for registration data -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="register">Register</button>
                            <label class="ml-2">Already have an account? <a href="index.php?controller=login&action=login">Login</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
