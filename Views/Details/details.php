<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gym</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 0.5rem;
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .hero {
            background-color: #f0f0f0;
            padding: 2rem;
            text-align: center;
            background-image: url('../../images/homepageBackground.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 80vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content {
            padding: 2rem;
        }

        .icons {
            display: flex;
            gap: 1rem;
            margin-left: auto;
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
            margin-left: auto;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 1rem;
            border-radius: 5px;
            z-index: 1;
            right: 0;
        }

        .user-dropdown:hover .user-dropdown-menu {
            display: block;
        }

        .user-dropdown span {
            margin-right: 0.5rem;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }
    </style>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php?controller=main">Home</a></li>
                <li class="dropdown">
                    <a href="">Products</a>
                    <ul class="dropdown-menu">
                        <li class="submenu">
                            <a href="index.php?controller=clothing">Clothing</a>
                        </li>
                        <li class="submenu">
                            <a href="../equipments.php">Equipment</a>
                        </li>
                        <li class="submenu">
                            <a href="../supplements.php">Supplements</a>
                        </li>
                    </ul>
                </li>
                <li><a href="../services.php">Services</a></li>
                <li><a href="index.php?controller=nearByGyms">Nearby Gym</a></li>
                <li><a href="index.php?controller=contact">Contact</a></li>
                <?php if ($isAdmin) : ?>
                    <li><a href="index.php?controller=information&action=getUsers">Information</a></li>
                 <?php endif; ?>
            </ul>
        </nav>
        <div class="icons">
    <i class="fas fa-shopping-cart"></i> <!-- Shopping cart icon -->

    <div class="user-dropdown">
    <i class="fas fa-user"></i> <!-- User icon -->
    <span><?= isset($username) ? $username : 'Guest'; ?></span>
    <ul class="user-dropdown-menu">
        <li class="submenu">
            <?php if (isset($username)) : ?>
                <a href="index.php?controller=login&action=logout">Log out</a>
            <?php else : ?>
                <a href="index.php?controller=login">Login</a>
            <?php endif; ?>
        </li>
        <li class="submenu">
            <a href="index.php?controller=details">Details</a>
        </li>
    </ul>
</div>
    </header>

    <?php if ($userData): ?>
        <div class="content">
            <form method="post" action="index.php?controller=details&action=update">
                <label for="fName">First Name:</label>
                <input type="text" id="fName" name="fName" value="<?= $userData['fName']; ?>" required>

                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lName" value="<?= $userData['lName']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $userData['Email']; ?>" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= $userData['Username']; ?>" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?= $userData['Password']; ?>" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?= $userData['Address']; ?>" required>

                <label for="postalCode">Postal Code:</label>
                <input type="text" id="postalCode" name="postalCode" value="<?= $userData['Postal_Code']; ?>" required>

                <label for="phoneNo">Phone Number:</label>
                <input type="text" id="phoneNo" name="phoneNo" value="<?= $userData['Phone_No']; ?>" required>

                <?php if ($_SESSION['type'] === 'admin'): ?>
                    <label for="type">User Type:</label>
                    <input type="text" id="type" name="type" value="<?= $userData['type']; ?>" required>
                <?php endif; ?>

                <button type="submit">Update Details</button>
            </form>

            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                <p class="text-success">Details updated successfully.</p>
            <?php elseif (isset($_GET['error']) && $_GET['error'] === 'true'): ?>
                <p class="text-danger">Failed to update details. Please try again.</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="hero">
            <p>User not found.</p>
        </div>
    <?php endif; ?>

</body>

</html>
