
<!-- Views/Login/login_form.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="homepage.php?controller=login&action=login" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Login</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username Or Email</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
                            <label class="ml-2">Don't have an account? <a href="register.php?controller=register&action=register">Register</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
