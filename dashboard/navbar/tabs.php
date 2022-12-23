<ul class="nav nav-tabs">
    <?php if (isset($_GET['id'])){
        if ($_SESSION['role']=='admin'){
        ?>
    <li class="nav-item">
        <a class="nav-link <?php active('home.php');?>" href="home.php?id=<?php echo $_GET['id'] ?>">Create Project</a>
        </li>
<?php } ?>

        <li class="nav-item">
            <a class="nav-link <?php active('clusters.php');?>" href="clusters.php?id=<?php echo $_GET['id'] ?>">Clusters</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('workplan.php');?>" href="workplan.php">Projects</a>
        </li>
        <?php }else {?>
        <a class="nav-link <?php active('home.php');?>" href="home.php">Create Project</a>

        <li class="nav-item">

            <a class="nav-link <?php active('coverpage.php');?>" href="coverpage.php">Cover Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('framework.php');?>" href="framework.php">Logical Framework</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('clusters.php');?>" href="clusters.php">Clusters</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('workplan.php');?>" href="workplan.php">Projects</a>
        </li>
        <?php } ?>


</ul>