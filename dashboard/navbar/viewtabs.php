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
        <?php if(!checkapproval($_GET['id'])|| $_SESSION['role']=='supervisor') {?>
        <li class="nav-item">
            <a class="nav-link text-success <?php active('movs.php');?>" href="movs.php?id=<?php echo $_GET['id'] ?>">Uploads</a>
        </li>
        <?php } ?>
        <?php if (checkcomment($_GET['id'])){ ?>
        <li class="nav-item">
            <a class="nav-link <?php active('wpcomments.php');?>" href="wpcomments.php?id=<?php echo $_GET['id'] ?>"><i class="text-danger">Comments</i></a>
        </li>
    <?php }elseif(checkmovcomments($_GET['id'])) {?>
        <li class="nav-item">
            <a class="nav-link <?php active('movcomments.php');?>" href="movcomments.php?id=<?php echo $_GET['id'] ?>"><i class="text-danger">MOV Comments</i></a>
        </li>
    <?php }} ?>


</ul>