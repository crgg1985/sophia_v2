<header class="main-header">
    <div style="position:fixed !important; right:0px; top:0px; z-index:10 !important; width:100%;">

        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"> <img src="<?php echo e(URL::to('img/LogoNegro.png')); ?>" style="text-align:center"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" >
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php
                $perfil = Session::get('perfil')->id_perfil; // inicio de sesión perfil, arreglo sin ver la causa del problema
            ?>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <?php if($perfil!=1): ?>
                    <li id="open-read-msg" class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span id="count-new-msg" class="label label-success"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li id="title-new-msg" class="header"></li>
                            <li id="unread-container"></li>
                        </ul>
                    </li>

                    <li id="open-read-notification" class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning total-notifications"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li id="title-new-notifications" class="header"></li>
                            <li>
                                <ul id="not-seen-list" class="menu">
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?php if(Storage::disk('local')->has( $usuario->id . '.jpg')): ?>
                        <img src="<?php echo e(route('profile.image', ['filename' => $usuario->id . '.jpg'])); ?>" alt="" class="user-image">
                      <?php else: ?>
                        <img src="<?php echo e(URL::to('img/man_avatar.jpg')); ?>" alt="" class="user-image">
                      <?php endif; ?>
                      <span class="hidden-xs"><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellido); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <?php if(Storage::disk('local')->has( $usuario->id . '.jpg')): ?>
                              <img src="<?php echo e(route('profile.image', ['filename' => $usuario->id . '.jpg'])); ?>" alt="" class="img-circle">
                        <?php else: ?>
                          <img src="<?php echo e(URL::to('img/man_avatar.jpg')); ?>" alt="" class="img-circle">
                        <?php endif; ?>
                        <p>
                          <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellido); ?>

                          <?php if($perfil=='2'): ?>
                            - Estudiante
                          <?php else: ?>
                            - Administrador
                          <?php endif; ?>
                          <small>
                          <?php if($perfil!='1'): ?>
                              <?php if(Session::has('carrera')): ?>
                            <?php echo e($carrera->nombre_carrera); ?>

                              <?php endif; ?>
                          <?php endif; ?>
                          </small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="row">
                          <div class="col-xs-4 text-center">
                            <a href="#"></a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#"></a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#"></a>
                          </div>
                        </div>
                        <!-- /.row -->
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo e(route('profile')); ?>" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                    <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                  </li>
                </ul>
              </div>
    </nav>
    </div>

  </header>
 