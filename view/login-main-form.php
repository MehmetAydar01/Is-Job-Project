<?php $registerAlertValue = $_GET['successRegister'] ?? '' ?>

<main class="login-main">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Login</h2>

                <!-- Error Login Start -->
                    <?php if(count($loginErr) > 0): ?>
                        <div class="login-error">
                            <?php foreach($loginErr as $key => $err): ?>
                                <?php if(!empty($loginErr[$key])): ?>
                                    <span><?= $loginErr[$key]; ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <!-- Error Login End -->

                <!-- Success Alert Start -->
                <?php if($registerAlertValue == urldecode($message['success register'])): ?>
                    <div class="success-register-alert">Your registration has been completed successfully</div>
                    <script>
                        setTimeout(() => {
                            let successAlert = document.querySelector('.success-register-alert');
                            successAlert.style.transition = "opacity " + 3 + "s";
                            successAlert.style.opacity = 0;
                            successAlert.addEventListener("transitionend", function() {
                                successAlert.style.display = "none";
                            });
                        }, 1500);
                    </script>
                <?php endif; ?>
                <!-- Success Alert End -->

                <div class="form-inputs">
                    <input type="text" name="email" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login">Login</button>
                    <div class="form-footer">
                        <span>Don't have an account?</span>
                        <a href="register.php">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>