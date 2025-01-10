<div id="header" class="nav-collapse container-fluid" >
    <div class="row align-items-center" style="width: 100%; display: flex;">
        <div class="col d-flex justify-content-between align-items-center" style="width: 100%;">

            <!-- Logo -->
            <div id="logo" class="d-flex align-items-center" >
                <!-- Logo that is shown on the banner -->
                <img src="images/logobanner.png" id="banner-logo" alt="Landing Page" style="max-height: 80px;" />
                <!-- The Logo that is shown on the sticky Navigation Bar -->
                <img src="images/logobanner.png" id="navigation-logo" alt="Landing Page" style="max-height: 80px;" />
            </div>
            <!-- End of Logo -->

            <!-- Main Navigation -->
            <nav id="nav-main" class="d-flex align-items-center">
                <ul class="d-flex list-unstyled mb-0" style="gap: 8px;">
                    <li>
                        <a href="index.php#banner">ACCUEIL</a>
                    </li>
                    <li>
                        <a href="index.php#about">À PROPOS</a>
                    </li>
                    <li>
                        <a href="index.php#pricing">SERVICES</a>
                    </li>
                    <li>
                        <a href="index.php#testimonials">AVIS</a>
                    </li>
                    <li>
                        <a href="index.php#clients">NOTRE ÉQUIPE</a>
                    </li>
                </ul>
            </nav>
            <!-- End of Main Navigation -->

            <!-- Social Icons in Header -->
            <aside class="d-flex align-items-center" style="gap: 5px;">
                <ul class="social-icons d-flex list-unstyled mb-0" style="gap: 5px;">
                    <li>
                        <a target="_blank" title="Facebook" href="https://www.facebook.com/">
                            <i class="fa fa-facebook fa-1x"></i><span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Google+" href="http://google.com/">
                            <i class="fa fa-google-plus fa-1x"></i><span>Google+</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Twitter" href="http://www.twitter.com/">
                            <i class="fa fa-twitter fa-1x"></i><span>Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Instagram" href="http://www.instagram.com/lovely_muuunir">
                            <i class="fa fa-instagram fa-1x"></i><span>Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="Behance" href="http://www.behance.net">
                            <i class="fa fa-behance fa-1x"></i><span>Behance</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
    </div>
</div>
<!-- End of Header -->

<style>
/* Reset Bootstrap's default spacing for container and row */
.container-fluid {
    padding-left: 20px !important;
    padding-right: 20px !important;
}

/* Preserve bottom margin */
.row {
    margin-left: 30px !important;
    margin-right: 30px !important;
    margin-top: 25px !important; /* Remove top margin */
}

/* General Styles */
#header {
    position: relative; /* Normal positioning before scroll */
    width: 100%;
    z-index: 9999;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    transition: background-color 0.3s, box-shadow 0.3s; /* Smooth transitions */
    box-shadow: none;
    margin: 0 auto; /* Center header */
    padding: _px 20px; /* Optional: control inner padding */
    display: flex;
    align-items: center;
    justify-content: center;
}

#header.sticky {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 1);
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Navigation Links */
#nav-main ul {
    gap: 8px; /* Reduced gap between navigation links */
}


/* Social Icons */
.social-icons {
    display: flex;
    gap: 5px; /* Reduced gap between social icons */
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center; /* Vertically centers the icons */
}

.social-icons li {
    display: flex;
    align-items: center;
}

/* Remove top margin for alignment */
ul, li {
    margin-top: 0 !important;
}

#logo img {
    max-height: 80px;
    width: auto;
}
</style>