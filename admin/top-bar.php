<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

    </button>

    <a class="navbar-brand" href="index.php">Cs</a>

</div>

<!-- /.navbar-header -->



<ul class="nav navbar-top-links navbar-right">                

    <!-- /.dropdown -->

    <li class="dropdown">

        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

            <i class="fa fa-user fa-fw"></i>  <?php echo isset($_SESSION['css_admin']['fname']) ? $_SESSION['css_admin']['fname'] : "Admin"; ?> <i class="fa fa-caret-down"></i>

        </a>

        <ul class="dropdown-menu dropdown-user">

            <!-- <li><a href="view-profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>

            </li>

            <li><a href="update-profile.php"><i class="fa fa-gear fa-fw"></i> Settings</a>

            </li>

            <li class="divider"></li> -->

            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

            </li>

        </ul>

        <!-- /.dropdown-user -->

    </li>

    <!-- /.dropdown -->

</ul>