<main class="register-main">
    <div class="container">
        <div class="form-area">
            <form action="edit-user-op.php" method="GET">
                <h2>Edit User</h2>
                <div class="form-inputs">
                    <input type="text" name="fullname" placeholder="Full Name" value="<?= $getSingleUserValues['fullname']; ?>" required>
                    <input type="text" name="email" placeholder="Email Address" value="<?= $getSingleUserValues['email']; ?>" required>
                    <input type="text" name="city" placeholder="City" value="<?= $getSingleUserValues['city']; ?>" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="hidden" name="id" value="<?= $userId; ?>">
                    <button type="submit" name="create">Edit</button>
                    <a href="users.php" name="Cancel" class="cancelOp">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>