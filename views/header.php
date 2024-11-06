<header>
    <nav class="navbar">
        <div class="logo">
            <h1>Saman Caters</h1>
        </div>
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label> <!-- Modern hamburger icon -->
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Catering</a></li>
            <li><a href="#">Our Legacy</a></li>
            <li><a href="#">Location</a></li>
        </ul>
        <?php if(isset($_SESSION['userId']) && isset($user)){ ?>
            <div class="profile">
                <span><?php echo ucwords($user->role) ?></span>
                <div class="profile-image" style="background-image: url('<?php echo htmlspecialchars($user->profilePic ?? '/static/images/profile.jpg'); ?>');" onclick="toggleDropdown()">
                </div>
                <!-- Dropdown Menu -->
                <div id="profile-dropdown" class="dropdown-menu">
                    <a href="/user/profile">Manage Profile</a>
                    <a href="/user/logout">Sign Out</a>
                </div>
            </div>
        <?php }else{ ?>
            <div class="right-nav-links">
                <a href="/user/login">SignIn</a>
                <a href="/user/signup">SignUp</a>
            </div>
       <?php } ?>
    </nav>
</header>