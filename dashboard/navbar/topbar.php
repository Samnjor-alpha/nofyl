<nav class="navbar navbar-expand bg-light navbar-light justify-content-center">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://www.nofyl.org/wp-content/uploads/Nofyl_logo.png" alt="Avatar Logo" class="rounded-pill">
        </a>
    </div>
    <div class="collapse navbar-collapse" style="margin-left: -15%" id="navbar-list-4">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['names']?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="<?php echo $_SERVER["SCRIPT_NAME"]?>?logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>

</nav>