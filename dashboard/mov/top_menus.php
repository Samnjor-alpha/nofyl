<?php //echo "Welcome" . $_SESSION["role"]; ?>
<ul class="nav nav-tabs">

    <?php if ($_SESSION["role"] == 'manager') { ?>
        <li id="home"><a href="home.php">Create Project</a></li>

        <li id="clients" class="active"><a href="clients.php">Cover Page</a></li>
        <li id="projects"><a href="projects.php">Logical Framework</a></li>
        <li id="projects"><a href="#">Work Plan</a></li>

    <?php } ?>

    <?php if ($_SESSION["role"] == 'employee') { ?>
        <li class="active"><a href="tasks.php">Tasks</a></li>
    <?php } ?>

</ul>

<style>

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
        color: #fff;
        cursor: default;
        background-color: #075f96;
        border: 1px solid #ddd;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-color: transparent;
        font-weight: bold;
        font-size: 12px;
    }

    .nav-tabs > li > a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
        border-radius: 4px 4px 0 0;
        font-size: 13px;
        font-weight: bold;
    }

</style>