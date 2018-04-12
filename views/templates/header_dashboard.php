<body>
    <div id="wrapper">

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
                <?php if($this->controller == 'admin') {?>
                    <a class="navbar-brand" href="#">Painel de Controle Santos Dumont</a>
                <?php }if($this->controller == 'professor-admin') {?>
                <a class="navbar-brand" href="#">Painel de Controle Professor</a>
                <?php }?>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo (isset($this->professorName))?$this->professorName:'Admin';?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo URL;?>admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php if($this->controller == 'admin') {?>
                    <li >
                        <a href="<?php echo ADMIN_INDEX_LINK;?>"><i class="fa fa-fw fa-dashboard"></i> Vestibulinho</a>
                    </li>
                    <li>
                        <a href="<?php echo ADMIN_PROF_LINK;?>"><i class="fa fa-fw fa-dashboard"></i> Administrar Professores</a>
                    </li>
                    <?php }if($this->controller == 'professor-admin'){ ?>
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Administrar página</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
