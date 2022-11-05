
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?php active('workplan.php');?>" href="workplan.php">Home</a>
    </li>
        <li class="nav-item">
            <a class="nav-link <?php active('home.php');?>" href="home.php">New Project</a>
        </li>
    <?php if ($_SESSION['role']=="admin"){ ?>
        <li class="nav-item">

            <a class="nav-link <?php active('users.php');?>" href="users.php">Users</a>
        </li>

    <?php } ?>


</ul>