<nav>
    <div class="container">
        <div class="navbar-items">
            <a href="index.php" class="navbar-brand">isJob</a>
            <div class="navbar-nav">

                <?php if(session('fullname') && session('email')): ?>
                    <span class="navbar-fullname">Welcome <?= session('fullname');  ?></span>
                    <a href="logout.php" class="logoutBtn text-underline">Logout</a>
                    <a href="create-job.php" class="create-job-link">
                        <i class="fa-solid fa-pen-to-square create-job-icon"></i> <span>Post a Job</span>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="loginBtn text-underline">Login</a>
                    <a href="register.php" class="registerBtn text-underline">Register</a>
                <?php endif ?>

            </div>
        </div>
    </div>
</nav>