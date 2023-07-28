<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Lessons | Login</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/front/assets/img/logo.svg" type="image/x-icon">
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/assets/css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/assets/css/responsive.css">
</head>
<body>
    <!-- login wrapper -->
    <div class="login-register-link">
        <a href="login.html" class="ms-auto button register-now-btn">Already A Member? Sign In</a>
    </div>
    <div class="login-wrapper">
        <!-- register now button -->
        <div class="row">
            <div class="col-lg-6">
                <div class="image-overlay">
                    <img src="assets/front/assets/img/img01.png" alt="">
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
                <div class="login-form create-ac-form">
                    <!-- <img src="assets/img/logo.svg" alt=""> -->
                    <h2>
                        Create a new account!
                    </h2>
                    <div class="heading-bar">
                        <span></span>
                        <span></span>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form action="<?php echo base_url() ?>addNewUser" method="post"  novalidate>
                        <div class="form-step-1">
                            <label for="fname">Name *</label>
                            <input type="email" class="form-control" id="fname" placeholder="What's your name" />
                            <!-- <label for="lname">Last Name *</label>
                            <input type="email" class="form-control" id="lname" placeholder="What's your last name" /> -->
                            <label for="pnumber">Phone Number *</label>
                            <input type="tel" class="form-control" id="pnumber" placeholder="What's your Phone number" />
                            <button type="button" class="button mt-4" id="go-to-form-2">Continue</button>
                        </div>
                        <div class="form-step-2">
                            <label for="email">Email Address *</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email address" />
                            <label for="password">Create Password *</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" placeholder="Create a password" />
                                <button type="button" class="show-hide-pass">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.4177 0.216186C18.1248 -0.0720618 17.65 -0.0720618 17.3571 0.216186L15.2693 2.27086C13.6565 1.1629 11.8555 0.575426 10 0.575426C7.94315 0.575426 5.94745 1.29542 4.21856 2.64201C2.51054 3.96402 1.08697 5.87061 0.0614407 8.20811C-0.020262 8.39433 -0.0204886 8.60544 0.0608142 8.79184C0.946427 10.8222 2.13598 12.5255 3.55444 13.7999L1.58307 15.74L1.51045 15.8228C1.2926 16.1117 1.3168 16.5218 1.58307 16.7838C1.87596 17.0721 2.35084 17.0721 2.64373 16.7838L18.4177 1.26002L18.4903 1.17724C18.7082 0.888283 18.684 0.478229 18.4177 0.216186ZM4.61636 12.7548L6.75422 10.6508C6.32259 10.0256 6.086 9.28501 6.086 8.50118C6.086 6.36842 7.83371 4.6473 10 4.6473C10.7921 4.6473 11.5527 4.88178 12.1867 5.30457L14.1892 3.33382C12.8815 2.49055 11.4565 2.05163 10 2.05163C8.29025 2.05163 6.61992 2.65424 5.14764 3.80096C3.73781 4.89217 2.52945 6.46072 1.61706 8.40041L1.5704 8.50138L1.61575 8.60027C2.40872 10.2948 3.43049 11.7038 4.61636 12.7548ZM11.0935 6.3804C10.7618 6.21412 10.3876 6.1235 10 6.1235C8.66236 6.1235 7.586 7.18349 7.586 8.50118C7.586 8.88505 7.67671 9.2495 7.8468 9.57561L11.0935 6.3804ZM13.1366 8.31584L13.238 8.32693C13.6456 8.39909 13.9167 8.78282 13.8434 9.18403C13.556 10.7567 12.2992 11.996 10.7022 12.2813C10.2946 12.3541 9.90425 12.088 9.83026 11.6869C9.75628 11.2858 10.0267 10.9016 10.4342 10.8288C11.4152 10.6536 12.1904 9.88917 12.367 8.92273C12.4343 8.55496 12.7675 8.30017 13.1366 8.31584ZM16.997 4.81439C17.3279 4.56924 17.7981 4.63452 18.0472 4.96021C18.773 5.90914 19.4072 6.99852 19.9384 8.20722C20.0205 8.39401 20.0205 8.60586 19.9386 8.79271C17.8613 13.5289 14.1345 16.4245 10 16.4245C9.05878 16.4245 8.12751 16.2747 7.23057 15.9801C6.83766 15.851 6.62544 15.4329 6.75657 15.0463C6.8877 14.6596 7.31252 14.4507 7.70543 14.5798C8.44973 14.8242 9.22068 14.9483 10 14.9483C13.3046 14.9483 16.381 12.6864 18.2727 8.82978L18.4284 8.50138L18.3755 8.38456C17.9948 7.5784 17.5645 6.83896 17.0898 6.17414L16.8488 5.84799C16.5997 5.52231 16.666 5.05955 16.997 4.81439Z"
                                            fill="#BCC5D2" />
                                    </svg>
                                </button>
                            </div>

                            <div class="password-warning">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="14" height="14" rx="3" fill="#E30613" />
                                    <path d="M7.49353 3.5H6.125V7.93851H7.49353V3.5Z" fill="white" />
                                    <path d="M7.49353 8.80469H6.125V10.1732H7.49353V8.80469Z" fill="white" />
                                </svg>
                                <p>
                                    Password is expected to have a minimum of 8 characters, one special character and one uppercase letter at least!
                                </p>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="button">Submit</button>
                                <button type="button" class="button ms-3" id="go-back-form-1">Go back</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
    
    <!-- javascript -->
    <script src="<?php echo base_url() ?>assets/front/assets/js/jquery-3.6.0.min.js"></script>
    <!-- bootstrap 5 -->
    <script src="<?php echo base_url() ?>assets/front/assets/js/bootstrap.bundle.min.js"></script>
    <!-- main -->
    <script src="<?php echo base_url() ?>assets/front/assets/js/main.js"></script>
</body>
</html>