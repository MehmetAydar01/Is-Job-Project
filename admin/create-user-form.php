<main class="register-main">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Create User</h2>
                <div><?= $err; ?></div>
                <div class="form-inputs">
                    <input type="text" name="fullname" placeholder="Full Name" value="<?= $fullname; ?>" required>
                    <input type="text" name="email" placeholder="Email Address" value="<?= $email; ?>" required>
                    <input type="text" name="city" placeholder="City" value="<?= $city; ?>" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="create">Create</button>
                    <a href="users.php" name="Cancel" class="cancelOp">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>