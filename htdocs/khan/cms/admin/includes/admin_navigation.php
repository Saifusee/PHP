<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL ?>">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <li class="dropdown"  style="margin-top:8px"><a href="<?php echo URL ?>">User Online : <span class="usersonline"></span> </a></li>
            <li class="dropdown"><a href="<?php echo URL_1 ?>home"><i class="fa fa-home" style="font-size:30px; margin-right:10px" aria-hidden="true"></i></a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" style="font-size:20px; margin-top:5px; margin-right:6px"" ></i><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php URL ?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo URL_1 ?>includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo URL; ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="<?php echo URL . 'posts' ?>">View All Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo URL . 'posts/add' ?>">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="<?php echo URL ?>categories"><i class="fa fa-fw fa-wrench"></i> Categories </a>
                    </li>
                    
                    <li class="">
                        <a href="<?php echo URL ?>comments"><i class="fa fa-fw fa-file"></i> Comments </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo URL; ?>users">View All Users</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>users/add">Add User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo URL ?>profile"><i class="fa fa-fw fa-dashboard"></i> Profile </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

