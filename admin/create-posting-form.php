<main class="create-job">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h2>Create Job Listing</h2>
                <?php if(count($err) > 0): ?>
                    <?php foreach($err as $key => $value): ?>
                        <div><?= $err[$key]; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="form-inputs">
                    <h3>Job Info</h3>
                    <input type="text" name="title" placeholder="Job Title" value="<?= $title; ?>" required>
                    <input type="text" name="description" placeholder="Job Description" value="<?= $description; ?>" required>
                    <input type="text" name="salary" placeholder="Annual Salary" value="<?= $salary; ?>" required>
                    <input type="text" name="requirements" placeholder="Requirements">
                    <input type="text" name="benefits" placeholder="Benefits">
                    <input type="text" name="tags" placeholder="Tags" value="<?= $tags; ?>" required>
                    
                    <h3>Company Info & Location</h3>
                    <input type="text" name="company" placeholder="Company Name" value="<?= $company; ?>" required>
                    <input type="text" name="address" placeholder="Address">
                    <input type="text" name="city" placeholder="City" value="<?= $city; ?>" required>
                    <input type="text" name="phone" placeholder="Phone">
                    <input type="text" name="email" placeholder="Email Address For Applications" value="<?= $email; ?>" required>
                    
                    <div class="save-cancel-btn">
                        <button type="submit" name="Save" class="saveBtn">Save</button>
                        <a href="postings.php" name="Cancel" class="cancelBtn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
