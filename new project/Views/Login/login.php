<!-- Views/Login/login.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="index.php?controller=login&action=login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="index.php?controller=register&action=register">Register here</a></p>
    <?php
    if (isset($loginError) && $loginError === true) {
        echo '<p style="color: red;">Login failed. Please try again.</p>';
    }
    ?>
</body>
</html>
