<ul class="nav nav-tabs">

    <?php if (isset($_GET['id'])){?>


        <li class="nav-item">
            <a class="nav-link <?php active('workplan.php');?>" href="workplan.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php active('viewproject.php');?>" href="viewproject.php?id=<?php echo $_GET['id'] ?>">Project info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('viewclusters.php');?>" href="viewclusters.php?id=<?php echo $_GET['id'] ?>">Cluster info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php active('movs.php');?>" href="movs.php?id=<?php echo $_GET['id'] ?>">Uploads</a>
        </li>
    <?php }else {?>

    <?php } ?>


</ul>