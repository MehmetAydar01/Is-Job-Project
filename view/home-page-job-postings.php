<main class="main-job-listings">
    <div class="container">
        <section class="job-listings-title">
            <h2>Recent Jobs</h2>
        </section>
        <div class="job-listings-content">

            <?php if(count(getSixJobPostings($conn)) > 0): ?>
                <!-- Get Six Job Postings -->
                <?php foreach(getSixJobPostings($conn) as $key => $value): ?>
                    <section class="job-listing">
                        <div class="job-listing-header">
                            <h2><?= $value['title']; ?></h2>
                            <?php if(strlen($value['description']) >= 50): ?>
                                <?= substr($value['description'], 0, 50) . '...'; ?>
                            <?php else: ?>
                                <?= $value['description']; ?>
                            <?php endif; ?>
                        </div>
                        <div class="job-listing-body">
                            <p><span>Salary:</span> $<?= $value['salary']; ?></p>
                            <p><span>Location:</span> <?= $value['city'] ?></p>
                            <p><span>Tags:</span> <?= $value['tags']; ?></p>
                        </div>
                        <div class="job-listing-footer">
                            <a href="details.php?job_id=<?= $value['id']; ?>" class="details-btn">
                                <span>Details</span>
                            </a>
                        </div>
                    </section>
                <?php endforeach; ?>
                <!-- Get Six Job Postings  -->
            <?php else: ?>
                <h2>JOB POSTINGS NOT FOUND...</h2>
            <?php endif; ?>


        </div>
        <section class="show-all-jobs">
            <a href="all-jobs-listings.php"><i class="fa-solid fa-circle-arrow-right"></i> <span>Show All Jobs</span></a>
        </section>
        <!-- Footer -->
        <?php require 'main-footer.php'; ?>
    </div>
</main>