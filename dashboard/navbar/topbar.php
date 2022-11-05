<nav class="navbar navbar-expand bg-light navbar-light justify-content-center">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://www.nofyl.org/wp-content/uploads/Nofyl_logo.png" alt="Avatar Logo" class="rounded-pill">
        </a>
    </div>
    <ul class="navbar-nav">

        <li class="nav-item" style="margin-left:-300px;display: inline; ">
            <a class="nav-link">Welcome, <?php echo $_SESSION['names'] ?><br>
            <?php echo $_SESSION['role'] ?>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $_SERVER["SCRIPT_NAME"]?>?logout">Logout</a>
        </li>
    </ul>
</nav>