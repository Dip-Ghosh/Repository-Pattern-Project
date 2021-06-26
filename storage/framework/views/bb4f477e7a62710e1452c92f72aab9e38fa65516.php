<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-root">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <a href="#" class="text-center mb-10">
                        <img src="<?php echo e(asset('img/shuttle-logo.png')); ?>" class="max-h-70px" alt="" />
                    </a>
                    <h2 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Jatri Koi</h2>
                </div>
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg)"></div>
            </div>
            <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <div class="d-flex flex-column-fluid flex-center">
                    <div class="login-form login-signin">
                        <form class="form" method="POST" action="<?php echo e(route('login')); ?>" novalidate="novalidate" id="">
                            <?php echo csrf_field(); ?>
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Jatri Koi</h3>
                                <span class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="<?php echo e(route('register')); ?>" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" value="<?php echo e(old('email')); ?>" type="text" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                    <a  href="<?php echo e(route('password.request')); ?>" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
                                </div>
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" value="<?php echo e(old('password')); ?>" name="password" autocomplete="off" />
                            </div>
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Login</button>
                                <a type="button" href="<?php echo e(route('register')); ?>" class="btn btn-light-info font-weight-bolder px-8 py-4 my-3 font-size-lg"><span class="svg-icon svg-icon-md"></span>Register</a>
                            </div>

                        </form>
                    </div>
                    <div class="login-form login-forgot">
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                            </div>
                            <!--end::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0">
                                <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>

                </div>
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                    <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                        <span class="mr-1">2021©</span>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">ShuttleBd.com</a>
                    </div>
                    <a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>
                    <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>
                    <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\jatrikoi-laravel-and-vue\resources\views/auth/login.blade.php ENDPATH**/ ?>