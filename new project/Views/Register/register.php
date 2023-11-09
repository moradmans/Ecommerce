<!-- Views/Register/register.php -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="post" action="index.php?controller=register&action=register">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="postalCode">Postal Code:</label>
        <input type="text" id="postalCode" name="postalCode" required><br>

        <label for="phone">Phone No:</label>
        <input type="text" id="phone" name="phone" required><br>

        <button type="submit">Register</button>
    </form>
    <a href="index.php?controller=login&action=login" class="btn btn-primary">Go to Login</a>

</body>
</html>
