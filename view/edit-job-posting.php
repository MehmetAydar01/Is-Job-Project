<main class="edit-job">
    <div class="container">
        <div class="form-area">
            <form action="edit-job-operations.php" method="GET">
                <h2>Edit Job Listing</h2>
                <!-- Error Register Start -->
                <?php if(!empty($_GET['mistake'])): ?>
                    <div class="edit-job-error">
                        <span><?= urldecode($_GET['mistake']); ?></span>
                    </div>
                <?php endif; ?>
                <!-- Error Register End -->
                <div class="form-inputs">
                    <h3>Job Info</h3>
                    <input type="text" name="title" placeholder="Job Title" value="<?= $getJobPostingValues['title']; ?>" required>
                    <input type="text" name="description" placeholder="Job Description" value="<?= $getJobPostingValues['description']; ?>" required>
                    <input type="text" name="salary" placeholder="Annual Salary" value="<?= $getJobPostingValues['salary']; ?>" required>
                    <input type="text" name="requirements" placeholder="Requirements" value="<?= $getJobPostingValues['requirements'] ?? ''; ?>">
                    <input type="text" name="benefits" placeholder="Benefits" value="<?= $getJobPostingValues['benefits'] ?? ''; ?>">
                    <input type="text" name="tags" placeholder="Tags" value="<?= $getJobPostingValues['tags']; ?>" required>
                    
                    <h3>Company Info & Location</h3>
                    <input type="text" name="company" placeholder="Company Name" value="<?= $getJobPostingValues['company']; ?>" required>
                    <input type="text" name="address" placeholder="Address" value="<?= $getJobPostingValues['address'] ?? ''; ?>">
                    <input type="text" name="city" placeholder="City" value="<?= $getJobPostingValues['city']; ?>" required>
                    <input type="text" name="phone" placeholder="Phone" value="<?= $getJobPostingValues['phone'] ?? ''; ?>">
                    <input type="text" name="email" placeholder="Email Address For Applications" value="<?= $getJobPostingValues['email']; ?>" required>
                    <input type="hidden" name="id" value="<?= $getJobPostingValues['id']; ?>">
                    
                    <div class="save-cancel-btn">
                        <button type="submit" class="saveBtn">Save</button>
                        <a href="details.php?job_id=<?= $getJobPostingValues['id']; ?>" class="cancelBtn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <?php require 'main-footer.php'; ?>
    </div>
</main>