<!-- Views/Main/main.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
</head>
<body>
    <h1>Welcome to the Main Page</h1>

    <h1>List of Users</h1>
    <table>
        <!-- Table headers -->
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Phone No</th>
            </tr>
        </thead>
        <!-- Table data -->
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->userId; ?></td>
                    <td><?php echo $user->fName; ?></td>
                    <td><?php echo $user->lName; ?></td>
                    <td><?php echo $user->Email; ?></td>
                    <td><?php echo $user->Username; ?></td>
                    <td><?php echo $user->Address; ?></td>
                    <td><?php echo $user->Postal_Code; ?></td>
                    <td><?php echo $user->Phone_No; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Button to go back to the register view -->
    <a href="index.php?controller=login&action=login" class="btn btn-primary">Go to login</a>


</body>
</html>
