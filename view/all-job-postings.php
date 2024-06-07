<?php 
    $listingCreated = $_GET['listingCreated'] ?? '';
    $listingUpdated = $_GET['listingUpdated'] ?? '';
    $listingDeleted = $_GET['listingDeleted'] ?? '';
?>

<main class="main-job-listings">
    <div class="container">
        <section class="job-listings-title">
            <h2>All Jobs</h2>
        </section>

        <!-- Listing Created Alert Start -->
        <?php if($listingCreated == urldecode($message['listing created'])): ?>
            <div class="listing-created-alert"><?= $message['listing created']; ?></div>
            <script>
                setTimeout(() => {
                    let createdAlert = document.querySelector('.listing-created-alert');
                    createdAlert.style.transition = "opacity " + 2 + "s";
                    createdAlert.style.opacity = 0;
                    createdAlert.addEventListener("transitionend", function() {
                        createdAlert.style.display = "none";
                    });
                }, 1250);
            </script>
        <?php endif; ?>
        <!-- Listing Created Alert End -->

        <!-- Listing Edited Alert Start -->
        <?php if($listingUpdated == urldecode($message['listing updated'])): ?>
            <div class="listing-edited-alert"><?= $message['listing updated']; ?></div>
            <script>
                setTimeout(() => {
                    let editedAlert = document.querySelector('.listing-edited-alert');
                    editedAlert.style.transition = "opacity " + 2 + "s";
                    editedAlert.style.opacity = 0;
                    editedAlert.addEventListener("transitionend", function() {
                        editedAlert.style.display = "none";
                    });
                }, 1250);
            </script>
        <?php endif; ?>
        <!-- Listing Edited Alert End -->

        <!-- Listing Deleted Alert Start -->
        <?php if($listingDeleted == urldecode($message['listing deleted'])): ?>
            <div class="listing-deleted-alert"><?= $message['listing deleted']; ?></div>
            <script>
                setTimeout(() => {
                    let deletedAlert = document.querySelector('.listing-deleted-alert');
                    deletedAlert.style.transition = "opacity " + 2 + "s";
                    deletedAlert.style.opacity = 0;
                    deletedAlert.addEventListener("transitionend", function() {
                        deletedAlert.style.display = "none";
                    });
                }, 1250);
            </script>
        <?php endif; ?>
        <!-- Listing Deleted Alert End -->

        <?php if(!$hasKeys): ?>
            <div class="job-listings-content">
                <?php if(count(getAllJobPostings($conn)) > 0): ?>
                    <?php foreach(getAllJobPostings($conn) as $key => $value): ?>
                        <section class="job-listing">
                            <div class="job-listing-header">
                                <h2><?= $value['title']; ?></h2>
                                <p>
                                    <?php if(strlen($value['description']) >= 50): ?>
                                        <?= substr($value['description'], 0, 50) . '...'; ?>
                                    <?php else: ?>
                                        <?= $value['description']; ?>
                                    <?php endif; ?>
                                </p>
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
                <?php else: ?>
                    <h2>JOB POSTINGS NOT FOUND...</h2>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="job-listings-content">
                <?php if(count($findJobPostingByKeys) > 0): ?>
                    <?php foreach($findJobPostingByKeys as $key => $value): ?>
                        <section class="job-listing">
                            <div class="job-listing-header">
                                <h2><?= $value['title']; ?></h2>
                                <p>
                                    <?php if(strlen($value['description']) >= 50): ?>
                                        <?= substr($value['description'], 0, 50) . '...'; ?>
                                    <?php else: ?>
                                        <?= $value['description']; ?>
                                    <?php endif; ?>
                                </p>
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
                <?php else: ?>
                    <h2>JOB POSTINGS NOT FOUND...</h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Footer -->
        <?php require 'main-footer.php'; ?>
    </div>
</main>