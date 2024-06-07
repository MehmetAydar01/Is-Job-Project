<main class="register-main">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Register</h2>

                <!-- Error Register Start -->
                <?php if(count($registerErr) > 0): ?>
                    <div class="register-error">
                        <?php foreach ($registerErr as $key => $err): ?>
                            <?php if(!empty($registerErr[$key])): ?>
                                <span><?= $registerErr[$key]; ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <!-- Error Register End -->

                <div class="form-inputs">
                    <input type="text" name="fullname" placeholder="Full Name" value="<?= $fullname; ?>">
                    <input type="text" name="email" placeholder="Email Address" value="<?= $email; ?>">
                    <input type="text" name="city" placeholder="City" value="<?= $city; ?>">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="confirm-password" placeholder="Confirm Password">
                    <button type="submit" name="register">Register</button>
                    <div class="form-footer">
                        <span>Already have an account?</span>
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
