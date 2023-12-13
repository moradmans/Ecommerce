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
    <link rel="stylesheet" href="../../css/styles.css"> 
    <style>
        body {
            background-color: #f0f0f0;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: 'Arial', sans-serif;
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

        .submenu {
            margin: 0.3rem 0;
        }

        .hero {
            height: 80vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Add a semi-transparent overlay to improve text readability */
        .hero::before {
            content: "";
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value to control transparency */
            z-index: -1; /* Place the overlay behind the content */
        }

        .content {
            padding: 2rem;
        }

        .icons {
            display: flex;
            gap: 1rem;
            margin-left: auto; /* Move icons to the right */
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
            margin-left: auto; /* Move user dropdown to the right */
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 1rem; /* Increase the padding to make the dropdown menu a bit bigger */
            border-radius: 5px;
            z-index: 1;
            right: 0; /* Align user dropdown menu to the right */
        }

        .user-dropdown:hover .user-dropdown-menu {
            display: block;
        }



    </style>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


</head>
<body>
<?php include 'header.php'; ?>

    <section class="content">
        <h1>User Information</h1>

        <!-- Display a table for user information -->
        <table border="1">
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>Is New</th>
                <th>Type</th>
                <th>Action</th>
            </tr>

            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['userID'] ?></td>
                    <td><?= $user['fName'] ?></td>
                    <td><?= $user['lName'] ?></td>
                    <td><?= $user['Email'] ?></td>
                    <td><?= $user['Username'] ?></td>
                    <td><?= $user['Password'] ?></td>
                    <td><?= $user['Address'] ?></td>
                    <td><?= $user['Postal_Code'] ?></td>
                    <td><?= $user['Phone_No'] ?></td>
                    <td><?= $user['isNew'] ?></td>
                    <td><?= $user['type'] ?></td>
                    <td>
                        <form method="post" action="index.php?controller=update&action=update">
                            <input type="hidden" name="userID" value="<?= $user['userID'] ?>">
                            <input type="hidden" name="fName" value="<?= $user['fName'] ?>">
                            <input type="hidden" name="lName" value="<?= $user['lName'] ?>">
                            <input type="hidden" name="email" value="<?= $user['Email'] ?>">
                            <input type="hidden" name="username" value="<?= $user['Username'] ?>">
                            <input type="hidden" name="password" value="<?= $user['Password'] ?>">
                            <input type="hidden" name="address" value="<?= $user['Address'] ?>">
                            <input type="hidden" name="postalCode" value="<?= $user['Postal_Code'] ?>">
                            <input type="hidden" name="phoneNo" value="<?= $user['Phone_No'] ?>">
                            <input type="hidden" name="isNew" value="<?= $user['isNew'] ?>">
                            <input type="hidden" name="type" value="<?= $user['type'] ?>">

                            <button type="submit" name="updateUser">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <?php include 'footer.php'; ?>

</body>
</html>