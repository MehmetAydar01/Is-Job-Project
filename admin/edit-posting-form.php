<main class="edit-job">
    <div class="container">
        <div class="form-area">
            <form action="edit-posting-op.php" method="GET">
                <h2>Edit Job Listing</h2>
                <div class="form-inputs">
                    <h3>Job Info</h3>
                    <input type="text" name="title" placeholder="Job Title" value="<?= $getSinglePostingValues['title']; ?>" required>
                    <input type="text" name="description" placeholder="Job Description" value="<?= $getSinglePostingValues['description']; ?>" required>
                    <input type="text" name="salary" placeholder="Annual Salary" value="<?= $getSinglePostingValues['salary']; ?>" required>
                    <input type="text" name="requirements" placeholder="Requirements" value="<?= $getSinglePostingValues['requirements'] ?? ''; ?>">
                    <input type="text" name="benefits" placeholder="Benefits" value="<?= $getSinglePostingValues['benefits'] ?? ''; ?>">
                    <input type="text" name="tags" placeholder="Tags" value="<?= $getSinglePostingValues['tags']; ?>" required>
                    
                    <h3>Company Info & Location</h3>
                    <input type="text" name="company" placeholder="Company Name" value="<?= $getSinglePostingValues['company']; ?>" required>
                    <input type="text" name="address" placeholder="Address" value="<?= $getSinglePostingValues['address'] ?? ''; ?>">
                    <input type="text" name="city" placeholder="City" value="<?= $getSinglePostingValues['city']; ?>" required>
                    <input type="text" name="phone" placeholder="Phone" value="<?= $getSinglePostingValues['phone'] ?? ''; ?>">
                    <input type="text" name="email" placeholder="Email Address For Applications" value="<?= $getSinglePostingValues['email']; ?>" required>
                    <input type="hidden" name="id" value="<?= $getSinglePostingValues['id']; ?>">
                    
                    <div class="save-cancel-btn">
                        <button type="submit" class="saveBtn">Save</button>
                        <a href="postings.php" class="cancelBtn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>