<main class="create-job">
    <div class="container">
        <div class="form-area">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h2>Create Job Listing</h2>

                <!-- Error Create Job Post Form Start -->
                <?php if(count($jobErr) > 0): ?>
                    <div class="create-job-error">
                        <?php foreach ($jobErr as $key => $err): ?>
                            <?php if(!empty($jobErr[$key])): ?>
                                <span><?= $jobErr[$key]; ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <!-- Error Create Job Post Form End -->

                <div class="form-inputs">
                    <h3>Job Info</h3>
                    <input type="text" name="title" placeholder="Job Title" value="<?= $jobTitle; ?>">
                    <input type="text" name="description" placeholder="Job Description" value="<?= $jobDescription; ?>">
                    <input type="text" name="salary" placeholder="Annual Salary" value="<?= $jobSalary; ?>">
                    <input type="text" name="requirements" placeholder="Requirements">
                    <input type="text" name="benefits" placeholder="Benefits">
                    <input type="text" name="tags" placeholder="Tags" value="<?= $jobTags; ?>">
                    
                    <h3>Company Info & Location</h3>
                    <input type="text" name="company" placeholder="Company Name" value="<?= $jobCompanyName; ?>">
                    <input type="text" name="address" placeholder="Address">
                    <input type="text" name="city" placeholder="City" value="<?= $jobCity; ?>">
                    <input type="text" name="phone" placeholder="Phone">
                    <input type="text" name="email" placeholder="Email Address For Applications" value="<?= $jobEmail; ?>">
                    
                    <div class="save-cancel-btn">
                        <button type="submit" name="Save" class="saveBtn">Save</button>
                        <a href="index.php" name="Cancel" class="cancelBtn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <?php require 'main-footer.php'; ?>
    </div>
</main>
