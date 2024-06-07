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
        <h1 class="admin-title">Job Postings Table</h1>
        <div class="admin-links">
            <a href="postings.php"><i class="fa-solid fa-briefcase"></i> Postings</a>
            <a href="users.php"><i class="fa-solid fa-users"></i> Users</a>
            <a href="create-posting.php"><i class="fa-solid fa-spaghetti-monster-flying"></i> Create Posting</a>
            <a href="admin-logout.php" class="admin-logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>   
    </div>

    <table id="postings">
        <tr>
            <th>id</th>
            <th>user id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Requirements</th>
            <th>Benefits</th>
            <th>Tags</th>
            <th>Company</th>
            <th>Address</th>
            <th>City</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Transactions</th>
        </tr>
        <?php foreach(getAllPostings($conn) as $posting): ?>
            <tr>
                <td><?= $posting['id']; ?></td>
                <td><?= $posting['user_id']; ?></td>
                <td><?= $posting['title']; ?></td>
                <td><?= $posting['description']; ?></td>
                <td><?= $posting['salary']; ?></td>
                <td><?= $posting['requirements']; ?></td>
                <td><?= $posting['benefits']; ?></td>
                <td><?= $posting['tags']; ?></td>
                <td><?= $posting['company']; ?></td>
                <td><?= $posting['address']; ?></td>
                <td><?= $posting['city']; ?></td>
                <td><?= $posting['phone']; ?></td>
                <td><?= $posting['email']; ?></td>
                <td><?= $posting['created_at']; ?></td>
                <td class="posting-transactions">
                    <a href="edit-posting.php?id=<?= $posting['id'] ?>">Edit</a>
                    <a href="delete-posting.php?id=<?= $posting['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>

</body>
</html>

<?php $conn = null; ?>