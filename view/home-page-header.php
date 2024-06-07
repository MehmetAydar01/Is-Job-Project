<header>
    <div class="header-image">
        <div class="header-form">
            <h1>Find Your Dream Job</h1>
            <form action="<?= htmlspecialchars("all-jobs-listings.php") ?>" method="GET">
                <input type="text" name="titlekey" placeholder="Keyword" value="">
                <input type="text" name="location" placeholder="Location" value="">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i> <span>Search</span>
                </button>
            </form>
        </div>
    </div>
</header>