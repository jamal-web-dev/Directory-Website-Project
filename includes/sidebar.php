<?php 
    $page = basename($_SERVER["PHP_SELF"], ".php");
    // session_start();
?> 
 
 <header>
        <button class="sidebar-toggle" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="dashboard-sidebar">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <a href="index.php">Home</a>
        <div class="header-copy">
            <span>Personal workspace</span>
            <h2>Welcome back, <?=$_SESSION["name"]?></h2>
        </div>
    </header>
    <aside id="dashboard-sidebar" aria-label="Dashboard navigation">
        <button class="sidebar-close" type="button" aria-label="Close navigation menu">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"></path></svg>
        </button>
        <img src="../images/general-images/logo-white.svg" alt="ListingHub">
        <p class="sidebar-kicker">Manage your presence</p>
        <ul>
            <a href="dashboard.php" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
                <li>🛖 Dashboard</li>
            </a>
            <a href="post-listing.php" class="<?= ($page == "post-listing") ? 'active' : '' ?>">
                <li>📫 Add Listing</li>
            </a>
            <!-- <a href="listing-list.php" class="<?= ($page == "listing-list") ? 'active' : '' ?>">
                <li>📃 Listings</li>
            </a> -->
            <a href="profile.php" class="<?= ($page == "profile") ? 'active' : '' ?>">
                <li>👤 profile</li>
            </a>
            <a href="logout.php">
                <li>📲 Logout</li>
            </a>
        </ul>
    </aside>