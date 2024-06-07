<?php
    // Session Start
    session_start();

    // helpers
    require '../helpers/helper-functions.php';

    // DB Connection
    require '../db/connection.php';

    // Functions
    require './admin-functions.php';

    // if session values ​​exist redirect to home page
    if (!(session('admin_username') && session('admin_email') && session('is_role') == "admin")) {
        header("Location: admin-login.php");
        exit();
    }

?>

<?php require 'head.php'; ?>


    <div class="container">
        <h1 class="admin-title">Users Table</h1>
        <div class="admin-links">
            <a href="users.php"><i class="fa-solid fa-users"></i> Users</a>
            <a href="postings.php"><i class="fa-solid fa-briefcase"></i> Postings</a>
            <a href="create-user.php"><i class="fa-solid fa-user"></i> Create User</a>
            <a href="admin-logout.php" class="admin-logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>

        <table id="users">
            <tr>
                <th>id</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Password</th>
                <th>City</th>
                <th>Created at</th>
                <th>Transactions</th>
            </tr>
            <?php foreach(getAllUsers($conn) as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['fullname']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['password']; ?></td>
                    <td><?= $user['city']; ?></td>
                    <td><?= $user['created_at']; ?></td>
                    <td>
                        <a href="edit-user.php?id=<?= $user['id'] ?>">Edit</a>
                        <a href="delete-user.php?id=<?= $user['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
    </div>


</body>
</html>

<?php $conn = null; ?>