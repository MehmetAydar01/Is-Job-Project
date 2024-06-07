<main class="job-details">
    <div class="container">
        <div class="job-details-content">
            <?php if(count($jobPostingDetails) > 0): ?>
                <section class="job-details-top">
                    <div class="job-details-top-btns">
                        <a href="all-jobs-listings.php" class="back-to-listings"><i class="fa-solid fa-circle-arrow-left"></i> Back To Listings</a>
                        <?php if(session('user_id') == $jobPostingDetails['user_id']): ?>
                            <div>
                                <a href="edit-job.php?job_id=<?= $jobPostingDetails['id'] ?>" class="editBtn">Edit</a>
                                <!-- Delete Form -->
                                <form action="delete-job.php" method="GET">
                                    <input type="hidden" name="id" value="<?= $jobPostingDetails['id']; ?>">
                                    <button type="submit" class="deleteBtn">Delete</button>
                                </form>
                                <!-- End Delete Form -->
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="job-details-top-header">
                        <h2><?= $jobPostingDetails['title']; ?></h2>
                        <p><?= $jobPostingDetails['description'] ?></p>
                    </div>
                    <div class="job-details-top-body">
                        <p><span>Salary:</span> $<?= $jobPostingDetails['salary']; ?></p>
                        <p><span>Location:</span> <?= $jobPostingDetails['city'] ?></p>
                        <p><span>Tags:</span> <?= $jobPostingDetails['tags']; ?></p>
                    </div>
                </section>
                <h2>Job Details</h2>
                <section class="job-details-bottom">
                    <h3>Company Name</h3>
                    <p><i class="fa-solid fa-building"></i> <?= $jobPostingDetails['company'] ?></p>

                    <?php if(!empty($jobPostingDetails['requirements'])): ?>
                        <h3>Job Requirements</h3>
                        <p><i class="fa-solid fa-circle-exclamation"></i> <?= $jobPostingDetails['requirements'] ?></p>
                    <?php endif; ?>
                    <?php if(!empty($jobPostingDetails['benefits'])): ?>
                        <h3>Benefits</h3>
                        <p>🎯 <?= $jobPostingDetails['benefits'] ?></p>
                    <?php endif; ?>
                    
                </section>  
            <?php else: ?>
                <h2>JOB POSTING DETAILS NOT FOUND...</h2>
            <?php endif; ?>

            <p>Put "Job Application" as the subject of your email and attach your resume</p>
            <?php if(count($jobPostingDetails) > 0): ?>
                <a href="mailto:<?= $jobPostingDetails['email']; ?>" class="applyBtn">
                    Apply Now
                </a>
            <?php endif; ?>
            
        </div>
        <!-- Footer -->
        <?php require 'main-footer.php'; ?>
    </div>
</main>