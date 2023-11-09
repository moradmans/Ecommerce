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
            <form action="login.php?controller=register&action=register" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Register</h5>
                        </div>
                        <div class="card-body">
                            <!-- First Name -->
                            <div class="form-group">
                                <label for="fName">First Name</label>
                                <input type="text" class="form-control" name="fName" required>
                            </div>
                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="lName">Last Name</label>
                                <input type="text" class="form-control" name="lName" required>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" name="Email" required>
                            </div>
                            <!-- Username -->
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" class="form-control" name="Username" required>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" name="Password" required>
                            </div>
                            <!-- Address -->
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" name="Address" required>
                            </div>
                            <!-- Postal Code -->
                            <div class="form-group">
                                <label for="Postal_Code">Postal Code</label>
                                <input type="text" class="form-control" name="Postal_Code" required>
                            </div>
                            <!-- Phone Number -->
                            <div class="form-group">
                                <label for="Phone_No">Phone Number</label>
                                <input type="tel" class="form-control" name="Phone_No" required>
                            </div>
                            <!-- Add more form fields for registration data -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Register</button>
                            <label class="ml-2">Already have an account? <a href="index.php?controller=login&action=login">Login</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
