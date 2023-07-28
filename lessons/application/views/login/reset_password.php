<!-- Header -->

<?php $this->load->view('login-header');?>

<!-- / Header -->

<!-- login wrapper -->

<div class="login-register-link">

    <a href="<?php echo base_url('login');?>" class="ms-auto button register-now-btn">Login</a>

</div>

    <div class="login-wrapper">

    <div class="row">

        <div class="col-lg-6">

            <div class="image-overlay">

                <img src="<?php echo base_url('assets/frontend/img/img01.png');?>" alt="">

                <div class="content">

                    <h4>

                        Welcome To English Lessons

                    </h4>

                    <h1>

                        Learning Platform

                    </h1>

                    <div class="heading-bar">

                        <span></span>

                        <span></span>

                    </div>

                    <p>

                        Take professional film courses, Schedule a video meeting with industry film leaders and do much more.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="login-form">

                <?php $get_msg = $this->message->get_message() ?>

                <?php if(!empty($get_msg)):?>

                    <?php echo $get_msg;?>

                <?php endif; ?>

                <!-- <img src="assets/img/logo.svg" alt=""> -->

                <div class="loginForm">

                    <h2>

                        Reset Password

                    </h2>

                    <div class="heading-bar">

                        <span></span>

                        <span></span>

                    </div>

                    <form action="<?php echo base_url('LoginController/password_reset');?>" method="post" id="resetPasswordForm">

                        <h6><span class="bar"></span>Reset<span class="bar"></span></h6>
                        <label for="password">New Password *</label>
                        <div class="position-relative">
                            <input type="password" name="password" class="form-control" id="password"/>
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                        </div>
                        <label for="password">Confirm Password *</label>
                        <div class="position-relative">
                            <input type="password" name="confirm_password" class="form-control"/>
                        </div>
                        <button type="submit" class="button">Reset</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

<!-- Footer -->

<?php $this->load->view('login-footer');?>

<!-- / Footer -->

<script>

    $("#resetPasswordForm").validate({

        errorClass:'error',

        errorElement:'span',

        successClass:'success',

        rules:{

            password: 'required',

            confirm_password: {
                required: true,
                equalTo:'#password'
            },

        }

    });


</script>