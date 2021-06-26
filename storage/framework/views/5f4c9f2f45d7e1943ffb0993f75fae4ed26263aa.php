<nav class="navbar navbar-expand-lg navbar-light bg-light header-fixed header">
        <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <div class=" header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                        <ul class="menu-nav">
                            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here "
                                data-menu-toggle="click" aria-haspopup="true">
                                <a href="#"
                                   data-toggle="tab" class=" ">
                                    <span >  <img alt="Logo" width="200px" style="background-color: white" src="<?php echo e(asset('img/shuttle-logo.png')); ?>" /></span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                            <li style="margin-left: 40px" class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active"
                                data-menu-toggle="click" aria-haspopup="true" >
                                <a href="#dashboard-data"
                                   data-toggle="tab" class=" nav-link menu-link menu-toggle tablink">
                                    <span class="menu-text">Dashbaord</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here ">
                                <a  href="#data-room" class=" nav-link menu-link menu-toggle tablink" data-toggle="tab">
                                    <span class="menu-text">Data Room</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here ">
                                <a  href="#assignment" class=" nav-link menu-link menu-toggle tablink" data-toggle="tab">
                                    <span class="menu-text">Assignment</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>


                        </ul>
                    </div>

                </div>
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                    <ul class="menu-nav" style="margin-left:290px">
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-here menu-item-active"
                            data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" id="add-assignment" class="menu-link menu-toggle" data-toggle="modal"
                               data-target="#exampleModal">
                                <span class="menu-text"> Add Assignment</span> <i style="margin-left: 5px"
                                                                                  class="fa fa-file"> </i>
                                <i class="menu-arrow"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="topbar">
                <div class="topbar-item">
                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                         id="kt_quick_user_toggle">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span
                                                class="symbol-label font-size-h5 font-weight-bold"><?php echo e(substr(Auth::user()->name , 0, 1)); ?></span>
                    </span>
                    </div>
                </div>

            </div>
        </div>

</nav>



<?php echo $__env->make('.Assignment.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\xampp\htdocs\jatrikoi-laravel-and-vue\resources\views/layouts/admin/nav-bar.blade.php ENDPATH**/ ?>