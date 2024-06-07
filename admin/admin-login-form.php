<main class="login-main">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Admin Login</h2>
                <div class="form-inputs">
                    <div><?= $adminEmailErr ?? ''; ?></div>
                    <div><?= $adminPasswordErr ?? ''; ?></div>
                    <input type="text" name="email" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</main>