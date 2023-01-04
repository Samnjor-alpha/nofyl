<link rel="icon" href="https://www.nofyl.org/wp-content/uploads/Nofyl_logo.png" sizes="32x32"/>
<style>

    .navbar-fixed-bottom, .navbar-fixed-top, .navbar-static-top {
        border-radius: 0;
        background: #fff;
        box-shadow: none;
        padding: 0 0 38px 0;
    }

    .h2, h2 {
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 20px 15px;
    }

    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
        color: #000;
        background: #fff;
        box-shadow: none;
        font-weight: bold;

    }

</style>
</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../workplan.php" class="navbar-brand"><img
                        src="https://www.nofyl.org/wp-content/uploads/Nofyl_logo.png"
                        alt="Northern Frontier Youth League" class="main-logo"></a>
        </div>
        <div class="navbar-collapse collapse">
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" style="background:#fff;">
                    <li class="active"
                        style="background:#fff; font-weight:bold; font-size:17px; margin-top:20px; color:#000; letter-spacing:1px;">
                        <a href="../../workplan.php">NoFYL Project Documentation Portal</a></li>
                </ul>
                <?php if (!empty($_SESSION["userid"])) { ?>
                    <ul class="nav navbar-nav navbar-right" style="font-size:11px;">
                        <li class="active"><a href="index.html">Welcome, <?php echo $_SESSION["name"]; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                <?php } ?>
            </div>

        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container" style="min-height:500px;">
	